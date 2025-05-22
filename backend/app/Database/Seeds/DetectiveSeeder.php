<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DetectiveSeeder extends Seeder
{
    public function run()
    {
        $detectives = [
            ['name' => 'Detective Holmes',  'years_experience' => 15, 'birthdate' => '1975-01-01'],
            ['name' => 'Detective Watson',  'years_experience' => 10, 'birthdate' => '1980-07-15'],
            ['name' => 'Detective Marple',  'years_experience' => 20, 'birthdate' => '1968-09-23'],
        ];

        $this->db->table('detective')->insertBatch($detectives);
    }
}
