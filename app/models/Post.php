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

        //$this->db->bind(':userID', $data['userID']);
        $this->db->bind(':postTitle', $data['postTitle']);
        $this->db->bind(':postBody',   $data['postBody']);
        $this->db->bind(':postImage',  $data['postImage']);

        // Image Resize
        $imageName= $data['postImage'];
        $tmpName=  $_FILES['postImage']['tmp_name'];
        $directoryName = $_SERVER["DOCUMENT_ROOT"].URLDOCS;     //folder where image will upload
        $fileName=$_SERVER["DOCUMENT_ROOT"].URLDOCS.$imageName; //$directoryName.$imageName;
        
        
        if(move_uploaded_file($tmpName, $fileName )) {
            
            try {
                if ($this->db->execute()) {
                        return true;
                }
            }
            catch (PDOException $e){
                //display error  message
                echo $e;
                return false;
            }

        }else{
            echo $_SERVER["DOCUMENT_ROOT"] ."<br>";
            // echo "images does not upload!";
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
