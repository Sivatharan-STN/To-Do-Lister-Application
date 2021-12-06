<?php

//check login form submission
if(isset($_POST["submit"])){

    $username= $_POST["uid"];//assign uid into $username
    $pwd=$_POST["pwd"]; //assing pwd into $pwd

    require_once 'dbh.inc.php'; //connect db
    require_once 'functions.inc.php'; //add functions

    //check input fields empty or not
    if(emptyInputLogin( $username,$pwd)!==false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }
    //user login
    loginUser($conn,$username,$pwd);
}
else{
    header("location: ../login.php");
    exit();
}