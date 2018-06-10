<?php

class Book_model extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }
    //get all books
    public function get_books(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('books');
        return $query->result_array();
    }

    //get single book
    public function get_book_by_id($id)
    {
        $query = $this->db->get_where('books', array('id' => $id));
        return $query->row_array();
    }

    //get books by student

    public function get_books_by_student($id)
    {
        $query = $this->db->get_where('books', array('assigned_to' => $id));
        return $query->result();
    }

    //get book name by ids

    public function get_book_name_by_ids($ids)
    {
        $ids = explode(',',$ids);
       
        $this->db->where_in('id', $ids);
        return $this->db->get('books')->result();
    }

    //create book

    public function create_book()
    {
        $data = array(
            'title' => $this->input->post('title'),
            
            'author' => $this->input->post('author'),
            'price' => $this->input->post('price'),
            
            
        );

        return $this->db->insert('books', $data);
        
    }

    //update book

    public function update_book()
    {
        $data = array(
            'title' => $this->input->post('title'),
            
            'author' => $this->input->post('author'),
            'price' => $this->input->post('price')
        );
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('books', $data);
    }

    //assign book to student

    public function assign_books()
    {
        $book_ids = $this->input->post('book_ids');
        $student_id = $this->input->post('student_id');

        $data = [
            'is_assigned'=> 1,
            'assigned_to'=> $student_id
        ];

        $this->db->where_in('id', $book_ids);
        return $this->db->update('books', $data);

    }

    //update book by ids

    public function update_book_by_ids($ids)
    {
        $ids = explode(',',$ids);

        $data = [
            'is_assigned'=> 0,
            'assigned_to'=> 0
        ];

        $this->db->where_in('id', $ids);
        return $this->db->update('books', $data);
    }

    //get books by search

    public function get_books_by_search()
    {

        $keyword = $this->input->post('search');
        $filter = $this->input->post('filter');

        if($keyword!=''){
            $this->db->where("(title LIKE '%".$keyword."%')", NULL, FALSE);
        }

        if($filter!=''){
            $this->db->where('is_assigned', $filter);
        }



        $query = $this->db->get('books');
        return $query->result_array();
    }

}
