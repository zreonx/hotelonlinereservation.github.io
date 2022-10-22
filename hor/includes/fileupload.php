<?php

if(isset($_POST['submit'])){

    $selectedFile = $_FILES['file'];
    $fileName = $selectedFile['name'];
    $fileLocation = $selectedFile['tmp_name'];
    $fileSize = $selectedFile['size'];
    $fileError = $selectedFile['error'];
    $fileType = $selectedFile['type'];
    $fileExt = explode(".", $fileName);
    $fileActualExt= strtolower(end($fileExt));
    $allowedFile =array('jpg', 'png', 'jpeg');
    
    if(in_array($fileActualExt, $allowedFile)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $newFilename = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../images/rooms/' . $newFilename;
                move_uploaded_file($fileLocation, $fileDestination);
                header("location: ../index.php?upload=success");
            }else {
                echo "Your file is too big";
            }
        }else {
            echo "There was an error uploading your file.";
        }
    }else {
        echo "Files cant't be uploaded.";
    }

}