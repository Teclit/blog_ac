<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<div class="container text-center">
    <h1>
        Update post
    </h1>

    <form
    action="<?php echo URLROOT; ?>/posts/update/<?php echo $data['post']->id ?>" method="POST">
        <div class="form-item">
            <input
                type="text"
                name="title"
                value="<?php echo $data['post']->title ?>">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>

        <div class="form-item">
            <textarea name="body" placeholder="Enter your post..."><?php echo $data['post']->body ?></textarea>

            <span class="invalidFeedback">
                <?php echo $data['bodyError']; ?>
            </span>
        </div>

        <button class="btn green" name="submit" type="submit">Submit</button>
    </form>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>