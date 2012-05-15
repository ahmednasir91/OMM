<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 4/2/12
 * Time: 9:55 PM
 * To change this template use File | Settings | File Templates.
 */
class Products extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('products_model');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library(array('session', 'upload', 'parser'));

    }

    public function recentproducts()
    {
        $products = $this->products_model->getrecent(RECENTITEMS);
        $data["products"] = $products;
        $data["title"] = "Recent ";
        $this->load->view("products/recentproducts", $data);
    }

    public function randomproducts()
    {
        $products = $this->products_model->getrandom(RECENTITEMS);
        $data["products"] = $products;
        $data["title"] = "Random ";
        $this->load->view("products/recentproducts", $data);
    }

    public function buy()
    {
        $this->load->model("auth/ion_auth_model");
        $this->load->model("messages/messages_model");
        $seller = $this->input->post("seller");
        $sellerid = $this->ion_auth_model->userid($seller);
        $buyerid = $this->input->post("buyerid");
        $productid = $this->input->post("productid");
        $productname = $this->products_model->productname($productid);
        $buyer = $this->ion_auth_model->username($buyerid);
        $description = "Greetings, ".$buyer. " has bought your product \"" . $productname . "\". You can reply to this message and ask him for more details.";
        $subject = "Your product has been sold.";
        $this->messages_model->save(array("recipientid" => $sellerid, "senderid" => $buyerid, "subject" => $subject, "description" => $description));
        $this->products_model->productsold($productid);
        $this->load->view("products/buydone");
    }

    public function home()
    {
        $products = $this->products_model->getlist(PRODUCT_HOMEPAGE);
        $data["products"] = $products;
        $this->load->view('products/home', $data);
    }

    public function pre_search()
    {
        redirect('/products/search/' . $this->input->post('keyword'));
    }

    public function limit($array, $start, $limit)
    {
        $result = array();
        for($i = 0, $j = $start; ($j < $start + $limit) && ($j < count($array)); $j++, $i++)
            $result[$i] = $array[$j];
        return $result;
    }

    public function search($keyword)
    {
        if(!isset($keyword) || $keyword === "Search%20Products")
        {
            $this->session->set_flashdata("message", "You should enter a keyword for search...");
            redirect("/products");
        }
        elseif(strlen($keyword) > 20)
        {
            $this->session->set_flashdata("message", "Search keyword must be less than 20 characters...");
            redirect("/products");
        }
        else{
        $products = $this->products_model->search($keyword);
        $data['zerorows'] = empty($products);
        if(!empty($products)){
            $config['cur_tag_open'] = '<span class="current">';
            $config['cur_tag_close'] = '</span>';
            $config['num_tag_open'] = '<span class="page larger">';
            $config['num_tag_close'] = '</span>';
            $config['base_url'] = base_url() . "products/search/" . $keyword;
            $config['total_rows'] = count($products);
            $config['per_page'] = PRODUCT_PERPAGE;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $products = $this->limit($products, $page, PRODUCT_PERPAGE);
            $data['links'] = $this->pagination->create_links();
        }
        $data['products'] = $products;
        $this->load->view('products/index', $data);
        }
    }

    public function makeslist()
    {
        $makes = $this->products_model->getmakes();
        $data['makes'] = $makes;
        $this->load->view('products/makes', $data);
    }
    public function pricelist()
    {
        $this->load->view('products/prices');
    }


    public function make($make)
    {
        $products = $this->products_model->getlistby_make($make);
        $data['zerorows'] = empty($products);
        if(!empty($products)){
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span class="page larger">';
        $config['num_tag_close'] = '</span>';
        $config['base_url'] = base_url() . "products/make/" . $make;
        $config['total_rows'] = count($products);
        $config['per_page'] = PRODUCT_PERPAGE;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $products = $this->limit($products, $page, PRODUCT_PERPAGE);
            $data['links'] = $this->pagination->create_links();
        }
        $data['products'] = $products;

        $this->load->view('products/index', $data);
    }

    public function price($lower, $upper)
    {
        $products = $this->products_model->getlistby_price($lower, $upper);
        $data['zerorows'] = empty($products);
        if(!empty($products)){
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span class="page larger">';
        $config['num_tag_close'] = '</span>';
        $config['base_url'] = base_url() . "products/price/" . $lower . "/" . $upper;
        $config['total_rows'] = count($products);
        $config['per_page'] = PRODUCT_PERPAGE;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $products = $this->limit($products, $page, PRODUCT_PERPAGE);
            $data['links'] = $this->pagination->create_links();
        }
        $data['products'] = $products;

        $this->load->view('products/index', $data);
    }


    public function index()
    {
        $products = $this->products_model->getlist();
        $data['zerorows'] = empty($products);
        if(!empty($products)){
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';
        $config['num_tag_open'] = '<span class="page larger">';
        $config['num_tag_close'] = '</span>';
        $config['base_url'] = base_url() . "products/index";
        $config['total_rows'] = count($products);
        $config['per_page'] = PRODUCT_PERPAGE;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $products = $this->limit($products, $page, PRODUCT_PERPAGE);
        $data['links'] = $this->pagination->create_links();
        }
        $data['products'] = $products;
        $this->load->view('products/index', $data);

    }

    public function show($id)
    {
        $product = $this->products_model->getproduct_by_id($id);
        if(!empty($product))
        {
            $product[0]->reviews = modules::run('reviews/index', $id);
            $product[0]->reviewform = modules::run('reviews/addnew', $id);
            $this->load->view('products/show', $product[0]);
        }
        else
            show_error("Product with ID: " . $id . " not found in database.");
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('make', 'Make', 'isnot[Make]|required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('model_no', 'Model Number', 'isnot[Model Number]|required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('description', 'Description', 'isnot[Description]|required|min_length[10]|max_length[1200]');
        $this->form_validation->set_rules('price', 'Price', 'isnot[Price(PKR)]|required|numeric|min_length[3]|max_length[8]');
        $this->form_validation->set_rules('image_url', 'Image', 'callback__do_upload');
        if($this->form_validation->run($this) === FALSE)
        {
            $data["seller_id"] = $this->session->userdata("userid");
            $this->load->view('products/new', $data);
        }
        else
        {
            $post = array();
            $post['seller_id'] = $this->input->post('seller_id');
            $post['make'] = $this->input->post('make');
            $post['model_no'] = $this->input->post('model_no');
            $post['description'] = $this->input->post('description');
            $post['price'] = $this->input->post('price');
            $post['image_url'] = $this->input->post('image_url');
            $post['thumb_url'] = $this->input->post('thumb_url');
            $this->products_model->save($post);
            $this->load->view('products/done');
        }
    }

    public function _do_upload()
    {
        $field_name = 'image_url';
        if ( ! $this->upload->do_upload($field_name))
        {
            $this->form_validation->set_message('_do_upload', $this->upload->display_errors());
            return FALSE;
        }
        else
        {
            $filedata = $this->upload->data();
            $this->load->library('image_moo');
            if($filedata['image_height'] > IMAGE_HEIGHT || $filedata['image_width'] > IMAGE_WIDTH)
            {
                $this->image_moo->load($filedata['full_path']);
                $this->image_moo->resize(IMAGE_WIDTH, IMAGE_HEIGHT);
                $this->image_moo->save($filedata['full_path']);
            }
            $this->image_moo->load($filedata['full_path']);
            $this->image_moo->resize(THUMB_WIDTH, THUMB_HEIGHT, FALSE);
            $this->image_moo->save_pa("", "_thumb", TRUE);
            $_POST['image_url'] =  UPLOAD_PATH . $filedata['file_name'];
            $_POST['thumb_url'] =  UPLOAD_PATH . $filedata['raw_name'] . "_thumb" . $filedata['file_ext'];
            return TRUE;
        }
    }

    public function addnew()
    {
        $isloggedin = $this->session->userdata('isloggedin');
        if($isloggedin)
        {
            $data['seller_id'] = $this->session->userdata('userid');
            $this->load->view('products/new', $data);
        }
        else
        {
            $this->session->set_flashdata("message", "You must be logged in, to list a product for selling.");
            redirect("/products");
        }
    }
}
