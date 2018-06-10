<?php

class Books extends CI_Controller{

    public function bookList()
    {
        $data['title'] = 'Book List';
        $search_val = $this->input->post('search');
        if($search_val != '' or $this->input->post('filter')!=''){
            $data['keyword'] = $search_val;
            $data['filter'] = $this->input->post('filter');
            $data['books'] = $this->book_model->get_books_by_search();
        }else{
            $data['books'] = $this->book_model->get_books();
        }

        

        $this->load->view('templates/header');
        $this->load->view('books/index', $data);
        $this->load->view('templates/footer');

    }

    // create book

    public function create()
    {
        $data['title'] = 'Create Book';
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('books/create', $data);
            $this->load->view('templates/footer');
        } else {

            $this->book_model->create_book();
            // Set message
            $this->session->set_flashdata('book_created', 'Your Book has been created!');
            redirect('books');
        }
    }

    //Edit book

    public function edit($id)
    {

        $data['book'] = $this->book_model->get_book_by_id($id);

        

        if(empty($data['book'])){
            show_404();
        }

        $data['title'] = 'Edit book : '. $data['book']['title'];

        $this->load->view('templates/header');
        $this->load->view('books/edit', $data);
        $this->load->view('templates/footer');
    }

    //Update book

    public function update()
    {
        $id = $this->input->post('id');
        $data['book'] = $this->book_model->get_book_by_id($id);
        $data['title'] = 'Edit book : '. $data['book']['title'];
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if($this->form_validation->run() === FALSE){
            $this->session->set_flashdata('book_update_error', 'You did not put required information to update the book. Please fill out the form correctly.');
            
            redirect('books/edit/'.$id);
        } else {
            $this->book_model->update_book();
            // Set message
            $this->session->set_flashdata('book_updated', 'Your book has been updated!');
            redirect('books');
        }

       
    }

}