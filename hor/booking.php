<?php include_once 'includes/header.php' ?>
<?php
        if(isset($_SESSION['user_id'])){
            
        }else{
            header("location: index.php");
            exit();
        }
?>

    <div class="container ">
        <form class="content-margin-top" action="" >
            <h1 class="animated fadeInDown">My Booking</h1>
            <div class="row ">
                <?php include_once 'includes/userbooking.inc.php';?>
            </div>
        </form> 
    </div>
         
    </div>
    
<?php include_once 'includes/footer.php' ?>  
