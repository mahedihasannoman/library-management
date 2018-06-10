<?php

class Book_assign extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }
    public function get_assignment()
    {
        $this->db->order_by('book_assign.id','DESC');
        
        
        $this->db->select('*,students.id as sid, book_assign.id as bid');
        $this->db->where('book_assign.status',0);
        $this->db->join('students', 'students.id = book_assign.student_id');
        $query = $this->db->get('book_assign');
        return $query->result_array();
    }

    //create assignment

    function create_assginment()
    {
        $book_ids = $this->input->post('book_ids');
        $data = [
            'student_id' => $this->input->post('student_id'),
            'book_ids'  => implode(',',$book_ids),
            'return_date'   => $this->input->post('return_date'),
            'issue_date'    => date('Y-m-d')
        ];

        return $this->db->insert('book_assign', $data);

    }

    //get details
    public function get_details($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('book_assign');
        return $query->row_array();
    }

    //receive book

    public function receive_book($assignment_id)
    {
        $data = [
            
            'status'=> 1
        ];
        $this->db->where('id', $assignment_id);
        return $this->db->update('book_assign', $data);
    }

}
