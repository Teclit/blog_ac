<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';

   // print_r($data);
?>

<div class="container text-center my-3 p-5 border border-2 border-dark rounded ">
    <h2 class="fw-bold">Update New Post</h2>

    <form action="<?php echo URLROOT; ?>/posts/update/<?php echo $data['updatePost']->postID ?>" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
        <div class="mb-2">
            <label for="postTitle" class="form-label fw-bold">Update Title Post</label>
            <input type="text" name="updatePostTitle" class="form-control" id="postTitle" value="<?php echo $data['updatePost']->postTitle; ?>">
            <span class="invalidFeedback"><?php echo $data['updatePostTitleError']; ?> </span>
        </div>
        
        <div class="mb-2">
            <label for="postImage" class="form-label fw-bold">Image Post</label>
            <input type="file" name="updatePostImage" class="form-control" id="postImage" value="<?php echo $data['updatePost']->postImage; ?>">
            <span class="invalidFeedback"><?php echo $data['updatePostBodyError']; ?></span>

        </div>
        
        <div class="mb-2">
            <label for="postCategory" class="form-label fw-bold"> Choose Categroy </label>
                <select class="form-control" name="updatePostCategory" id="postCategory"  >
                    <option value="<?php echo $data['updatePost']->categoryID; ?>"><?php echo $data['updatePost']->categoryName; ?></option>
                    <?php foreach ($data['updateCategory'] as $category) { 
                        if($category->categoryID != $data['updatePost']->categoryID){
                        ?>
                        <option value=<?php echo $category->categoryID; ?>> <?php echo $category->categoryName ; ?></option>
                    <?php }} ;?>
                </select>
                <span class="invalidFeedback"><?php echo $data['updatePostTagError']; ?></span>

        </div>
        
        <div class="mb-2">
            <label for="postTag" class="form-label fw-bold">Tag Post</label>
            <input type="text" name="updatePostTag" class="form-control" id="postTag" value="<?php echo $data['updatePost']->postTag; ?>">
            <span class="invalidFeedback"><?php echo $data['updatePostTagError']; ?></span>

        </div>

        <div class="mb-5">
            <label for="postBody" class="form-label fw-bold">Body Post</label>
            <textarea class="form-control" name="updatePostBody" id="postBody" rows="15"><?php echo $data['updatePost']->postBody;?></textarea>
            <span class="invalidFeedback"><?php echo $data['updatePostBodyError']; ?></span>

        </div>
        
        <button class=" btn btn-success px-5" name="submit" type="submit">Update Post</button>

    </form>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>