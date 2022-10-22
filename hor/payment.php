<?php include_once 'includes/header.php' ?>
<?php
        if(isset($_SESSION['user_id'])){
            
        }else{
            header("location: ../index.php");
            exit();
        }
?>
    <div class="container">
        <div class="card mx-auto book-card content-margin-top rounded-0 ">
            <div class="card-body animated fadeInDown">
                <h3>Payment Details</h3>
                <form action="includes/userpayment.inc.php" method="POST">
                    <div class="row d-flex">
                        <div class="mb-2 mt-3">
                            <label for="roomname" class="form-label">Room Name</label>
                            <input  readonly="readonly" type="text" class="form-control" value="<?php echo $_GET['room_name'] ;?>" disabled >
                            <input type="hidden" class="form-control" value="<?php echo $_GET['room_name'] ;?>" name="roomname">
                        </div>
                        <div class="mb-3">
                            <label for="roomrate" class="form-label">Room Price</label>
                            <input  readonly="readonly" type="text" class="form-control" value="₱<?php echo $_GET['room_rate']; ?>" id="roomrate" name="roomrate" disabled>
                            <input type="hidden" class="form-control" value="<?php echo $_GET['room_rate'] ;?>" name="roomrate">
                        </div>
                        <div class="mb-4">
                            <label for="dos" class="form-label">Days of stay</label>
                            <input  readonly="readonly" type="text" class="form-control" id="dos" value="<?php echo $_GET['days']?>" name="dos" disabled>
                            <input  type="hidden" class="form-control" value="<?php echo $_GET['days'] ;?>" name="days">
                        </div>
                        <div class="mb-4">
                            <label for="paymentmethod" class="form-label">Payment Method</label>
                            <select class="form-select" name="paymentmethod" id="paymentmethod">
                                <option value="Select">Select</option>
                                <option value="Pay on arrival">Pay on arrival</option>
                                <option value="Bank transfer">Bank transfer</option>
                            </select> 
                        </div>
                        <div class="mb-4">
                            <label for="bill" class="form-label">Total Bill</label>
                            <input  readonly="readonly" type="text" class="form-control" id="bill" value="₱<?php echo $_GET['bill']?> " disabled>
                            <input type="hidden" class="form-control" value="<?php echo $_GET['bill'] ;?>" name="bill">
                        </div>
                        
                        <input type="hidden" class="form-control" value="<?php echo $_GET['room_code']; ?>" name="room_code" >
                        <input type="hidden" class="form-control" value="<?php echo $_GET['user_id']; ?>" name="user_id" >
                        <input type="hidden" class="form-control" value="<?php echo $_GET['first_name']; ?>" name="first_name" >
                        <input type="hidden" class="form-control" value="<?php echo $_GET['last_name']; ?>" name="last_name" >
                        <input type="hidden" class="form-control" value="<?php echo $_GET['booking_id']; ?>" name="booking_id" >

                        <div class="mb-4">
                             <button type="submit" name="submit" class="btn btn-dark p-2">Confirm Booking</button>
                        </div>


                    </div>
                    
                </form>  
            </div>
        </div>
    </div>
         
    </div>
    
<?php include_once 'includes/footer.php' ?>  
