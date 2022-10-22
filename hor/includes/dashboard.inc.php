<?php 
include_once 'config.php';

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
$availableRooms = availableRoom($conn);

$sql = "SELECT * FROM book_record where payment_status = 'Pending' OR payment_status = 'Received'  OR payment_status = 'Confirmed' OR payment_status='Cancelled'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_assoc($result)){
            $roomName = $rows['room_name'];
            $roomCode = $rows['room_code'];
            $checkIn = $rows['check_in'];
            $checkOut = $rows['check_out'];
            $fullName = $rows['first_name'] . " " . $rows['last_name'];
            $payStatus = $rows['payment_status'];

            echo "
                    <tr>
                        <td>". $checkIn ."</td>
                        <td>". $fullName ."</td>
                        <td>" .$roomName. "</td>
                        <td>". $checkIn . "</td>
                        <td>". $checkOut. "</td>
                        <td>". $payStatus ."</td>
                        
                    </tr>
            ";
            
    }
}else {
    echo "<h4 class='title'>No Booking Data</h4>";
}
