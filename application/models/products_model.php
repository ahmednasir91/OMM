<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/2/12
 * Time: 9:56 PM
 * To change this template use File | Settings | File Templates.
 */
class Products_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getlist($limit, $full)
    {
        if(!$full)
        {
            $this->db->select('make, model_no, price, seller_id');
        }
        $query = $this->db->get('products', $limit);
        return $query->result_array();



    }

    public function save($data)
    {
        return $this->db->insert('products', $data);
    }
}
