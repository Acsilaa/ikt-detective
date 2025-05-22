<?php
namespace App\Controllers;

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

    public function subject()
    {
        if ($this->request->getMethod() === 'options') {
            return $this->response->setStatusCode(200);
        }

        // Verify CSRF token
        $csrfToken = $this->request->getHeaderLine('X-CSRF-TOKEN');
        if (empty($csrfToken) || !hash_equals(csrf_hash(), $csrfToken)) {
            return $this->response->setStatusCode(403)
                ->setJSON(['error' => 'CSRF token mismatch']);
        }

        // Your actual logic here
        $subjects = []; // Replace with actual data
        
        return $this->response->setJSON([
            'success' => true,
            'data' => $subjects
        ]);
    }
}