<?php
namespace App\Controllers;

class Api extends BaseController{
    public function csrf(){
        return $this->response->setJSON(["token" => csrf_token(), "hash" => csrf_hash()]);
    }
    public function subject(){
        
    }
}