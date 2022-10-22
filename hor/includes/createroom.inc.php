<?php
session_start();
if(isset($_POST['submit'])){

    $roomName = $_POST['roomName'];
    $roomType = $_POST['roomType'];
    $roomAvailability = $_POST['roomAvailability'];
    $roomRate = $_POST['roomRate'];     
    $roomSize = $_POST['roomSize'];
    $roomDescription = $_POST['roomDescription'];

    $selectedFile = $_FILES['file'];
    $fileName = $selectedFile['name'];
    $fileLocation = $selectedFile['tmp_name'];
    $fileSize = $selectedFile['size'];
    $fileError = $selectedFile['error'];
    $fileType = $selectedFile['type'];
    $fileExt = explode(".", $fileName);
    $fileActualExt= strtolower(end($fileExt));
    $allowedFile =array('jpg', 'png', 'jpeg');



    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(emptyInputCreateRoom($roomName, $roomType, $roomAvailability, $roomRate, $roomDescription) !== false){
        header("location: ../createroom.php?error=inputwasempty");
        exit();
    }
    $roomCode = "R". countRooms($conn);

    if(checkRoomExist($conn, $roomCode) !== false) {
        header("location: ../createroom.php?error=roomalreadyexist");
        exit();
    }
    
    roomImgInfo($conn, $roomCode, $roomStatus);
    roomImageUpload($roomCode, $selectedFile, $fileName, $fileLocation, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt , $allowedFile);
    createRoom($conn, $roomCode, $roomName, $roomType, $roomAvailability, $roomRate, $roomSize, $roomDescription);            
    
}else {

    if(isset($_SESSION['user_id'])){
        header("location: ../createroom.php");
        exit();
    }else {
        header("location: ../index.php");
        exit();
    }
   
}