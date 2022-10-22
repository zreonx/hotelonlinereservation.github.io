<?php include_once 'includes/header.php' ?>

<form class="content-margin-top" action="includes/login.inc.php" method="POST">
    <div class="card login-card mt-5 mx-auto rounded-0 animated fadeInDown">
        <h3 class="card-title">Login</h3>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <input class="form-control" name="uname" type="text" placeholder="Email">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <input class="form-control" name="pwd" type="password" placeholder="Password">
                </div>
                
            </div>
            <div class="row mb-3 login-links-text">
                <div class="col">
                     Dont have an account?
                    <a class="text-decoration-none login-links align-self-center" href="signup.php">Create one</a>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" name="submit" class="btn btn-dark">Login</button>
                </div>
            </div>

        </div>
    </div>
</form>

<?php include_once 'includes/footer.php' ?>