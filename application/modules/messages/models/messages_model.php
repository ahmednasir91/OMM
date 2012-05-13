<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/2/12
 * Time: 9:56 PM
 * To change this template use File | Settings | File Templates.
 */
class Messages_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('date');
    }

    public function check_username($username)
    {
        $username = strtolower($username);
        $query = $this->db->query('SELECT id FROM users where username="'.$username.'"');
        if($query->num_rows() > 0)
            return $query->row();
        else
            return false;
    }

    public function save($message)
    {
        return $this->db->insert('messages', $message);
    }
}
