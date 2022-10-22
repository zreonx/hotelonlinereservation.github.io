<?php
if(isset($_POST['submit'])){

    $uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cn = $_POST['cn'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $confirm_pwd = $_POST['cpwd'];

    // echo $fname. " " . $lname . " ". $cn . " ". $email. " ". $pwd . " ". $confirm_pwd;
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($uname, $fname, $lname, $cn, $email, $pwd, $confirm_pwd) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if(invalidUsername($uname) !== false) {
        header("location: ../signup.php?error=useproperusername");
        exit();
    }

    if(invalidNumber($cn) !== false) {
        header("location: ../signup.php?error=11digitonly");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(passwordMatch($pwd, $confirm_pwd) !== false){
        header("location: ../signup.php?error=passworddontmatch");
        exit();
    }
    
    // if(emailExist($conn, $uname, $email) !== false){
    //     header("location: ../signup.php?error=emailalreadyexist");
    //     exit();
    // }
    
    $check = emailExist($conn, $uname ,$email);

    if($check['user_name'] === $uname) {
        header("location: ../signup.php?error=usernamealreadyexist");
        exit();
    }
    if($check['email'] === $email) {
        header("location: ../signup.php?error=emailalreadyexist");
        exit();
    }
    

    registerUser($conn, $uname, $fname, $lname, $email, $cn , $pwd);

}else {
    header("location: ../signup.php");
    exit();
}