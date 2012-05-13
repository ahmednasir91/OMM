<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/2/12
 * Time: 9:56 PM
 * To change this template use File | Settings | File Templates.
 */
class Reviews_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('date');
    }

    public function save($review)
    {
        return $this->db->insert('reviews', $review);
    }

    public function get($productid)
    {
        $query = $this->db->query("SELECT * from reviews where productid = " . $productid);
        $result = $query->result();
        foreach($result as $item)
        {
            $query = $this->db->query("SELECT first_name, last_name from users where id = " . $item->userid);
            $temp = $query->result();
            $first_name = $temp[0]->first_name;
            $last_name = $temp[0]->last_name;
            $item->user = $first_name . " " . $last_name;
            $datestring = "%F %j, %Y, %g:%i %a";
            $item->date = mdate($datestring, strtotime($item->date));
        }
        return $result;
    }
}
