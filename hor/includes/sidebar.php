<?php include_once 'config.php' ?>

<div class="sidebar h-100">
    <div class="sidebar-menu">
        <h3 class="close"></h3>
        <script src="js/menu.js"></script>
        <h3><a href="#" onclick="toggleMenu()">Menu</a></h3>
            <div class="menu">
                <a href="<?php echo $URLROOT ?>/dashboard.php"><i class="fa fa-fw fa-tachometer"></i> Dashboard</a>
                <a href="#"><i class="fa fa-fw fa-shopping-cart"></i> Manage User</a>
                <a href="<?php echo $URLROOT ?>/createroom.php "><i class="fa fa-fw fa-hotel"></i> Create Rooms</a>
                <a href="#"><i class="fa fa-fw fa-line-chart"></i> Reports</a>
            </div>        
    </div>
</div>