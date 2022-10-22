<?php
session_start();
if(isset($_POST['submit'])){

    $roomName = $_SESSION['room_name'];
    $roomCode = $_SESSION['room_code'];
    $checkIn = $_POST['checkin'];
    $checkOut = $_POST['checkout'];
    $userid = $_SESSION['user_id'];
    $firstname = $_SESSION['first_name'];
    $lastname = $_SESSION['last_name'];
    $status = "Pending";

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    createBooking($conn, $userid, $firstname, $lastname, $roomCode ,$roomName, $checkIn, $checkOut, $status);
}else {
    header("location: ../viewroom.php");
    exit();
}