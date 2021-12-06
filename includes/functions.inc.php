<?php

//check empty inputs
function emptyInputSignup($name, $email,  $username,$pwd,$pwdRepeat){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

//check username valid or not
function invalidUid( $username){
    $result;

    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

//check email address valid or not
function invalidEmail( $email){
    $result;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

//check password match or not
function pwdMatch( $pwd,$pwdRepeat){
    $result;
    if($pwd!==$pwdRepeat){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

//check uid exists or not
function uidExists( $conn,$username,$eamil){
    $sql="SELECT * FROM users WHERE userUid=? OR usersEmail=?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed1");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$eamil);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if($row=mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

//create new user inside db
function createUser($conn, $name,$email, $username, $pwd){
    $sql="INSERT INTO users(usersName,usersEmail,userUid,usersPwd) VALUES (?, ?, ?, ?);";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    // $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email, $username, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
        exit();
}


//login functions

//login fileds empty or not
function emptyInputLogin($username,$pwd){
    $result;
    if(empty($username) || empty($pwd)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

//login 
function loginUser($conn,$username,$pwd){
    $uidExists=uidExists($conn,$username,$username);

    if($uidExists===false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    if($uidExists["usersPwd"]===$pwd){
        session_start();
        $_SESSION["userid"]=$uidExists["usersId"];
        $_SESSION["useruid"]=$uidExists["userUid"];
        header("location: ../dashboard.php");
        exit();
    }
    else if ($uidExists["usersPwd"]!==$pwd){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
}


//Password Reset functions

//check fields empty or not
function emptyInputReset($email,$username,$pwd,$pwdRepeat){
    $result;
    if(empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

//update user password
function updateUser($conn, $username, $pwd){
    $sql = "UPDATE users SET usersPwd=? WHERE userUid=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../reset_password.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$pwd, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../reset_password.php?error=none");
        exit();
}


// add task

//check input task fields empty or not
function emptyInputtask( $task,$date,$timePick){
    $result;
    if(empty($task) || empty($date) || empty($timePick) ){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}

//insert task data
function inserdata($conn,$task,$date,$timePick,$currentUser){
    $sql="INSERT INTO task(taskName,taskDate,taskTime,usersId) VALUES (?, ?, ?, ?);";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../dashboard.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssss",$task,$date,$timePick,$currentUser);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../dashboard.php?error=none");
        exit();
}
