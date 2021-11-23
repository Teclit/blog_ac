<?php
class Posts extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $posts = $this->postModel->findAllPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function create() {

        $category = $this->postModel->findAllCategory();

        $data = [
            'category' => $category,
            'postTitle' => '',
            'body' => '',
            'postTitleError' => '',
            'postBodyError' => '',
            'postTagError' => '',
            'postImageError' => ''
        ];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'userID'       =>  1,//$_SESSION['userID'],
                'postTitle'    => trim($_POST['postTitle']),
                'postBody'     => trim($_POST['postBody']),
                'postCategory' => trim($_POST['postCategory']),
                'postTag'      => trim($_POST['postTag']),
                'postImage'    => trim($_FILES["postImage"]["name"]),
                
                'postTitleError' => '',
                'postBodyError' => '',
                'postCategory' => '',
                'postTagError' => '',
                'postImageError' => ''
            ];

            if(empty($data['postTitle'])) {
                $data['postTitleError'] = 'The postTitle  of a post cannot be empty';
            }

            if(empty($data['postBody'])) {
                $data['postBodyError'] = 'The body of a post cannot be empty';
            }

            if(empty($data['postImage'])) {
                $data['postImageError'] = 'The image of a post cannot be empty';
            }

            if(empty($data['postTag'])) {
                $data['postImageError'] = 'The Tag of a post must be  a Character';
            } 
            

            if (empty($data['postTitleError']) && empty($data['postBodyError']) && 
                empty($data['postImageError']) && empty($data['postTag'])) {
                    
                if ($this->postModel->addPost($data)) {
                        header("Location: " . URLROOT . "/posts");
                    } else {
                        die("Something went wrong, please try again!");
                    }
                
            } else {
                $this->view('posts/create', $data);
            }
        }
        
        $this->view('posts/create', $data);
    }

    public function update($id) {

        $post = $this->postModel->findPostById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        } elseif($post->userID != $_SESSION['userID']){
            header("Location: " . URLROOT . "/posts");
        }

        $data = [
            'post' => $post,
            'postTitle ' => '',
            'body' => '',
            'postTitle Error' => '',
            'postBodyError' => '',
            'postImageError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'post' => $post,
                'userID' => $_SESSION['userID'],
                'postTitle ' => trim($_POST['postTitle ']),
                'body' => trim($_POST['body']),
                'postTitle Error' => '',
                'postBodyError' => '',
                'postImageError' => ''
            ];

            if(empty($data['postTitle'])) {
                $data['postTitleError'] = 'The postTitle  of a post cannot be empty';
            }

            if(empty($data['postBody'])) {
                $data['postBodyError'] = 'The body of a post cannot be empty';
            }

            if($data['postTitle'] == $this->postModel->findPostById($id)->postTitle ) {
                $data['postTitleError'] == 'At least change the postTitle !';
            }

            if($data['postBody'] == $this->postModel->findPostById($id)->body) {
                $data['postBodyError'] == 'At least change the body!';
            }

            if (empty($data['postTitleError']) && empty($data['postBodyError'])) {
                if ($this->postModel->updatePost($data)) {
                    header("Location: " . URLROOT . "/posts");
                } else {
                    die("Something went wrong, please try again!");
                }
            } else {
                $this->view('posts/update', $data);
            }
        }

        $this->view('posts/update', $data);
    }

    public function delete($id) {

        $post = $this->postModel->findPostById($id);

        if(!isLoggedIn()) {
            header("Location: " . URLROOT . "/posts");
        } elseif($post->userID != $_SESSION['userID']){
            header("Location: " . URLROOT . "/posts");
        }

        $data = [
            'post' => $post,
            'postTitle ' => '',
            'body' => '',
            'postTitle Error' => '',
            'postBodyError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->postModel->deletePost($id)) {
                    header("Location: " . URLROOT . "/posts");
            } else {
               die('Something went wrong!');
            }
        }
    }
}

