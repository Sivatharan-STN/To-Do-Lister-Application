<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- -----Linking the icon for website--- -->
    <link rel="shortcut icon" type="image/png" href="images/todo.ico">
    <!-- -----Linking reset style sheet for website--- -->
    <link rel="stylesheet" href="css/preset.css">
    <!-- -----Linking style sheet for website--- -->
    <link rel="stylesheet" href="css/style.css">
    <!-- -----Linking line awesome for website--- -->
    <link rel="stylesheet" href="css/1.3.0/css/line-awesome.min.css">

    <title>ToDoLister App</title>
</head>

<body>
    <!-- ----Nav starts here--- -->
    <nav>
        <div class="wrapper">
            <a href="#"> <span class="logo-title">ToDO Lister </span></a>

            <ul>
                <!-- <li><a href="index.php" class="nav-selection-home"><i class="las la-home"></i>Home</a></li> -->

                <?php
                    if(isset($_SESSION["useruid"])){
                        echo"<li><a href='dashboard.php' class='nav-selection-signup'><i class='las la-user-plus'></i>Dashboard</a></li>
                        <li><a href='includes/logout.inc.php' class='nav-selection-login'><i class='las la-sign-in-alt'></i>Log out</a></li>";
                    }

                    else{
                        echo"<li><a href='signup.php' class='nav-selection-signup'><i class='las la-user-plus'></i>Sign up</a></li>
                        <li><a href='login.php' class='nav-selection-login'><i class='las la-sign-in-alt'></i>Log in</a></li>";
                    }

                ?>
            </ul>
        </div>
    </nav>
    <!-- ----Nav ends here----- -->