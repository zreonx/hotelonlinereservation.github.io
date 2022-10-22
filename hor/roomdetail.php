<?php include_once 'includes/header.php' ?>
<?php
        if(isset($_SESSION['user_id'])){

            
        }else{
            header("location: index.php");
            exit();
        }
?>  
<div class="container">
    <form class="content-margin-top animated fadeInLeft" action="book.php">
         <?php include_once 'includes/viewroom.inc.php'; ?>
    </form>
    
</div>
<?php include_once 'includes/footer.php' ?>  
