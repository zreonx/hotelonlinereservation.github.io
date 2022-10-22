<?php include_once 'header.php' ?>
<?php
        if(isset($_SESSION['user_id'])){
            
        }else{
            header("location: ../index.php");
            exit();
        }
?>  
<div class="container-fluid wowload fadeInRight">
    <form class="content-margin-top" action="../rooms.php">
        <div class="row">
            <div class="col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <div class="carousel-caption">
                            <h1 class="animated fadeInDown">Oliva Hotel</h1>
                            <p class="animated fadeInDown">The best hotel of all times in the Philippines. Project Mars</p>
                            <button class="btn btn-lg btn-dark f-forms animated fadeInUp">Reserve Now</button>
                        </div>
                        <img src="../images/photos/banner.jpg" class="d-block w-100" alt="...">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include_once 'footer.php' ?>  
