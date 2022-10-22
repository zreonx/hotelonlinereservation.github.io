<?php 

    include_once 'includes/header.php';
    
    if(!isset($_SESSION['user_id'])){
        header("location: index.php");
        exit();
    }
    if($_SESSION['user_type'] === "user"){
        header("location: index.php");
        exit();
    }

 ?>


    <div class="row">
        <div class="col-md-12">
        <form class="content-margin-top" action="includes/createroom.inc.php" method="post" enctype="multipart/form-data">
        <div class="card create-room-card mt-3 mx-auto animated fadeInDown">
            <h3 class="card-title">Create Room</h3>
            <?php 
            if(isset($_GET['status'])){
                if($_GET['status'] === "success"){
                    echo "
                    <div class='alert alert-success'>
                        <strong>Success!</strong><span> Room has been created.</span>
                    </div>";
                }
                
            }
            ?>
            <div class="card-body">
            <div class="row mb-3">
                    <div class="col">
                    <div>
                        <label for="formFile" class="form-label">Room Image</label>
                        <input class="form-control" type="file" id="formFile" name="file">
                    </div>
                    </div>
                </div>
            <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="roomName" type="text"placeholder="Room Name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select class="form-select" name="roomType">
                                <option>Select Room Type</option>
                                <option>Single</option>
                                <option>Double</option>
                                <option>Trippe</option>
                                <option>Quad</option>
                        </select> 
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <select class="form-select" name="roomAvailability">
                            <option value="Select Availability">Select Availability</option>
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                            <option value="Reserved">Reserved</option>
                        </select> 
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="roomSize" type="text" placeholder="Room Size">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="roomRate" type="text" placeholder="Rate Per Day">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">

                    <textarea class="form-control" rows="5" name="roomDescription" placeholder="Room Description"></textarea>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-dark">Create Room</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
        </div>
    </div>
    
<?php include_once 'includes/footer.php' ?>