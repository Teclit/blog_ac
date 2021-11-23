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
                <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12 mb-2">
                        <div class="card" > 
                            <a  href="<?php echo URLROOT; ?>/pages/fullpost" class="readArticle " target="_blank">
                                <img src="<?php echo URLROOT;?>/public/uploads/<?php echo $post->postImage; ?>"  class="img-fluid pb-2 imgpost imgPostCol" alt="Images post" >
                            </a>
                        
                        <div class="text-center px-2 ">
                            <a href="<?php echo URLROOT; ?>/pages/fullpost" target="_blank">
                                <h5 class="fw-bold textJustify "><?php if (strlen($post->postTitle)>50) { $post->postTitle = substr($post->postTitle,0,50)."...";} echo $post->postTitle; ?> </h5>
                            </a>
                            <p class="text-start "><span class="badge bg-dark text-light me-3">News</span><?php echo date('F j, Y, g:i a', strtotime($post->postCreated_at)) ?></p>
                            <p class="textJustify ">
                                <?php if (strlen($post->postBody)>150) { $post->postBody = substr($post->postBody,0,150)."...";} echo $post->postBody; ?>
                            </p>
                        </div>

                        </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


<?php
    require APPROOT . '/views/includes/footer.php';
?>
