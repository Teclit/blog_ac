<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


<div class="container text-center my-3">
    <h1>Create new post</h1>

    <form action="<?php echo URLROOT; ?>/posts/create" method="POST" enctype="multipart/form-data" class="mx-5 mb-5" >
        <div class="mb-1">
            <label for="postTitle" class="form-label">Title Post</label>
            <input type="text" name="title" class="form-control" id="postTitle" placeholder="Title">
            <span class="invalidFeedback"><?php echo $data['postTitleError']; ?> </span>
        </div>
        
        <div class="mb-1">
            <label for="postImage" class="form-label">Image Post</label>
            <input type="file" name="postImage" class="form-control" id="postImage" placeholder="postImage">
            <span class="invalidFeedback"><?php echo $data['postBodyError']; ?></span>

        </div>
        
        <div class="mb-1">
            <label for="postCategory" class="form-label">Category Post</label>
            <input type="text" name="postCategory" class="form-control" id="postCategory" placeholder="Category Post">
            <span class="invalidFeedback"><?php echo $data['postBodyError']; ?></span>

        </div>
        
        <div class="mb-1">
            <label for="postTag" class="form-label">Tag Post</label>
            <input type="text" name="postTag" class="form-control" id="postTag" placeholder="Tag Post">
            <span class="invalidFeedback"><?php echo $data['postTagError']; ?></span>

        </div>

        <div class="mb-3">
            <label for="PostBody" class="form-label">Body Post</label>
            <textarea class="form-control" name="body" id="PostBody" placeholder="Text ..." rows="4"></textarea>
            <span class="invalidFeedback"><?php echo $data['postBodyError']; ?></span>

        </div>
        
        <button class=" btn btn-success px-5" name="submit" type="submit">Submit</button>
    </form>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>
