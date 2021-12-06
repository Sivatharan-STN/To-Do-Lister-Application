<?php
    session_start();//session starts here
    $currentUser=$_SESSION["userid"]; //find current user using session variable

    //check form submission
    if(isset($_POST["submit"])){

        $task= $_POST["task"]; //assign form value to varible $task
        $date= $_POST["date"];  //assign form value to varible $date
        $timePick=$_POST["timepick"];  //assign form value to varible $timepick

        require_once 'dbh.inc.php'; //adding db connection
        require_once 'functions.inc.php'; //adding functions 

        //check input fields empty or not
        if(emptyInputtask( $task,$date,$timePick)!==false){
            header("location: ../dashboard.php?error=emptyinput");//redirect to dashboard.php if fields empty
            exit();
        }
    
        //if all fields not empty
        inserdata($conn,$task,$date,$timePick,$currentUser); //insert data into task table
    }
    else{
        header("location: ../dashbord.php");//if form not submitted 
        exit();
    }

    //i did not closed php because it some time causes error