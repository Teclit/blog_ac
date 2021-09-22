<?php
class Pages extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('index', $data);
    }

    public function about() {
        $this->view('pages/about');
    }

    public function posts() {
        $this->view('pages/blogs');
    }

    public function fullpost() {
        $this->view('pages/fullpost');
    }
}
