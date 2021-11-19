<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllPosts() {
        $this->db->query('SELECT * FROM posts ORDER BY postCreated_at DESC');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addPost($data) {
        $this->db->query('INSERT INTO posts (postTitle , postBody, postImage) VALUES ( :postTitle , :postBody, :postImage)');

        // $this->db->bind(':userID', $data['userID']);
        $this->db->bind(':postTitle ', $data['postTitle']);
        $this->db->bind(':postBody',   $data['postBody']);
        $this->db->bind(':postImage',  $data['postImage']);

        
        
        if(move_uploaded_file($_FILES['postImage']["tmp_name"], $_SERVER["DOCUMENT_ROOT"].URLDOCS.$data['postImage'])) {
            echo "post does not upload! <br><hr>";
                print_r($data);
            // if ($this->db->execute()) {
                
            //     return true;
            // } else {
            //     return false;
            // }

        }else{
            echo $_SERVER["DOCUMENT_ROOT"] ."<br>";
            echo "images does not upload!";
        };

        
    }

    public function findPostById($postID) {
        $this->db->query('SELECT * FROM posts WHERE postID = :postID');

        $this->db->bind(':postID', $postID);

        $row = $this->db->single();

        return $row;
    }

    public function updatePost($data) {
        $this->db->query('UPDATE posts SET postTitle  = :postTitle , postBody = :postBody WHERE postID = :postID');

        $this->db->bind(':postID', $data['postID']);
        $this->db->bind(':postTitle ', $data['postTitle ']);
        $this->db->bind(':postBody', $data['postBody']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($postID) {
        $this->db->query('DELETE FROM posts WHERE postID = :postID');

        $this->db->bind(':postID', $postID);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
