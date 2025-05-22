<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Answer extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'id'          => 'integer',
        'subject_id'  => 'integer',
        'question_id' => 'integer',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    // Check if answer is long (more than 100 characters)
    public function isLongAnswer(): bool
    {
        return strlen($this->answer) > 100;
    }
}