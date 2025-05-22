<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Question extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'time'];
    protected $casts   = [
        'id'           => 'integer',
        'detective_id' => 'integer',
        'time'         => 'datetime',
        'created_at'   => 'datetime',
        'updated_at'   => 'datetime',
    ];

    // Get formatted time
    public function getFormattedTime(): string
    {
        return $this->time ? $this->time->format('Y-m-d H:i:s') : '';
    }
}