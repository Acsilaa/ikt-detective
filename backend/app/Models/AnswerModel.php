<?php
namespace App\Models;

use CodeIgniter\Model;

class AnswerModel extends Model
{
    protected $table            = 'answers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Answer';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'answer', 'subject_id', 'question_id'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'answer'      => 'required|string',
        'subject_id'  => 'required|integer|is_not_unique[subject.id]',
        'question_id' => 'required|integer|is_not_unique[questions.id]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;

    // Custom methods
    public function getAnswersBySubject(int $subjectId)
    {
        return $this->where('subject_id', $subjectId)->findAll();
    }

    public function getAnswersByQuestion(int $questionId)
    {
        return $this->where('question_id', $questionId)->findAll();
    }

    public function getCompleteInterrogation()
    {
        return $this->select('answers.*, subject.name as subject_name, questions.question, detective.name as detective_name, questions.time')
                    ->join('subject', 'subject.id = answers.subject_id')
                    ->join('questions', 'questions.id = answers.question_id')
                    ->join('detective', 'detective.id = questions.detective_id')
                    ->orderBy('questions.time', 'ASC')
                    ->findAll();
    }

    public function getInterrogationBySubject(int $subjectId)
    {
        return $this->select('answers.*, questions.question, detective.name as detective_name, questions.time')
                    ->join('questions', 'questions.id = answers.question_id')
                    ->join('detective', 'detective.id = questions.detective_id')
                    ->where('answers.subject_id', $subjectId)
                    ->orderBy('questions.time', 'ASC')
                    ->findAll();
    }
}