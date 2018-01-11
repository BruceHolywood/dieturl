<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="splash-subhead">', '</p>');
    }
    
    public function index()
    {
        
        //check for and initialise array if not exists
        if (empty($this->session->userdata('url_array'))) {
            $url_array = [];
            $this->session->set_userdata('url_array', $url_array);
        }
        
        //sets validation rules
        $this->form_validation->set_rules('url_address', $this->lang->line('encode_type_url_here'), 'required|min_length[1]|max_length[1000]|valid_url|trim');
        
        if ($this->form_validation->run() == FALSE) {
            // Set initial values for the view
            $page_data = array(
                'success_fail' => null,
                'encoded_url' => false
            );
            
            $this->load->view('create/create', $page_data);
        } else {
            //assign posted url to variable
            $long_url = $this->input->post('url_address');
            //assign current session array to variable
            $existing_url_array = $this->session->userdata('url_array');
            
            //loop through array comparing random generated url code to ensure we dont get two the same
            do {
                $url_code = random_string('alnum', 8);

                if(in_array($url_code, $existing_url_array)){
                    $url_code = random_string('alnum', 8);  
                }
                else{
                    $end = 1;  
                }

            } while ($end <= 0);            

            //update session array variable with new key and long url
            $url_pair_array = [ $url_code => $long_url ];

            //set suvvess data
            $page_data['success_fail'] = 'success';
            
            // Build link which will be displayed to the user
            $encoded_url = base_url() . $url_code;
            $page_data['encoded_url'] = $encoded_url;
            
            //create updated array variable by merging existing session array with updated key array
            $updated_array = array_merge($existing_url_array, $url_pair_array);
            
            //unset current session url array
            $this->session->unset_userdata('url_array');
            
            //set new session url array with updated one
            $this->session->set_userdata('url_array', $updated_array);

            //load view
            $this->load->view('create/create', $page_data);
        }
    }
}