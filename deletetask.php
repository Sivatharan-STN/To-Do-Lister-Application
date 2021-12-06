<?php
    if(isset($_POST["delete"])){

        $taskId=$_GET['task'];

        $serverName="localhost";
        $dBUsername="root";
        $dBPassword="";
        $dBName="toDoLister";

        $conn=mysqli_connect($serverName,$dBUsername,$dBPassword,$dBName);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // sql to delete a record
        $sql = "DELETE FROM task WHERE taskId=$taskId";

        if (mysqli_query($conn, $sql)) {
            header("location: dashboard.php");
        } 
        else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        

    }
    else{
        header("location: dashboard.php");
    }