<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Guzzle {
    protected $client;

    public function __construct() {
        $this->client = new Client();
    }

    public function get($url) {
        try {
            $response = $this->client->request('GET', $url);
            return $response->getBody()->getContents();
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            log_message('error', 'Request failed: ' . $e->getMessage());
            return null;
        }
    }

    public function post($url, $data) {
        try {
            log_message('debug', 'Sending POST request to: ' . $url);
            log_message('debug', 'Data: ' . json_encode($data));
            
            $response = $this->client->request('POST', $url, [
                'json' => $data,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);
    
            log_message('debug', 'Response Status Code: ' . $response->getStatusCode());
            log_message('debug', 'Response Body: ' . $response->getBody()->getContents());
            
            return $response->getStatusCode() == 200;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }

    public function put($url, $data) {
        try {
            $response = $this->client->request('PUT', $url, [
                'json' => $data,
                'headers' => ['Content-Type' => 'application/json']
            ]);
            return $response->getStatusCode() == 200;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }
    
    public function delete($url) {
        try {
            $response = $this->client->request('DELETE', $url);
            return $response->getStatusCode() == 200;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            log_message('error', $e->getMessage());
            return false;
        }
    }
}
