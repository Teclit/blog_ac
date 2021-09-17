<?php
class Pages extends Controller {
    public function __construct() {
        // $this->userModel = $this->model('User');
        // $this->userModel = $this->model('Pages');
    }

    public function index() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('pages/index', $data);

    }

    public function about() {
        $data = [
            'title' => 'About page !!!'
        ];

        $this->view('pages/about', $data);
    }

    public function blog() {
        $data = [
            'title' => 'blog page !!!'
        ];

        $this->view('pages/blog', $data);
    }


    public function fullpost() {
        $data = [
            'title' => 'Home page'
        ];

        $this->view('pages/fullpost', $data);
    }
}
