<?php
namespace App\Models;

use CodeIgniter\Model;

class DetectiveModel extends Model
{
    protected $table            = 'detective';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Detective';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'years_experience', 'birthdate'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'name'             => 'required|string|max_length[255]',
        'years_experience' => 'required|integer|greater_than_equal_to[0]',
        'birthdate'        => 'valid_date',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;

    // Custom methods
    public function getExperiencedDetectives(int $minYears = 5)
    {
        return $this->where('years_experience >=', $minYears)->findAll();
    }

    public function getDetectiveWithQuestions(int $detectiveId)
    {
        return $this->select('detective.*, questions.question, questions.time')
                    ->join('questions', 'questions.detective_id = detective.id', 'left')
                    ->where('detective.id', $detectiveId)
                    ->findAll();
    }
}