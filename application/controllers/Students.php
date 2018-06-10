<?php

class Students extends CI_Controller
{
    public function studentList()
    {
        $data['title'] = 'Student List';
        
        $data['students'] = $this->student_model->get_students();

        $this->load->view('templates/header');
        $this->load->view('students/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Add Student';
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('class', 'Class', 'required');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header');
            $this->load->view('students/create', $data);
            $this->load->view('templates/footer');
        } else {

            $this->student_model->create_student();
            // Set message
            $this->session->set_flashdata('student_created', 'Student has been created successfully!');
            redirect('students');
        }
    }
}
