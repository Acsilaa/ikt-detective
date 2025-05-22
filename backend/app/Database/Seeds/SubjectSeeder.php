<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            ['name' => 'Alice Carter',     'job' => 'Chef',      'experience' => 'expert',  'height' => 1.65, 'weight' => 60, 'birthdate' => '1985-04-12', 'haircolor' => 'brown',  'eyecolor' => 'green',  'status' => 'innocent'],
            ['name' => 'Bob Mason',        'job' => 'Mechanic',  'experience' => 'veteran', 'height' => 1.80, 'weight' => 85, 'birthdate' => '1978-08-19', 'haircolor' => 'black',  'eyecolor' => 'blue',   'status' => 'innocent'],
            ['name' => 'Cynthia Lee',      'job' => 'Teacher',   'experience' => 'expert',  'height' => 1.70, 'weight' => 68, 'birthdate' => '1990-10-05', 'haircolor' => 'blonde', 'eyecolor' => 'brown',  'status' => 'innocent'],
            ['name' => 'Daniel Wright',    'job' => 'Artist',    'experience' => 'beginner','height' => 1.75, 'weight' => 75, 'birthdate' => '1992-02-25', 'haircolor' => 'red',    'eyecolor' => 'green',  'status' => 'innocent'],
            ['name' => 'Eva Green',        'job' => 'Lawyer',    'experience' => 'veteran', 'height' => 1.60, 'weight' => 58, 'birthdate' => '1983-06-17', 'haircolor' => 'black',  'eyecolor' => 'hazel',  'status' => 'guilty'],
            ['name' => 'Frank Stone',      'job' => 'Pilot',     'experience' => 'expert',  'height' => 1.85, 'weight' => 90, 'birthdate' => '1981-09-11', 'haircolor' => 'grey',   'eyecolor' => 'blue',   'status' => 'innocent'],
            ['name' => 'Grace Kim',        'job' => 'Scientist', 'experience' => 'intern',  'height' => 1.68, 'weight' => 62, 'birthdate' => '1996-03-15', 'haircolor' => 'brown',  'eyecolor' => 'black',  'status' => 'innocent'],
            ['name' => 'Henry Black',      'job' => 'Engineer',  'experience' => 'beginner','height' => 1.90, 'weight' => 95, 'birthdate' => '1989-12-29', 'haircolor' => 'black',  'eyecolor' => 'blue',   'status' => 'innocent'],
            ['name' => 'Ivy Adams',        'job' => 'Nurse',     'experience' => 'expert',  'height' => 1.62, 'weight' => 55, 'birthdate' => '1987-01-09', 'haircolor' => 'red',    'eyecolor' => 'green',  'status' => 'innocent'],
            ['name' => 'Jack Young',       'job' => 'Bartender', 'experience' => 'beginner','height' => 1.78, 'weight' => 70, 'birthdate' => '1994-05-20', 'haircolor' => 'blonde', 'eyecolor' => 'hazel',  'status' => 'innocent'],
        ];

        $this->db->table('subject')->insertBatch($subjects);
    }
}
