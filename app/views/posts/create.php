<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


<div class="container text-center my-3">
    <h1>Create new post</h1>

    <form action="<?php echo URLROOT; ?>/posts/create" method="POST" class="mx-5 mb-5">
        <div class="mb-3">
            <label for="postTitle" class="form-label">Title Post</label>
            <input type="text" name="title" class="form-control" id="postTitle" placeholder="Title">
            <span class="invalidFeedback"><?php echo $data['titleError']; ?> </span>
        </div>
        <div class="mb-3">
            <label for="bodyTitle" class="form-label">Body Post</label>
            <textarea class="form-control" name="body" id="bodyTitle" placeholder="Text ..." rows="4"></textarea>
            <span class="invalidFeedback"><?php echo $data['bodyError']; ?></span>

        </div>
        
        <button class=" btn btn-success px-5" name="submit" type="submit">Submit</button>
    </form>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>
