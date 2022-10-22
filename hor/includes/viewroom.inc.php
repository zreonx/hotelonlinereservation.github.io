<?php
require_once 'dbh.inc.php';
if(isset($_GET['room_code'])){
    $roomCode = $_GET['room_code'];
    $sql = "SELECT * FROM rooms where  room_code = '$roomCode'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_assoc($result)){
            $_SESSION['room_name'] = $rows['room_name'];
            $_SESSION['room_code'] = $_GET['room_code'];
            $roomDescription = $rows['room_description'];
            $roomSize = $rows['room_size'];
            $roomPrice = $rows['room_rate'];
            $roomStatus = $rows['room_availability']; 


            echo "
            <div class='content wowload fadeInUp'>
                <h2 class='d-block bg-color p-3' >". $_SESSION['room_name'] ."</h2>
                <div class='row'><img src='images/rooms/room". $roomCode . ".jpg' class='img-fluid img-detail mx-auto' alt='images'></div>
                <div class='room-features spacer'>
                <div class='row'>
                <div class='col-sm-12 col-md-6'> 
                <h3>About Room</h3>
                <p>". $roomDescription ."</p>
                </div>
                <div class='col-sm-3 col-md-2'>
                <div class='size-price'>
                    <h4>Size</h4> 
                    <p>". $roomSize ."</p>
                </div>
                </div>
                <div class='col-sm-3 col-md-2'>
                <div class='size-price'>
                    <h4>Price</h4> 
                    <p> ₱ ". $roomPrice ."</p>
                </div>
                </div>
                <div class='col-sm-3 col-md-2'>
                <div class='size-price'>
                    <h4>Status</h4> 
                    <p>" . $roomStatus . "</p>
                </div>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    <div class='book-btn'>
                        <button type='submit' class='btn btn-dark f-forms btn-book'>Book Now</button>
                    </div>
                    
                </div>
            </div>
            </div>               
            </div>
            
            ";
    }
}else {
    echo "<h1 class='title'>No data</h1>";
}
}
