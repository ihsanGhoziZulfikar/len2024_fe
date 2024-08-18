<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('curl');
    }

    // Fetch all locations
    public function locations() {
        $response = $this->curl->simple_get('http://localhost:8080/location');
        $data['locations'] = json_decode($response, true);
        // $this->load->view('locations_view', $data);
        $this->load->view('index', $data);
    }

    // Fetch all projects
    public function projects() {
        $response = $this->curl->simple_get('http://localhost:8080/project');
        $data['projects'] = json_decode($response, true);
        $this->load->view('projects_view', $data);
    }
}
