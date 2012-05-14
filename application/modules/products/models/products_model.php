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
            $query = $this->db->query("SELECT products.sold as sold, products.id, products.description as description, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id and products.price <= " . $upper ." and products.price >= " . $lower ." and sold = 0 order by products.id DESC");
        else
            $query = $this->db->query("SELECT products.sold as sold, products.id, products.description as description, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id and products.price >= " . $lower ." and sold = 0 order by products.id DESC");
        return $query->result_array();
    }
    public function productname($productid)
    {
        $query = $this->db->query("Select make, model_no from products where id = " . $productid);
        $result = $query->result();
        $name = $result[0]->make . " " . $result[0]->model_no;
        return $name;
    }

    public function productsold($productid)
    {
        $this->db->where('id', $productid);
        $this->db->update('products', array("sold" => 1));
    }

    public function search($keyword)
    {
        $query = $this->db->query("SELECT products.sold as sold, products.id, products.description as description, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id and (products.make LIKE \"%" .$keyword ."%\" or products.model_no LIKE \"%" .$keyword ."%\") order by products.id DESC");
        return $query->result_array();
    }

    public function getlistby_make($make)
    {
        $query = $this->db->query("SELECT products.sold as sold, products.id, products.description as description, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id and products.make = \"" . $make ."\" and sold = 0  order by products.id DESC");
        return $query->result_array();
    }

    public function getrecent($limit)
    {
        $query = $this->db->query("SELECT id, model_no, make from products where sold = 0 order by id DESC limit " . $limit);
        return $query->result();
    }

    public function getrandom($limit)
    {
        $query = $this->db->query("SELECT id, model_no, make from products where sold = 0 order by RAND() limit " . $limit);
        return $query->result();
    }

    public function getlist($limit = 0)
    {
        if($limit === 0)
            $query = $this->db->query("SELECT products.sold as sold, products.id, products.description as description, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id  and sold = 0  order by products.id DESC");
        else
            $query = $this->db->query("SELECT products.sold as sold, products.id, products.description as description, username as seller, make, model_no, price, thumb_url from users, products where products.seller_id = users.id  and sold = 0  order by products.id DESC LIMIT " . $limit);
        return $query->result_array();
    }

    public function getproduct_by_id($id)
    {
        $query = $this->db->query("SELECT products.sold as sold, products.id, products.description as description, username as seller, make, model_no, price, image_url, description from users, products where products.seller_id = users.id and products.id = " . $id);
        return $query->result();
    }

    public function save($data)
    {
        $data["thumb_url"] = substr($data["thumb_url"], 1, strlen($data["thumb_url"]) - 1);
        return $this->db->insert('products', $data);
    }


}
