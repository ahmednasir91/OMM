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
    public function view($page)
	{
		$this->load->view("pages/".$page);
	}

    public function contact()
    {

    }
}
