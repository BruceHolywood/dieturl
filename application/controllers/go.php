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
        //gets existing session url array and assigns to variable
        $existing_url_array = $this->session->userdata('url_array');
        
        //get uri segment from where controller segment would usually be thanks to the change in our routes file - this ends up being our url key and use that to plus the correct url from the array
        $goto_url = $existing_url_array[$this->uri->segment(1)];
        //redirect to url
        redirect(prep_url($goto_url));
    }
}