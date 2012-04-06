<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/6/12
 * Time: 8:00 PM
 * To change this template use File | Settings | File Templates.
 */

class MY_Form_validation extends CI_Form_validation{

    function run($module = '', $group = ''){
        (is_object($module)) AND $this->CI = &$module;
        return parent::run($group);
    }

}