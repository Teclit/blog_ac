<?php
if(isset($_POST["submit"])) {

    if(is_array($_FILES)) {

        $file = $_FILES['image']['tmp_name']; // the name attribute is given as name="image" the the enctype="multipart/form-data" for the form
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $folderPath = "uploads/";
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
        // Determine the file by its type/extension
        switch ($imageType) {

            case IMAGETYPE_PNG:
            $imageResourceId = imagecreatefrompng($file); 
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagepng($targetLayer,$folderPath. $fileNewName. "_thumb.". $ext);
            break;

            case IMAGETYPE_GIF:
            $imageResourceId = imagecreatefromgif($file); 
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagegif($targetLayer,$folderPath. $fileNewName. "_thumb.". $ext);
            break;

            case IMAGETYPE_JPEG:
            $imageResourceId = imagecreatefromjpeg($file); 
            $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
            imagejpeg($targetLayer,$folderPath. $fileNewName. "_thumb.". $ext);
            break;

            default:
            echo "Invalid Image type.";
            exit;
            break;

        }

        move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
        echo "Image Resize Successfully.";
    }
}

    function imageResize($imageResourceId,$width,$height) {
        // Make a fixed Width & Height but it might make the image look longer or wider
        // Keep the Image Ratio of Width & Height
        $maxDim = 50;
        $ratio = $width/$height;
        if( $ratio > 1) {
            $targetWidth = $maxDim;
            $targetHeight = $maxDim/$ratio;
        } else {
            $targetWidth = $maxDim*$ratio;
            $targetHeight = $maxDim;
        }
        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
        return $targetLayer;
    }

    ?>