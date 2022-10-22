<?php include_once 'includes/header.php' ?>
<?php
        if(isset($_SESSION['user_id'])){
            
        }else{
            header("location: index.php");
            exit();
        }
?>

    <div class="container mt-3">
        <div class="card mx-auto book-card content-margin-top rounded-0 ">
            <div class="card-body ">
                <h3 class="animated fadeInDown">Booking Details</h3>
                <form action="includes/book.inc.php" method="POST">
                    <div class="row d-flex animated fadeInLeft">
                        <div class="mb-2 mt-3">
                            <label for="roomname" class="form-label">Room Name</label>
                            <input type="text" class="form-control" value="<?php echo $_SESSION['room_name'] ;?>" name="roomname" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="checkin" class="form-label">Check In</label>
                            <input type="date" class="form-control" id="checkin" name="checkin">
                        </div>
                        <div class="mb-4">
                            <label for="checkout" class="form-label">Check Out </label>
                            <input type="date" class="form-control" id="checkout" name="checkout">
                        </div>
                        <div class="mb-4">
                             <button type="submit" name="submit" class="btn btn-dark p-2">Reserve</button>
                        </div>
                    </div>
                    
                </form>  
            </div>
        </div>
        
    </div>
    
<?php include_once 'includes/footer.php' ?>  
