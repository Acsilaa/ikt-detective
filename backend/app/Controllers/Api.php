<?php
namespace App\Controllers;

use App\Models\DetectiveModel;
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
        $subjects = $ss;
        
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
        $detectives = $ds;
        
        return $this->response->setJSON([
            'success' => true,
            'data' => json_encode($detectives)
        ]);
    }
}