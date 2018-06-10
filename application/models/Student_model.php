<?php

class Student_model extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }
    public function get_students()
    {
        $this->db->order_by('id','DESC');
        $query = $this->db->get('students');
        return $query->result_array();
    }

    //Create Student

    public function create_student()
    {
        $data = array(
            'name' => $this->input->post('name'),            
            'class' => $this->input->post('class'),
        );

        return $this->db->insert('students', $data);
        
    }
}
