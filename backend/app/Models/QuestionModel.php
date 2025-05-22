<?php
namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table            = 'questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Question';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'question', 'detective_id', 'time'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'question'     => 'required|string',
        'detective_id' => 'required|integer|is_not_unique[detective.id]',
        'time'         => 'required|valid_date',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;

    // Custom methods
    public function getQuestionsByDetective(int $detectiveId)
    {
        return $this->where('detective_id', $detectiveId)
                    ->orderBy('time', 'ASC')
                    ->findAll();
    }

    public function getQuestionsWithDetectives()
    {
        return $this->select('questions.*, detective.name as detective_name')
                    ->join('detective', 'detective.id = questions.detective_id')
                    ->orderBy('questions.time', 'DESC')
                    ->findAll();
    }

    public function getQuestionsByDateRange(string $startDate, string $endDate)
    {
        return $this->where('time >=', $startDate)
                    ->where('time <=', $endDate)
                    ->orderBy('time', 'ASC')
                    ->findAll();
    }

    public function getQuestionByID($qid){
        return $this->find($qid) ?? null;
    }
}