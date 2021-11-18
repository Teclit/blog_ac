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
        // if(!isLoggedIn()) {
        //     header("Location: " . URLROOT . "/posts");
        // }

        $data = [
            'postTitle ' => '',
            'body' => '',
            'postTitle Error' => '',
            'bodyError' => '',
            'imageError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'userID' => $_SESSION['userID'],
                'postTitle '   => trim($_POST['postTitle ']),
                'body'    => trim($_POST['body']),
                'image'   => trim($_FILES["postImage"]["name"]),
                'target'  => trim($_FILES['postImage']['name']), //URLROOT."/public/uploads/".basename

                'postTitle Error' => '',
                'bodyError' => '',
                'imageError' => ''
            ];

            if(empty($data['postTitle '])) {
                $data['postTitle Error'] = 'The postTitle  of a post cannot be empty';
            }

            if(empty($data['body'])) {
                $data['bodyError'] = 'The body of a post cannot be empty';
            }

            if(empty($data['body'])) {
                $data['imageError'] = 'The image of a post cannot be empty';
            }

            if (empty($data['postTitle Error']) && empty($data['bodyError']) && empty($data['imageError'])) {
                
                // if(move_uploaded_file($_FILES["postImage"]["tmp_name"], $data['target'])) {
                //     echo "image uploaded !!! ";
                    if ($this->postModel->addPost($data)) {
                        header("Location: " . URLROOT . "/posts");
                    } else {
                        die("Something went wrong, please try again!");
                    }
                    
                // }else{
                //     echo "image does not upload!";
                // }

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
            'bodyError' => '',
            'imageError' => ''
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
                'bodyError' => '',
                'imageError' => ''
            ];

            if(empty($data['postTitle '])) {
                $data['postTitle Error'] = 'The postTitle  of a post cannot be empty';
            }

            if(empty($data['body'])) {
                $data['bodyError'] = 'The body of a post cannot be empty';
            }

            if($data['postTitle '] == $this->postModel->findPostById($id)->postTitle ) {
                $data['postTitle Error'] == 'At least change the postTitle !';
            }

            if($data['body'] == $this->postModel->findPostById($id)->body) {
                $data['bodyError'] == 'At least change the body!';
            }

            if (empty($data['postTitle Error']) && empty($data['bodyError'])) {
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
            'bodyError' => ''
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

