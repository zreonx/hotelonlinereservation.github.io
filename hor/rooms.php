
<?php include_once 'includes/header.php' ?>
<?php
        if(isset($_SESSION['user_id'])){
            
        }else{
            header("location: index.php");
            exit();
        }
?>

    <div class="container">
        <form class="content-margin-top" action="" >
            <div class="row animated fadeInLeft">
                <?php include_once 'includes/showroom.inc.php'; ?>
            </div>
        </form>  
    </div>
    
<?php include_once 'includes/footer.php' ?>  
