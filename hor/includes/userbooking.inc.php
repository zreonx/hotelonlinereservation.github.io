<?php

require_once 'dbh.inc.php';
$uid = $_SESSION['user_id'];
$sql = "SELECT * FROM book_record WHERE user_id = '$uid' AND payment_status='Pending'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_assoc($result)){
            $roomName = $rows['room_name'];
            $roomCode = $rows['room_code'];
            $checkIn = strtotime($rows['check_in']);
            $checkOut = strtotime($rows['check_out']);
            $datediff = $checkOut - $checkIn;
            $days = round($datediff / (60 * 60 * 24));
            $bookingId = $rows['id'];
            $userId = $rows['user_id'];
            $firstName = $rows['first_name'];
            $lastName = $rows['last_name'];

            $sqlPrice = "SELECT room_rate FROM rooms where room_code = '$roomCode'";
            $priceResult = mysqli_query($conn, $sqlPrice);
            $priceRow = mysqli_fetch_assoc($priceResult);
            $roomRate = $priceRow['room_rate'];

            $bill = $roomRate * $days;

            echo "
            <div class='col-sm-4'>
            <div class='rooms'>
                    <img src='images/rooms/room". $roomCode . ".jpg' class='img-fluid'>
                    <div class='info'>
                        <h5>Room Code: <strong>". $roomCode . "</strong></h5>
                        <h5>Room Name: <strong>". $roomName . "</strong></h5>
                        <h5>Room Check In: <strong>". $rows['check_in'] . "</strong></h5>
                        <h5>Room Check Out: <strong>". $rows['check_out'] . "</strong></h5>
                        
                        <a href='includes/cancelbooking.inc.php?booking_id=". $bookingId ."&room_code=". $roomCode ."' class='btn btn-dark'>Cancel Booking</a>
                        <a href='payment.php?room_code=". $roomCode . "&room_name=".$roomName."&check_in=". $checkIn ."&checkout=". $checkOut ."&user_id=". $userId ."&first_name=". $firstName ."&last_name=". $lastName ."&room_rate=". $roomRate ."&days=". $days ."&bill=". $bill ."&booking_id=". $bookingId ."' class='btn btn-dark'>Proceed to payment</a>
                        
                    </div>
                </div>
            </div>"; 
    }
}else {
    echo "<h2 class='title'>You don't have any booking.</h2>";
}