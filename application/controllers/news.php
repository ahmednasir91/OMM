<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/1/12
 * Time: 12:02 AM
 * To change this template use File | Settings | File Templates.
 */
class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }
    public function index()
    {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = "News Archive";

        $this->load->view('template/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('template/footer', $data);
    }
    public function view($slug)
    {
        $data['news_item'] = $this->news_model->get_news($slug);
        if(empty($data['news_item']))
            show_404();
        $data['title'] = $data['news_item']['title'];

        $this->load->view('template/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('template/footer', $data);

    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = "Create a News Item";

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('template/header', $data);
            $this->load->view('news/create');
            $this->load->view('template/footer', $data);
        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }

}
