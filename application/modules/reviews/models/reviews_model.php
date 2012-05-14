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

    public function getrecent($limit)
    {
        $query = $this->db->query("SELECT users.first_name as first_name, users.last_name as last_name, products.id as productid, products.make as make, products.model_no as model_no from reviews, users, products where reviews.userid = users.id and reviews.productid = products.id order by reviews.id DESC limit " . $limit);
        return $query->result();
    }
}
