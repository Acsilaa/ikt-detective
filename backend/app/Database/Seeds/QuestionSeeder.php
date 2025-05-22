<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use DateTime;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            ['question' => 'Where were you last night?',           'detective_id' => 1, 'time' => date('Y-m-d H:i:s')],
            ['question' => 'Did you know the victim?',             'detective_id' => 2, 'time' => date('Y-m-d H:i:s')],
            ['question' => 'Can anyone confirm your alibi?',       'detective_id' => 3, 'time' => date('Y-m-d H:i:s')],
            ['question' => 'What’s your relationship with Eva?',   'detective_id' => 1, 'time' => date('Y-m-d H:i:s')],
            ['question' => 'Have you ever visited the crime scene?','detective_id' => 2, 'time' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('questions')->insertBatch($questions);
    }
}
