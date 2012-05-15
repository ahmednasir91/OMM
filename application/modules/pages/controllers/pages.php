<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/2/12
 * Time: 9:55 PM
 * To change this template use File | Settings | File Templates.
 */
class Pages extends MX_Controller
{
    public function __construct()
    {
        $this->load->library('email');
    }
    public function view($page)
	{
		$this->load->view("pages/".$page);
	}

    public function contact()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'isnot[Name]|required|min_length[3]|max_length[25]|alpha');
        $this->form_validation->set_rules('subject', 'Subject', 'isnot[Subject]|required|min_length[3]|max_length[40]');
        $this->form_validation->set_rules('description', 'Decription', 'isnot[Description]|required|min_length[5]|max_length[1000]');
        $this->form_validation->set_rules('email', 'Email', 'isnot[Email]|valid_email|xss_clean');
        if($this->form_validation->run($this) === FALSE)
        {
            $this->load->view("pages/contact-us");
        }
        else
        {
            $this->session->set_flashdata("message", "Your message has been sent into the air.");
            redirect("/products/index");
        }
    }
}
