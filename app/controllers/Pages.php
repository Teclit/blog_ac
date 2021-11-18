<?php
class Pages extends Controller {
    public function __construct() {
        //$this->userModel = $this->model('User');
    }

    public function index() {
        $data = [
            'postTitle ' => 'Home page'
        ];
        
        
        $this->view('index', $data);
    }

    public function about() {
        $data = [
            'postTitle ' => 'about page'
        ];
        $this->view('pages/about', $data);
    }

    public function posts() {
        $data = [
            'postTitle ' => 'posts page'
        ];
        $this->view('pages/blogs', $data);
    } 

    public function dashboard() {
        $data = [
            'postTitle ' => 'posts page'
        ];
        $this->view('pages/dashboard', $data);
    }

    public function fullpost() {
        $data = [
            'postTitle ' => 'fullpost page'
        ];
        $this->view('pages/fullpost', $data);
    }
}
