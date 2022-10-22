<?php include_once 'header.php' ?>
<?php

        if(isset($_SESSION['user_id'])){
            
        }else{
            header("location: ../index.php");
            exit();
        }
?>      
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="row ">
            <div class="col">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <div class="carousel-caption">
                            <h1 class="index-title animated fadeInDown">Oliva Hotel</h1>
                            <p class="animated fadeInUp">The best hotel of all times in the Philippines. Project Mars</p>
                        </div>
                        <img src="../images/photos/banner.jpg" class="d-block w-100" alt="...">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php include_once 'footer.php' ?>  
