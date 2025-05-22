<?php
namespace App\Controllers;

class Api extends BaseController{
    public function csrf(){
        if ($this->request->getMethod() === 'options') {
            return $this->response->setStatusCode(200); // Early exit for preflight
        }
        return $this->response->setJSON(["token" => csrf_token(), "hash" => csrf_hash()]);
    }
    public function subject(){
        return $this->response->setJSON([]);
    }
}