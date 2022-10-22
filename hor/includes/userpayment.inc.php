<?php
if(isset($_POST['submit'])){
    $roomName = $_POST['roomname'];
    $roomCode = $_POST['room_code'];
    $userID = $_POST['user_id'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $price = $_POST['roomrate'];
    $bill = $_POST['bill'];
    $bookingId = $_POST['booking_id'];
    $paymentmethod = $_POST['paymentmethod'];
    $days = $_POST['days'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyPaymentMethod($paymentmethod) !== false) {
        header('location: ../booking.php?error=selectpaymentmethod');
        exit();
    }
    echo $paymentmethod;
    if($paymentmethod === "Pay on arrival"){
        $transactionStatus = "Incomplete";
        $transaction_date = date("Y-m-d");
        createTransaction($conn, $bookingId, $roomCode, $price ,$bill, $userID ,$paymentmethod, $transactionStatus, $days, $transaction_date);

    }elseif($paymentmethod === "Bank transfer"){
        //
    }

    

    

}

?>