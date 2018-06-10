<?php

class Book_management extends CI_Controller
{
    function bookmanagement()
    {
        $data['title'] = 'Book Issue Managment';
        
        $assignment = $this->book_assign->get_assignment();
        
        if(!empty($assignment)):
            for( $i=0; $i<sizeof($assignment);$i++):
                
                $books_name = $this->book_model->get_book_name_by_ids($assignment[$i]['book_ids']);
                $assignment[$i]['books'] = $books_name;

            endfor;
        endif;

        $data['assignments'] = $assignment;

        $this->load->view('templates/header');
        $this->load->view('assignment/index', $data);
        $this->load->view('templates/footer');

    }

    //Receive books

    public function receive($assginment_id)
    {
        $details = $this->book_assign->get_details($assginment_id);
        $this->book_model->update_book_by_ids($details['book_ids']);
        $this->book_assign->receive_book($assginment_id);
        $this->session->set_flashdata('book_assignment', 'Book has been received successfully!');
        redirect('book_management');
    }

    //issue books

    public function issue()
    {
        $data['title'] = 'Issue Books';

        $data['students'] = $this->student_model->get_students();
        $data['books'] = $this->book_model->get_books();

        $this->form_validation->set_rules('student_id', 'Student', 'required|callback_check_assign_books');
        $this->form_validation->set_rules('book_ids[]', 'Books', 'required|callback_check_numberof_books');
        $this->form_validation->set_rules('return_date', 'Return date', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('assignment/issue', $data);
            $this->load->view('templates/footer');
        } else {

            $this->book_model->assign_books();
            $this->book_assign->create_assginment();
            $this->session->set_flashdata('book_assignment', 'You have successfully issued books');
            redirect('book_management');
        }
    }

    //callback student borrow checking

    public function check_assign_books($id)
    {
        
        $books = $this->book_model->get_books_by_student($id);
        $this->form_validation->set_message('check_assign_books', 'That student is taken maximum amount of books.');
        if(count($books) > 3){
            return false;
        }else{
            return true;
        }

    }

    //callback check number of books
    public function check_numberof_books($books)
    {
        $books = $this->input->post('book_ids');
       
        if(empty($books)){
            $this->form_validation->set_message('check_numberof_books', 'You have select any book.');
            return false;
        }

        if(count($books)>2){
            $this->form_validation->set_message('check_numberof_books', 'You have selected more then 2 books.');
            return false;
        }
        

        $bookdetails = $this->book_model->get_book_name_by_ids(implode(',',$books));
        
        $status = true;
        foreach($bookdetails as $book):
            if($book->is_assigned==1){
                $status = false;
                break;
            }
        endforeach;

        if($status){
            return true;
        }else{
            $this->form_validation->set_message('check_numberof_books', 'You have select a book that is already assigned.');
            return false;
        }

    }

}
