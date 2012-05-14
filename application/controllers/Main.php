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
    function index($page, $action = 0, $arg1 = 0, $arg2 = 0)
    {
        $data['title'] = "Online Mobile Marketplace";
        $data['login'] = modules::run('auth/auth/index');
        $data['makeslist'] = modules::run('products/products/makeslist');
        $data['pricelist'] = modules::run('products/products/pricelist');
        $data['nothome'] = true;
        switch($page)
        {
            case 'home':
                $data['content'] = modules::run('products/products/home');
                $data['nothome'] = false;
                break;
            case 'register':
            case 'forgot_password':
                $data['content'] = modules::run('auth/' . $page);
                $data['login'] = "";
                break;
            case 'products':
                if($action === 0)
                    $data['content'] = modules::run("products/index");
                elseif($action === "show")
                    $data['content'] = modules::run("products/products/show", $arg1);
                elseif($action === "price")
                    $data['content'] = modules::run("products/products/price", $arg1, $arg2);
                else
                    if($arg1 === 0)
                        $data['content'] = modules::run("products/products/".$action);
                    else
                        $data['content'] = modules::run("products/products/".$action, $arg1);
                break;
            case 'messages':
                $data['content'] = modules::run("messages/messages/".$action, $arg1);
                break;
            case "contact-us":
                $data['content'] = modules::run("pages/pages/view", $page);
                break;
            case "pages":
                $data["content"] = modules::run("pages/pages/contact");
        }
        $data["recentreviews"] = modules::run("reviews/reviews/recentreviews");
        $data["newusers"] = modules::run("auth/auth/newusers");
        $data["randomproducts"] = modules::run("products/products/randomproducts");
        $data["recentproducts"] = modules::run("products/products/recentproducts");
        $data['message'] = $this->session->flashdata('message');
        $data['isloggedin'] = $this->session->userdata('isloggedin');
        $this->parser->parse('main', $data);
    }
}
