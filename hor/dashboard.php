<?php 

    require_once 'includes/header.php';
    
    if(!isset($_SESSION['user_id'])){
        header("location: index.php");
        exit();
    }
    if($_SESSION['user_type'] === "user"){
        header("location: index.php");
        exit();
    }
    include_once 'includes/dashboardstats.inc.php';

 ?>

    <div class="row ">
        <div class="col-md-12 content-margin-top">
            <div class="row justify-content-space-between animated fadeInLeft">
                <div class="col">
                    <div class="card dashboard-card  ">
                        <div class="card-body">
                            <h5>Available Rooms</h5>
                            <h2><?php echo $availableRooms; ?></h2>
                            <a class="view-details text-center" href="#">View details</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <h5>Checkouts</h5>
                            <h2><?php echo $checkouts; ?></h2>
                            <a class="view-details text-center" href="#">View details</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <h5>Cancellations</h5>
                            <h2><?php echo $cancelled ?></h2>
                            <a class="view-details text-center" href="#">View details</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <h5>Pending Payment</h5>
                            <h2><?php echo $pendings; ?></h2>
                            <a class="view-details" href="#">View details</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <h5>Enquiries</h5>
                            <h2><?php echo $bookings;?></h2>
                            <a class="view-details" href="#">View details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card overflow-auto animated fadeInDown">
                        <div class="card-body">
                            <h3>Booking Information</h3>
                            <table class='table table-striped mt-2'>
                                <thead>
                                <tr>
                                    <th>Booking Date</th>
                                    <th>Customer</th>
                                    <th>Room Name</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Payment</th>
                                </tr>
                                    <?php
                                        include_once 'includes/dashboard.inc.php';
                                    ?>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    
                </div>
            </div>
        
        </div>

    </form>
        </div>
    </div>
    
<?php include_once 'includes/footer.php' ?>