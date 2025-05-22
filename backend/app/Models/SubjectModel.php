<?php
namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
{
    protected $table            = 'subject';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Subject';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'job', 'experience', 'height', 'weight', 
        'birthdate', 'haircolor', 'eyecolor', 'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [
        'name'       => 'required|string|max_length[255]',
        'job'        => 'string|max_length[255]',
        'experience' => 'in_list[intern,beginner,expert,veteran]',
        'height'     => 'numeric',
        'weight'     => 'numeric',
        'birthdate'  => 'valid_date',
        'haircolor'  => 'string|max_length[50]',
        'eyecolor'   => 'string|max_length[50]',
        'status'     => 'in_list[innocent,guilty]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Custom methods
    public function getSubjectsByStatus(string $status)
    {
        return $this->where('status', $status)->findAll();
    }

    public function getSubjectsByExperience(string $experience)
    {
        return $this->where('experience', $experience)->findAll();
    }

    public function searchByName(string $name)
    {
        return $this->like('name', $name)->findAll();
    }
}
