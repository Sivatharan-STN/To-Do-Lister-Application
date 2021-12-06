<?php

//check form
if(isset($_POST["submit"])){
    
    $email=$_POST["email"]; //assign form value to $email
    $username=$_POST["uid"]; //assign form value to $username
    $pwd=$_POST["pwd"]; //assign form value to $pwd
    $pwdRepeat=$_POST["pwdrepeat"]; //assign form value to $pwdRepeat

    require_once 'dbh.inc.php'; //add db connection file
    require_once 'functions.inc.php'; //add functions file

    if(emptyInputReset($email,$username,$pwd,$pwdRepeat)!==false){
        header("location: ../reset_password.php?error=emptyinput"); //passing error message=emptyinput through link
        exit();
    }
    
    if(uidExists( $conn,$username,$email)==false){
        header("location: ../reset_password.php?error=usernotfound"); //passing error message=usernotfound through link
        exit();
    }

    if(pwdMatch( $pwd,$pwdRepeat)!==false){
        header("location: ../reset_password.php?error=passwordsdontmatch"); //passing error message=passwordsdontmatch through link
        exit();
    }

    updateUser($conn, $username, $pwd);//if no errors found user update

}
//if form not submitted
else{
    header("location: ../reset_password");
    exit();
}