<?php

require_once 'dbh.inc.php';
$sql = "SELECT * FROM rooms";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_assoc($result)){
            $roomName = $rows['room_name'];
            $roomDescription = $rows['room_description'];
            $_SESSION['room_code'] = $rows['room_code'];
            echo "
            <div class='col-sm-3'>
            <div class='rooms'>
                    <img src='images/rooms/room". $_SESSION['room_code'] . ".jpg' class='img-fluid'>
                    <div class='info'>
                        <h3>". $roomName . "</h3>
                        <p>". $roomDescription ." </p>
                        <a href='roomdetail.php?room_code=". $_SESSION['room_code'] ."' class='btn btn-dark'>Check Details
                        </a>
                    </div>
                </div>
            </div>"; 
    }
}else {
    echo "<h1 class='title'>Do data</h1>";
}