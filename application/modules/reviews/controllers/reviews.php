<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/2/12
 * Time: 9:55 PM
 * To change this template use File | Settings | File Templates.
 */
class Reviews extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reviews_model');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('session', 'upload', 'parser'));

    }

    public function addnew($productid)
    {
        $data['productid'] = $productid;
        $data['userid'] = $this->session->userdata('userid');
        $this->load->view('reviews/new', $data);
    }

    public function index($productid)
    {
        $reviews = $this->reviews_model->get($productid);
        $data['empty'] = empty($reviews);
        $data['reviews'] = $reviews;
        $data['totalReviews'] = count($reviews);
        $this->load->view('reviews/index', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $productid  = $this->input->post('productid');
        if($this->form_validation->run($this) === FALSE)
        {
            $this->session->set_flashdata("message", validation_errors());
            redirect('products/show/' . $productid);
        }
        else
        {
            $post = array();
            $post['userid'] = $this->input->post('userid');
            $post['productid'] = $this->input->post('productid');
            $post['description'] = $this->input->post('description');
            $this->reviews_model->save($post);
            redirect('products/show/' . $post['productid']);
        }
    }

    public function recentreviews()
    {
        $reviews = $this->reviews_model->getrecent(RECENTITEMS);
        $data["reviews"] = $reviews;
        $this->load->view("reviews/recentreviews", $data);
    }
}
