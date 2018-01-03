<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Go extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
    }
    
    public function index()
    {
        $existing_url_array = $this->session->userdata('url_array');
        $goto_url = $existing_url_array[$this->uri->segment(1)];
        redirect(prep_url($goto_url));
    }
}