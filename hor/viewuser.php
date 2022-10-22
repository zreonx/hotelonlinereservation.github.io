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
                <div class="col">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <h3 class="animated fadeInDown">Manage User</h3>
                            <table class='table table-striped mt-2 animated fadeInUp'>
                                <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Action</th>
                                </tr>
                                    <?php
                                        include_once 'includes/viewuser.inc.php';
                                    ?>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                            
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