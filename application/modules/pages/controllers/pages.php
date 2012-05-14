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
        $this->session->set_flashdata("message", "Your message has been sent into the air.");
        redirect("/products/index");
    }
}
