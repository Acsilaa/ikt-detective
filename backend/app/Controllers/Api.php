<?php
namespace App\Controllers;

use App\Models\AnswerModel;
use App\Models\DetectiveModel;
use App\Models\QuestionModel;
use App\Models\SubjectModel;

class Api extends BaseController
{
    public function test()
    {
        return $this->response->setJSON(['message' => 'API is working']);
    }

    public function csrf()
    {
        if ($this->request->getMethod() === 'options') {
            return $this->response->setStatusCode(200);
        }
        
        helper('security');
        
        return $this->response->setJSON([
            "token" => csrf_token(), 
            "hash" => csrf_hash()
        ]);
    }

    public function subjects()
    {
        if ($this->request->getMethod() === 'options') {
            return $this->response->setStatusCode(200);
        }

        $sm = new SubjectModel();
        $ss = $sm->findAll();
        $subjects = [];
        $am = new AnswerModel();
        foreach($ss as $s){
            $c = count($am->getAnswersBySubject($s->id));
            $s->answers = $c;
            $subjects[] = $s;
        }
        
        return $this->response->setJSON([
            'success' => true,
            'data' => json_encode($subjects)
        ]);
    }
    public function detectives()
    {
        if ($this->request->getMethod() === 'options') {
            return $this->response->setStatusCode(200);
        }

        $dm = new DetectiveModel();
        $ds = $dm->findAll();
        $detectives = [];
        $am = new QuestionModel();
        foreach($ds as $d){
            $c = count($am->getQuestionsByDetective($d->id));
            $d->questions = $c;
            $detectives[] = $d;
        }
        return $this->response->setJSON([
            'success' => true,
            'data' => json_encode($detectives)
        ]);
    }

    public function subjectpairs(){
        if ($this->request->getMethod() === 'options') {
            return $this->response->setStatusCode(200);
        }
        $sid = $this->request->getVar("id");
        if(!$sid){
            return $this->response->setJSON([
                "success" => false,
                "data" => json_encode([
                    "sid" => $sid
                ]),
            ]);
        }
        $am = new AnswerModel();
        $qm = new QuestionModel();
        $dm = new DetectiveModel();

        $answers = $am->getAnswersBySubject($sid);
        $pairs = [];

        foreach($answers as $a){
            $q = $qm->getQuestionByID($a->question_id);
            $pairs[] = [
                'question' => $q->question,
                'answer' => $a->answer,
                'asker' => $dm->find($q->detective_id)->name
            ];
        }

        return $this->response->setJSON([
            "success" => true,
            "data" => json_encode($pairs),
        ]);
    }
}