<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Subject extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'birthdate'];
    protected $casts   = [
        'id'         => 'integer',
        'height'     => 'float',
        'weight'     => 'float',
        'birthdate'  => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Getter for experience enum
    public function getExperienceOptions(): array
    {
        return ['intern', 'beginner', 'expert', 'veteran'];
    }

    // Getter for status enum
    public function getStatusOptions(): array
    {
        return ['innocent', 'guilty'];
    }

    // Check if subject is guilty
    public function isGuilty(): bool
    {
        return $this->status === 'guilty';
    }

    // Get age from birthdate
    public function getAge(): ?int
    {
        if (!$this->birthdate) {
            return null;
        }
        
        return $this->birthdate->diff(new \DateTime())->y;
    }
}