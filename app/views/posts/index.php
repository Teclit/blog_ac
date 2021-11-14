<?php
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navigation.php';
?>

    <div class="container my-2">
        
            <a class="btn bg-success " href="<?php echo URLROOT; ?>/posts/create">Create</a>
        
    </div>
            
    <section class="container my-4">
        <div class="row g-0">
            <p class="fs-2 fw-bold"> <span class="fs-1 me-1" >|</span>ነገራት<hr></p>
        </div>
        <div class="row">
            <?php foreach($data['posts'] as $post): ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="thumbnail text-center">
                        <a  href="<?php echo URLROOT; ?>/pages/fullpost" class="readArticle" target="_blank">
                            <img src="<?php echo URLROOT;?>/public/img/img-1.jpg" alt="" class=" img-fluid imgpost">
                        </a>
                        <div class="pt-2">
                            <a href="<?php echo URLROOT; ?>/pages/fullpost" target="_blank"><h5 class="fw-bold textJustify">
                                <?php echo $post->title; ?> 
                            
                            </h5></a>
                            <p class="text-start"><span class="badge bg-dark text-light me-3">News</span><?php echo date('F j, Y, g:i a', strtotime($post->created_at)) ?></p>
                            <p class="textJustify">
                                <?php if (strlen($post->body)>150) { $post->body = substr($post->body,0,150)."...";} echo $post->body; ?>
                            </p>
                        </div>
*                    </div>
                    <hr>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
