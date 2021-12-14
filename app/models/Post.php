<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllPosts() {
        $this->db->query('SELECT * FROM posts LEFT JOIN category ON category.categoryID = posts.categoryID ORDER BY postCreated_at DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function addPost($data) {
        $this->db->query('INSERT INTO posts (postTitle , postBody, postImage, categoryID)
                        VALUES ( :postTitle , :postBody, :postImage, :categoryID )');

        
        $this->db->bind(':postTitle', $data['postTitle']);
        $this->db->bind(':postBody',  $data['postBody']);
        $this->db->bind(':postImage', $data['postImage']);
        // $this->db->bind(':userID',    $data['userID']);
        $this->db->bind(':categoryID',$data['postCategory']);
        
        // Image Resize
        $imageName= $data['postImage'];
        $tmpName=  $_FILES['postImage']['tmp_name'];
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

        $this->db->query('SELECT * FROM posts LEFT JOIN category ON category.categoryID = posts.categoryID WHERE postID = :postID');
        $this->db->bind(':postID', $postID);
        $row = $this->db->single();
        return $row;
    }

    public function updatePost($data) {

        $this->db->query('UPDATE posts SET postTitle  = :postTitle , postBody = :postBody,
                    postImage = :postImage, categoryID=:categoryID WHERE postID = :postID');

        
        $this->db->bind(':postTitle',   $data['updatePostTitle']);
        $this->db->bind(':postImage',   $data['updatePostImage']);
        $this->db->bind(':postBody',    $data['updatePostBody']);
        $this->db->bind(':categoryID',  $data['updatePostCategory']);
        $this->db->bind(':postID',      $data['updatePostID']);

        // Image upload
        $imageName= $data['updatePostImage'];
        $tmpName=  $_FILES['updatePostImage']['tmp_name'];
        $fileName=$_SERVER["DOCUMENT_ROOT"].URLDOCS.$imageName; //$directoryName.$imageName;
        
        
        if(move_uploaded_file($tmpName, $fileName )) {
            
            if ($this->db->execute()) {
            
                return true;
            } else {
                return false;
            }

        }else{
            echo $_SERVER["DOCUMENT_ROOT"] ."<br>";
            // echo "images does not upload!";
        };

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

    public function findAllCategory() {
        $this->db->query('SELECT * FROM category ORDER BY categoryName ASC');
        $results = $this->db->resultSet();
        return $results;
    }


}
