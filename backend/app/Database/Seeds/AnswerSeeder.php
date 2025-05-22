<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        $answers = [
            ['answer' => 'I was at home watching TV.',          'subject_id' => 1, 'question_id' => 1],
            ['answer' => 'Yes, we worked together.',            'subject_id' => 2, 'question_id' => 2],
            ['answer' => 'My neighbor saw me at 9 PM.',         'subject_id' => 3, 'question_id' => 3],
            ['answer' => 'I know Eva from law school.',         'subject_id' => 4, 'question_id' => 4],
            ['answer' => 'No, never been there.',               'subject_id' => 5, 'question_id' => 5], // Eva, the guilty one
            ['answer' => 'I was flying a plane.',               'subject_id' => 6, 'question_id' => 1],
            ['answer' => 'We met once at a seminar.',           'subject_id' => 7, 'question_id' => 2],
            ['answer' => 'I was at the hospital during that time.', 'subject_id' => 8, 'question_id' => 3],
            ['answer' => 'She’s my cousin.',                    'subject_id' => 9, 'question_id' => 4],
            ['answer' => 'Yes, I used to live near it.',        'subject_id' => 10, 'question_id' => 5],
        ];

        $this->db->table('answers')->insertBatch($answers);
    }
}
