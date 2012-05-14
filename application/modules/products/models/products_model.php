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

    public function getmakes()
    {
        $query = $this->db->query("SELECT distinct make from products");
        return $query->result();
    }

    public function getlistby_price($lower, $upper)
    {
        if($upper !== 0)
            $query = $this->db->query("SELECT products.id, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id and products.price <= " . $upper ." and products.price >= " . $lower ." order by products.id DESC");
        else
            $query = $this->db->query("SELECT products.id, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id and products.price >= " . $lower ." order by products.id DESC");
        return $query->result_array();
    }

    public function search($keyword)
    {
        $query = $this->db->query("SELECT products.id, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id and (products.make LIKE \"%" .$keyword ."%\" or products.model_no LIKE \"%" .$keyword ."%\") order by products.id DESC");
        return $query->result_array();
    }

    public function getlistby_make($make)
    {
        $query = $this->db->query("SELECT products.id, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id and products.make = \"" . $make ."\" order by products.id DESC");
        return $query->result_array();
    }

    public function getlist($limit = 0)
    {
        if($limit === 0)
            $query = $this->db->query("SELECT products.id, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id order by products.id DESC");
        else
            $query = $this->db->query("SELECT products.id, products.description as description, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id order by products.id DESC LIMIT " . $limit);
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
