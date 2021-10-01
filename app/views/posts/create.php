<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>


<div class="container text-center">
    <h1>
        Create new post
    </h1>

    <form action="<?php echo URLROOT; ?>/posts/create" method="POST">
        <div class="form-item">
            <input type="text" name="title" placeholder="Title...">

            <span class="invalidFeedback">
                <?php echo $data['titleError']; ?>
            </span>
        </div>

        <div class="form-item">
            <textarea name="body" placeholder="Enter your post..."></textarea>

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
