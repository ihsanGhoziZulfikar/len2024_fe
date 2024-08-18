<?php
class ProjectLocationController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load the Guzzle
        $this->load->library('Guzzle');
    }

    private function add_cors_headers() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        // Handle preflight OPTIONS request
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit;
        }
    }

    public function index() {
        $this->add_cors_headers();
        // Fetch data from the Location and Project APIs using Guzzle
        $locationData = $this->guzzle->get('http://localhost:8080/location');
        $projectData = $this->guzzle->get('http://localhost:8080/project');
        $locationProjectData = $this->guzzle->get('http://localhost:8080/locationProject');

        // Decode the JSON response into arrays
        $data['locations'] = json_decode($locationData, true);
        $data['projects'] = json_decode($projectData, true);
        $data['locationProjects'] = json_decode($locationProjectData, true);

        // Pass the data to the view
        $this->load->view('index.php', $data);
    }

    public function form() {
        $this->load->view('project_and_location_form');
    }

    public function relation_form() {
        $this->load->view('project_location_form');
    }

    public function add_project() {
        $data = array(
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => date('Y-m-d\TH:i:s', strtotime($this->input->post('tglMulai'))),
            'tglSelesai' => date('Y-m-d\TH:i:s', strtotime($this->input->post('tglSelesai'))),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan'),
            'createdAt' => date('Y-m-d\TH:i:s')
        );

        $url = 'http://localhost:8080/project';
        $response = $this->guzzle->post($url, $data);

        if ($response) {
            redirect('/');
        } else {
            show_error('Failed to add project.');
        }
    }

    public function add_location() {
        $data = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'createdAt' => date('Y-m-d\TH:i:s')
        );

        $url = 'http://localhost:8080/location';
        $response = $this->guzzle->post($url, $data);

        if ($response) {
            redirect('/');
        } else {
            show_error('Failed to add location.');
        }
    }
    public function edit_project($id) {
        $url = "http://localhost:8080/project/$id";
        $projectData = $this->guzzle->get($url);
        $data['project'] = json_decode($projectData, true);

        if (empty($data['project'])) {
            show_error('Project not found.');
        }

        $this->load->view('edit_project', $data);
    }

    public function update_project($id) {
        $data = array(
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => date('Y-m-d\TH:i:s', strtotime($this->input->post('tglMulai'))),
            'tglSelesai' => date('Y-m-d\TH:i:s', strtotime($this->input->post('tglSelesai'))),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan'),
            'createdAt' => date('Y-m-d\TH:i:s')
        );

        $url = "http://localhost:8080/project/$id";
        $response = $this->guzzle->put($url, $data);

        if ($response) {
            redirect('/');
        } else {
            show_error('Failed to update project.');
        }
    }

    public function delete_project($id) {
        $url = "http://localhost:8080/project/$id";
        $response = $this->guzzle->delete($url);

        if ($response) {
            redirect('/');
        } else {
            show_error('Failed to delete project.');
        }
    }

    public function edit_location($id) {
        $url = "http://localhost:8080/location/$id";
        $locationData = $this->guzzle->get($url);
        $data['location'] = json_decode($locationData, true);

        if (empty($data['location'])) {
            show_error('Location not found.');
        }

        $this->load->view('edit_location', $data);
    }

    public function update_location($id) {
        $data = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota'),
            'createdAt' => date('Y-m-d\TH:i:s')
        );

        $url = "http://localhost:8080/location/$id";
        $response = $this->guzzle->put($url, $data);

        if ($response) {
            redirect('/');
        } else {
            show_error('Failed to update location.');
        }
    }

    public function delete_location($id) {
        $url = "http://localhost:8080/location/$id";
        $response = $this->guzzle->delete($url);

        if ($response) {
            redirect('/');
        } else {
            show_error('Failed to delete location.');
        }
    }

    public function delete_location_project($id) {
        $url = "http://localhost:8080/locationProject/$id";
        $response = $this->guzzle->delete($url);

        if ($response) {
            redirect('/');
        } else {
            show_error('Failed to delete location.');
        }
    }
}
