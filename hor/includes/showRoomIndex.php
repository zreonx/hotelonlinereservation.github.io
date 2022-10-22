<?php

require_once 'dbh.inc.php';
$sql = "SELECT * FROM rooms";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_assoc($result)){
            $roomCode = $rows['room_code'];
            echo "
                    <div class='col-md-4 mb-3 animated fadeInUp'>
                    <img src='images/rooms/room". $roomCode . ".jpg' class='img-fluid'>
                    </div>
                "; 
                }          

}else {
    echo "<h1 class='title'>Do data</h1>";
}