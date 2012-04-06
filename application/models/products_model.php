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

        $query = $this->db->query("SELECT products.id, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id");
        return $query->result_array();
    }

    public function getproduct_by_id($id)
    {
        $query = $this->db->query("SELECT products.id, username as seller, make, model_no, price, image_url, description from users, products where products.seller_id = users.id and products.id = " . $id);
        return $query->result();
    }

    public function save($data)
    {
        return $this->db->insert('products', $data);
    }


}
