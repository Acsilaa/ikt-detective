<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Detective extends Entity
{
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'birthdate'];
    protected $casts   = [
        'id'               => 'integer',
        'years_experience' => 'integer',
        'birthdate'        => 'datetime',
        'created_at'       => 'datetime',
        'updated_at'       => 'datetime',
    ];

    // Get age from birthdate
    public function getAge(): ?int
    {
        if (!$this->birthdate) {
            return null;
        }
        
        return $this->birthdate->diff(new \DateTime())->y;
    }

    // Check if detective is experienced (more than 5 years)
    public function isExperienced(): bool
    {
        return $this->years_experience > 5;
    }
}