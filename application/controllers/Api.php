<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public $input;
    public $db;
    public function index()
    {
        header('Content-Type: application/json');

        $data = $this->input->get('data');

        if ($data) {
            echo json_encode([
                'status' => true,
                'message' => 'Data received successfully.',
            ]);
            $this->db->insert('t_contacts', $data);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'No query parameters received.',
            ]);
        }
    }

    public function create()
    {
        header('Content-Type: application/json');

        $name = $this->input->get('name');
        $email = $this->input->get('email');
        $phone = $this->input->get('phone');

        $data = [
            'name' => $name,
            'email' => $email,  
            'phone' => $phone,
        ];
        
        if ($name || $email || $phone) {
            echo json_encode([
                'status'=>true,
                'message' => 'Data recieved successfully.',
                'response' => $data
            ]);
            $this->db->insert('t_contacts', $data);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'No query parameters received.',
            ]);    
        }
    }
}
