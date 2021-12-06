<?php

//check signup form submission
if(isset($_POST["submit"])){
    
    $name=$_POST["name"];
    $email=$_POST["email"];
    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $pwdRepeat=$_POST["pwdrepeat"];

    require_once 'dbh.inc.php'; //db connection
    require_once 'functions.inc.php'; //adding functions

    //check signup fields empty or not
    if(emptyInputSignup($name, $email,  $username,$pwd,$pwdRepeat)!==false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    //check uid
    if(invalidUid( $username)!==false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    //check email id
    if(invalidEmail( $email)!==false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    //check password matching
    if(pwdMatch( $pwd,$pwdRepeat)!==false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    //check user id exist or not
    if(uidExists( $conn,$username,$email)!==false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    //create user
    createUser($conn, $name,$email, $username, $pwd);

}
else{
    header("location: ../signup.php");
    exit();
}