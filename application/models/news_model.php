<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 3/31/12
 * Time: 11:52 PM
 * To change this template use File | Settings | File Templates.
 */
class News_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($SLUG = false)
    {
        if($SLUG === false)
        {
            $query = $this->db->get("news");
            return $query->result_array();
        }
        $query = $this->db->get_where("news", array("slug" => $SLUG));
        return $query->row_array();
    }

    public function set_news()
    {
        $this->load->helper('url');
        $slug = url_title($this->input->post('title'), 'dash', true);
        $data = array(
            'title' => $this->input->post('title'),
            'text' => $this->input->post('text'),
            'slug' => $slug
        );
        return $this->db->insert('news', $data);
    }

}
