<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/2/12
 * Time: 9:55 PM
 * To change this template use File | Settings | File Templates.
 */
class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $products = $this->products_model->getlist(10, FALSE);
        $data['zerorows'] = empty($products);
        $data['products'] = $products;
        $this->load->view('products/index', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('make', 'Make', 'required');
        $this->form_validation->set_rules('model_no', 'Model Number', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('products/new');
        }
        else
        {

            $post = array();
            $post['seller_id'] = $this->input->post('seller_id');
            $post['make'] = $this->input->post('make');
            $post['model_no'] = $this->input->post('model_no');
            $post['description'] = $this->input->post('description');
            $post['price'] = $this->input->post('price');
            $this->products_model->save($post);
            $this->load->view('products/done');
        }
    }
    public function addnew()
    {
        $this->load->view('products/new');
    }
}
