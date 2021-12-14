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
            'category'       =>$category,
            'postTitle'      =>'',
            'body'           =>'',
            'postImage'      =>'',
            'postCategory'   =>'',
            'postTag'        =>'',

            'postTitleError' => '',
            'postBodyError'  => '',
            'postTagError'   => '',
            'postImageError' => ''
        ];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'postTitle'    => trim($_POST['postTitle']),
                'postBody'     => trim($_POST['postBody']),
                'postTag'      => trim($_POST['postTag']),
                'postImage'    => trim($_FILES["postImage"]["name"]),
                'postCategory' => trim($_POST['postCategory']), 
                //'userID'       =>  1,//$_SESSION['userID'],
                
                'postTitleError' => '',
                'postBodyError' => '',
                'postCategoryError' => '',
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
                $data['postTagError'] = 'The Tag of a post must be  a Character';
            } 
            

            if ( empty($data['postTitleError']) && empty($data['postBodyError']) && 
                empty($data['postImageError']) && empty($data['postTagError']) ) {
                    
                if ($this->postModel->addPost($data)) {
                        header("Location: " . URLROOT . "/Posts");
                } else {
                    die("Something went wrong, please try again!");
                }
                
            } else {
                $this->view('posts/create', $data);
            }
        }
        
        $this->view('posts/create', $data);
    }

    public function update($postID) {

        $post = $this->postModel->findPostById($postID);
        $category = $this->postModel->findAllCategory();

        $data = [
            'updateCategory'    =>$category,
            'updatePost'        => $post,
            'updatePostTitle'   =>'',
            'updatePostBody'    =>'',
            'updatePostImage'   =>'',
            'updatePostCategory'=>'',
            'updatePostTag'     =>'',

            'updatePostTitleError'       => '',
            'updatePostBodyError'        => '',
            'updatePostTagError'         => '',
            'updatePostCategoryError'    => '',
            'updatePostImageError'       => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'updatePostID' => $postID,
                'post' => $post,
                // 'userID' => $_SESSION['userID'],
                // 'updateCategory'    =>$category,
                'updatePost'            =>$post,
                'updatePostTitle'       =>trim($_POST['updatePostTitle']),
                'updatePostBody'        =>trim($_POST['updatePostBody']),
                'updatePostImage'       =>trim($_FILES["updatePostImage"]["name"]), //trim($_POST['updatePostImage']),
                'updatePostCategory'    =>trim($_POST['updatePostCategory']),
                'updatePostTag'         =>trim($_POST['updatePostTag']),

                'updatePostTitleError'      => '',
                'updatePostBodyError'       => '',
                'updatePostTagError'        => '',
                'updatePostCategoryError'   => '',
                'updatePostImageError'      => ''
            ];

        

            if(empty($data['updatePostTitle'])) {
                $data['updatePostTitleError'] = 'The postTitle  of a post cannot be empty';
            }

            if(empty($data['updatePostBody'])) {
                $data['updatePostBodyError'] = 'The body of a post cannot be empty';
            }

            if($data['updatePostTitle'] == $this->postModel->findPostById($postID)->postTitle ) {
                $data['updatePostTitleError'] == 'At least change the postTitle !';
            }

            if($data['updatePostBody'] == $this->postModel->findPostById($postID)->postBody) {
                $data['updatePostBodyError'] == 'At least change the body!';
            }

            if (empty($data['updatePostTitleError']) && empty($data['updatePostBodyError'])) {

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

    public function delete($postID) {

        $post = $this->postModel->findPostById($postID);

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

            if($this->postModel->deletePost($postID)) {
                    header("Location: " . URLROOT . "/posts");
            } else {
                die('Something went wrong!');
            }
        }
    }
}

