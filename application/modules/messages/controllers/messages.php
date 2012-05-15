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
    function recipient_exists($recipient)
    {
        $this->load->model("auth/ion_auth_model");
        if($this->ion_auth_model->check_username($recipient))
        {

            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('recipient_exists', 'The recipient doesnot exists in database.');
            return FALSE;
        }

    }
    public function addnew($id = 0)
    {
        $this->load->model("auth/ion_auth_model");
        $data['recipientid'] = $id;
        if($id !== 0)
            $data['recipient'] = $this->ion_auth_model->username($id);
        $data["senderid"] = $this->session->userdata("userid");
        $this->load->view('messages/new', $data);
    }
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('recipient', 'Recipient', 'isnot[Recipient]|callback_recipient_exists');
        $this->form_validation->set_rules('subject', 'Subject', 'isnot[Subject]|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('description', 'Message', 'isnot[Message]|min_length[3]|max_length[1000]');
        if($this->form_validation->run($this) == FALSE)
        {
            $this->load->view("messages/new", array("recipientid" => 0, "senderid" => $this->session->userdata("userid")));
        }
        else
        {
            $recipient = $this->input->post("recipient");
            $message['recipientid'] = $this->ion_auth_model->userid($recipient);
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
}
