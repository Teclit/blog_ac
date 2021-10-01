<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

<div class="container">
    <?php if(isLoggedIn()): ?>
        <a class="btn green" href="<?php echo URLROOT; ?>/posts/create">
            Create
        </a>
    <?php endif; ?>
    <section class="container my-4">
        <div class="row g-0">
            <p class="fs-2 fw-bold"> <span class="fs-1 me-2" >|</span> ነገራት<hr></p>
        </div>
        <div class="row">
            <?php foreach($data['posts'] as $post): ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="thumbnail text-center">
                        <img src="<?php echo URLROOT;?>/public/img/img-1.jpg" alt="" class=" img-fluid imgpost">
                        <div class="pt-2">
                            <a href="<?php echo URLROOT; ?>/fullpost" target="_blank"><h5 class="fw-bold textJustify">
                                <?php echo $post->title; ?> 
                            
                            </h5></a>
                            <p class="text-start"><span class="badge bg-dark text-light me-3">News</span><?php echo 'Created on: ' . date('F j h:m', strtotime($post->created_at)) ?></p>
                            <p class="textJustify">
                                <?php if (strlen($post->body)>150) { $post->body = substr($post->body,0,150)."...";} echo $post->body; ?>
                                <hr><?php echo strlen($post->body); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>

<?php
    require APPROOT . '/views/includes/footer.php';
?>
