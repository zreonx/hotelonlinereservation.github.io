<?php

require_once 'dbh.inc.php';

if(isset($_GET['booking_id'])){
    $roomCode = $_GET['room_code'];
    $bookId = $_GET['booking_id'];
    $sqlUpdate = "UPDATE book_record SET payment_status='Cancelled' WHERE id='$bookId';";
    
    $result = mysqli_query($conn, $sqlUpdate);
    

    $sqlUpdateRoom = "UPDATE rooms SET room_availability='Available' WHERE room_code='$roomCode';";

    $resultUpdateRoom = mysqli_query($conn, $sqlUpdateRoom);

    header('location: ../booking.php?booking=cancelled');
}else {
    header('location: ../booking.php');
    exit();
}

