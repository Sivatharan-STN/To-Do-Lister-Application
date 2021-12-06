<?php
    include_once 'header.php';
    $currentUser=$_SESSION["userid"]
?>


<main class="dashboard">
    <div class="todo">
        <div class="todo-header">
            <!-- <h1><i class="las la-clipboard-check"></i>Add New Users</h1> -->
            <div class="title">
                <h1><i class="las la-clipboard-check"></i>Add New task</h1>
                <h1><i class="las la-user-circle"></i>

                <?php
                    require_once 'includes/dbh.inc.php';
                    $sql="SELECT usersName from users WHERE usersId=$currentUser";
                    
                    $result=$conn->query($sql);
                    if($result -> num_rows > 0){
                        while($row=$result-> fetch_assoc()){
                            $currentUserName=$row['usersName'];
                            echo($currentUserName);

                        }
                    }

                ?>

                </h1>
            </div>
            <form action="includes/addtask.php" method="Post">
                <div class="category1">
                    <input type="text" name="task" placeholder="your task....">
                    <input type="date"  name="date">
                    <input type="time" name="timepick">
                </div>
                <button class="add-task" name="submit">+</button>
            </form>

<?php

if(isset($_GET["error"])){
    if($_GET["error"]=="emptyinput"){
        echo '<script>alert("Please fill all the fields!")</script>';
    }
    else if($_GET["error"]=="stmtfailed"){
        echo '<script>alert("Something went wrong..Please try again!")</script>';
    }
    else if($_GET["error"]=="none"){
        echo '<script>alert("New task added successfully!")</script>';
    }
    
    
}

?>

        </div>
        <div class="todo-body">
            <h1><i class="las la-clipboard-check"></i>All tasks of <?php echo($currentUserName)?></h1>
            <div class="category2">

                <table>
                    <tr>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>


                    <?php
                    require_once 'includes/dbh.inc.php';
                    $sql="SELECT taskId, taskName, taskDate,taskTime from task WHERE usersId=$currentUser";
                    
                    $result=$conn->query($sql);
                    if($result -> num_rows > 0){
                        while($row=$result-> fetch_assoc()){
                             $currentTask=$row['taskId'];
                            echo("

                            <tr>
                                <td>". $row['taskName'] ."</td>
                                <td>". $row['taskDate'] ."</td>
                                <td>". $row['taskTime'] ."</td>
                                <td>
                                    <form action='deletetask.php?task=$currentTask' method='Post'>
                                        <button class='btn delete-btn' name='delete'><i class='las la-times'></i></button>
                                    </form>
                                </td> 
                            </tr>
                            
                            ");
                        }
                    }
                    else{
                        echo("
                        
                        <tr>
                                <td>No task found!</td>
                                <td>No task date!</td>
                                <td>No task time!</td>
                                <td>No action found!</td> 
                            </tr>
                        
                        ");
                    }

                    ?>




                    
                    
                </table>
            </div>
        </div>
    </div>
</main>

<?php
    include_once 'footer.php';
    
?>