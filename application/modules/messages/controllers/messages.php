<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/2/12
 * Time: 9:55 PM
 * To change this template use File | Settings | File Templates.
 */
class Messages extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('messages_model');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('session', 'upload', 'parser'));
    }

    function show($id)
    {
        $message = $this->messages_model->getmessage($id);
        $data['message'] = $message[0];
        $this->load->view("messages/show", $data);
    }

    public function delete($id)
    {
        $this->messages_model->delete($id);
        $this->session->set_flashdata("message", "Message has been deleted.");
        redirect("/messages/index");
    }

    function index()
    {
        $messages = $this->messages_model->get($this->session->userdata("userid"));
        $data['messages'] = $messages;
        $data['nomessage'] = empty($messages);
        $this->load->view('messages/index', $data);
    }
    function check_username($username)
    {
        $get_result = $this->messages_model->check_username($username);
        if(!$get_result )
        {
            $this->session->set_flashdata("message", 'The recipient doesn\'t exists.');
            return false;
        }
        return $get_result;

    }
    public function addnew($id = 0)
    {
        $data['recipientid'] = $id;
        if($id !== 0)
            $data['recipient'] = $this->messages_model->get_username($id);
        $data["senderid"] = $this->session->userdata("userid");
        $this->load->view('messages/new', $data);
    }
    public function create()
    {
        $recipient = $this->input->post("recipient");
        $recipient = $this->check_username($recipient);
        if(!$recipient)
            redirect("messages/addnew");
        $message['recipientid'] = $recipient->id;
        $message['senderid'] = $this->input->post('senderid');
        if($message['recipientid'] == $message['senderid'])
        {
            $this->session->set_flashdata("message", 'You cannot send message to yourself!');
            redirect("/messages/addnew");
        }
        $message['description'] = $this->input->post('description');
        $message['subject'] = $this->input->post('subject');
        if($this->messages_model->save($message))
        {
            $this->session->set_flashdata("message", 'Message has been sent!');
            redirect("/products");
        }
        else
        {
            $this->session->set_flashdata("message", 'Error sending message!');
            $this->load->view('messages/addnew');
        }
    }
}
