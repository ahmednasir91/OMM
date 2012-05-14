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

    public function unread($id)
    {
        $query = $this->db->query('SELECT id FROM messages where recipientid='.$id . " and isread = 0");
        return $query->num_rows();
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

    public function get_username($id)
    {
        $query = $this->db->query('SELECT username from users where id = ' . $id);
        $result = $query->result();
        return $result[0]->username;
    }

    public function save($message)
    {
        return $this->db->insert('messages', $message);
    }

    public function get($userid)
    {
        $query = $this->db->query("SELECT * FROM messages where recipientid = " . $userid . " order by id DESC");
        $result = $query->result();
        if($query->num_rows() > 0)
        {
            foreach($result as $row)
            {
                $temp = $this->db->query("SELECT username from users where id = " . $row->senderid);
                $temp = $temp->result();
                $row->sender = $temp[0]->username;
                $row->read_link = "/messages/show/" . $row->id;
                $row->delete_link = "/messages/delete/" . $row->id;
                $row->unread = ($row->isread === "0");
            }
        }
        return $result;
    }

    public function getmessage($id)
    {
        $query = $this->db->query("SELECT * FROM messages where id = " . $id);
        $result = $query->result();
        $temp = $this->db->query("SELECT username from users where id = " . $result[0]->senderid);
        $temp = $temp->result();
        $result[0]->sender = $temp[0]->username;
        $result[0]->reply_link = "/messages/addnew/".$result[0]->senderid;
        $datestring = "%F %j, %Y, %g:%i %a";
        $result[0]->date = mdate($datestring, strtotime($result[0]->date));
        $this->db->where("id", $id);
        $this->db->update('messages', array("isread" => 1));
        return $query->result();
    }

    public function delete($id)
    {
        $this->db->delete('messages', array('id' => $id));
    }
}
