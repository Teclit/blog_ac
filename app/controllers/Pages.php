<?php
class Pages extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    // public function index() {
    //     $data = [
    //         'title' => 'Home page'
    //     ];
        
        
    //     $this->view('index', $data);
    // }

    public function about() {
        $data = [
            'title' => 'about page'
        ];
        $this->view('pages/about', $data);
    }

    public function posts() {
        $data = [
            'title' => 'posts page'
        ];
        $this->view('pages/blogs', $data);
    }

    public function fullpost() {
        $data = [
            'title' => 'fullpost page'
        ];
        $this->view('pages/fullpost', $data);
    }
}
