<?php include_once 'includes/header.php' ?>
    <form class="content-margin-top" action="includes/signup.inc.php" method="post">
        <div class="card sign-up-card mx-auto rounded-0 row animated fadeInDown">
            <h3 class="card-title">Sign Up</h3>
            <div class="card-body">
            <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="uname" type="text" placeholder="Username">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="fname" type="text" placeholder="Firstname">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="lname" type="text" placeholder="Lastname">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="cn" type="text" placeholder="Contact Number">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="email" type="text" placeholder="Email">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="pwd" type="password" placeholder="Password">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" name="cpwd" type="password" placeholder="Confirm Password">
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-dark">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php include_once 'includes/footer.php' ?>