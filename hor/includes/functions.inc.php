<?php

//Registration Error Handler
//Check if the signup is filled
function emptyInputSignup ($fname, $lname, $cn, $email, $pwd, $confirm_pw) {
    $result;

    if(empty($fname) || empty($lname) || empty($cn) || empty($email) || empty($pwd) || empty($confirm_pw)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;

}

//check if the contact nubmer was valid
function invalidNumber($cn){
    $result;
    if(!preg_match('/^[0-9]{11}+$/', $cn)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

//check if the username typed is valid
function invalidUsername($uname) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $uname)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

//check if the inputed email was valid
function invalidEmail($email) {
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

//check if password match with confirm password
function passwordMatch($pwd, $confirm_pwd) {
    $result;
    if($pwd !== $confirm_pwd){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

//check if email and username are existing
function emailExist($conn, $uname ,$email) {
    $sql = "SELECT * FROM users where user_name = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

//User Registration
function registerUser($conn, $uname, $fname, $lname, $email, $cn , $pwd) {
    
    $type = "user";

    $sql = "INSERT INTO users (user_name, first_name, last_name, email, contact_number, user_password, type) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssss", $uname, $fname, $lname, $email, $cn, $hashedPwd, $type);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?signup=success");
}

//Login Error Handler

function emptyInputLogin ($email, $pwd) {
    $result;

    if(empty($email) || empty($pwd)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;

}

//Create Room Functions
//Check if create room input was empty
function emptyInputCreateRoom($roomName, $roomType, $roomAvailability, $roomRate, $roomDescription){
    $result;

    if(empty($roomName) || empty($roomRate) || empty($roomDescription) || $roomAvailability === "Select Room Availability" || $roomType === "Select Room Type"){
        $result = true;
    }else {
        $result = false;
    }
    return $result;

}

//Create Room Function
function createRoom($conn, $roomCode, $roomName, $roomType, $roomAvailability, $roomRate , $roomSize, $roomDescription) {
    
    $roomAmneties = "";

    $sql = "INSERT INTO rooms (room_code, room_name, room_type, room_availability, room_rate, room_size, room_description) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../createroom.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $roomCode, $roomName, $roomType, $roomAvailability, $roomRate , $roomSize, $roomDescription);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../createroom.php?status=success");
}

function roomImgInfo($conn, $roomCode, $roomStatus){
    $roomStatus = 0;
    $sqlImg = "INSERT INTO room_image (room_code, status) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlImg)){
        header("location: ../createroom.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $roomCode, $roomStatus);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function roomImageUpload ($roomCode, $selectedFile, $fileName, $fileLocation, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt , $allowedFile){
    if(in_array($fileActualExt, $allowedFile)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $newFilename = "room". $roomCode .".".$fileActualExt;
                $fileDestination = '../images/rooms/' . $newFilename;
                move_uploaded_file($fileLocation, $fileDestination);
                //header("location: ../index.php?upload=success");
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

function viewRoom($conn){
   
    
}

//Count Rooms
    function countRooms($conn) {
        $sql = "SELECT * FROM rooms;";
        if($result = mysqli_query($conn, $sql)){
            $rowCount = mysqli_num_rows($result);
            return $rowCount + 1;
        }
    }

 //Count Rooms
 function countPending($conn) {
    $sql = "SELECT * FROM book_record where payment_status = 'Pending';";
    if($result = mysqli_query($conn, $sql)){
        $pendingCount = mysqli_num_rows($result);
        return $pendingCount;
    }
}

//Count Checkouts
function countCheckouts($conn) {
    $sql = "SELECT * FROM book_record WHERE payment_status='Received';";
    if($result = mysqli_query($conn, $sql)){
        $checkOutCount = mysqli_num_rows($result);
        return $checkOutCount;
    }
}   

//Count Booking
function countBooking($conn) {
    $sql = "SELECT * FROM book_record";
    if($result = mysqli_query($conn, $sql)){
        $countBooking = mysqli_num_rows($result);
        return $countBooking;
    }
}   

//Count cancelled
function countCancelled($conn) {
    $sql = "SELECT * FROM book_record where payment_status = 'Cancelled'";
    if($result = mysqli_query($conn, $sql)){
        $countCancelled = mysqli_num_rows($result);
        return $countCancelled;
    }
} 



//Check Room if existing
    function checkRoomExist($conn,$roomCode){
        $sql = "SELECT * FROM rooms where room_code = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../createroom.php?stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $roomCode);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }else {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }

//Count Available Rooms

    function availableRoom($conn){
        
        $sql = "SELECT * FROM rooms where room_availability = 'available';";
        if($result = mysqli_query($conn, $sql)){
            $rowCount = mysqli_num_rows($result);
            $totalAvailableRooms = $rowCount;
            return $totalAvailableRooms;         
        }

    }


//Login Function
function loginUser($conn, $uname, $pwd){
    $usernameExists = emailExist($conn, $uname, $uname);
    if($usernameExists === false){
        header("location: ../login.php?error=thereisnosuchaccount");
        exit();
    }

    $hashedPwd = $usernameExists["user_password"];

    $checkPwd = password_verify($pwd, $hashedPwd);

    if($checkPwd === false){
        header("location: ../login.php?error=invalidpassword");
        exit();

    }else if ($checkPwd === true){
        session_start();
        $_SESSION['user_id'] = $usernameExists['user_id'];
        $_SESSION['email'] = $usernameExists['email'];
        $_SESSION['contact'] = $usernameExists['contact_number'];
        $_SESSION['user_name'] = $usernameExists['user_name'];
        $_SESSION['first_name'] = $usernameExists['first_name'];
        $_SESSION['last_name'] = $usernameExists['last_name'];
        $_SESSION['user_type'] = $usernameExists['type'];
        if($_SESSION['user_type'] == "admin"){
            header("location: admin.inc.php");
        }else if($_SESSION['user_type'] == "user"){
            header("location: user.inc.php");
        }
        exit();
    }

}

//User Booking Function 
    
function createBooking($conn, $userid, $firstname, $lastname, $roomCode ,$roomName, $checkIn, $checkOut, $status) {

    $sql = "INSERT INTO book_record (user_id, first_name, last_name, room_code, room_name, check_in, check_out, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../createroom.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $userid, $firstname, $lastname, $roomCode, $roomName, $checkIn, $checkOut, $status);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sqlUpdate = "UPDATE rooms SET room_availability='Reserved' WHERE room_code='$roomCode';";

    $result = mysqli_query($conn, $sqlUpdate);

    header("location: ../index.php?booking=success");

    }

    //Payment Error Handler
    function emptyPaymentMethod($paymentmethod) {
        $result;
    
        if($paymentmethod === "Select"){
            $result = true;
        }else {
            $result = false;
        }
        return $result;
    
    }

    function createTransaction($conn, $bookingId, $roomCode, $roomPrice, $bill, $userId, $paymentmethod, $transactionStatus, $days, $transaction_date) {

        $sql = "INSERT INTO book_transaction (booking_id, room_code, room_price, bill, user_id, payment_method, transaction_status, days_of_stay, transaction_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
    
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../booking.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt, "sssssssss", $bookingId, $roomCode, $roomPrice, $bill, $userId, $paymentmethod, $transactionStatus, $days, $transaction_date);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        $sqlUpdateRoom = "UPDATE rooms SET room_availability='Not Available' WHERE room_code='$roomCode';";
        $resultUpdate = mysqli_query($conn, $sqlUpdateRoom);
        $sqlUpdatePayment = "UPDATE book_record SET payment_status='Confirmed' WHERE id='$bookingId';";
        $resultUpdatePayment = mysqli_query($conn, $sqlUpdatePayment);


    
        header("location: ../index.php?payment=success");
    
        }
