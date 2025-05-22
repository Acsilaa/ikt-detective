<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Load sub-seeders
        $this->call('SubjectSeeder');
        $this->call('DetectiveSeeder');
        $this->call('QuestionSeeder');
        $this->call('AnswerSeeder');
    }
}
