<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/5/12
 * Time: 11:41 PM
 * To change this template use File | Settings | File Templates.
 */
class Main extends MX_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library(array('session', 'parser'));
        $this->load->helper(array('url'));
        if (isset($_SERVER['HTTP_REFERER']))
        {
            $this->session->set_userdata('previous_page', $_SERVER['HTTP_REFERER']);
        }
        else
        {
            $this->session->set_userdata('previous_page', base_url());
        }
    }
    function index()
    {

        $data['title'] = "Online Mobile Marketplace";
        $data['login'] = modules::run('auth/auth/index');
        $data['message'] = $this->session->flashdata('message');
        $this->parser->parse('main', $data);
    }
}
