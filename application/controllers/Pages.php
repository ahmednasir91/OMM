<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 3/31/12
 * Time: 9:42 PM
 * To change this template use File | Settings | File Templates.
 */
class Pages extends CI_Controller
{
    public function view($page = 'home')
    {
        if(!file_exists('application/views/pages/'.$page.'.php'))
            show_404();
        $data['title'] = ucfirst($page);
        $this->load->view('template/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('template/footer', $data);
    }

}
?>