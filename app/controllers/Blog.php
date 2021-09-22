<?php
class Blog extends Controller {
    public function __construct() {
        // $this->userModel = $this->model('User');
        // $this->userModel = $this->model('Pages');
    }

    public function blog() {
        $data = [
            'title' => 'blog page !!!'
        ];

        $this->view('pages/blog', $data);
    }

}
