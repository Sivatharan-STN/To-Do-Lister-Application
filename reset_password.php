<?php
    include_once 'header.php';
?>
    <main class="authentication">
        <!-- ----signup area starts here---- -->
        <div class="reset-pass-form">
            <h2>Reset Password</h2>
            <form action="includes/forgotPass.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username...">
                <input type="password" name="pwd" placeholder="New Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat new password...">
                <button type="submit" name="submit">Reset</button>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
            echo"<p class='error'>Fill in all fields!</p>";
        }
        else if ($_GET["error"]=="usernotfound"){
            echo"<p class='error'>user not found!</p>";
        }
        else if($_GET["error"]=="passwordsdontmatch"){
            echo"<p class='error'>Passwords doesn't match!</p>";
        }
        else if($_GET["error"]=="stmtfailed"){
            echo"<p class='error'>Something went wrong, try again!</p>";
        }
        else if($_GET["error"]=="none"){
            echo"<p class='success'>Your password successfully changed!</p>";
        }
        

        // else if($_GET["error"]=="invaliduid"){
        //     echo"<p class='error'>Choose a proper username!</p>";
        // }
        // else if($_GET["error"]=="invalidmail"){
        //     echo"<p class='error'>Choose a proper email!</p>";
        // }
        
        // else if($_GET["error"]=="stmtfailed"){
        //     echo"<p class='error'>Something went wrong, try again!</p>";
        // }
        // else if($_GET["error"]=="usernametaken"){
        //     echo"<p class='error'>Username already taken!</p>";
        // }
        // else if($_GET["error"]=="none"){
        //     echo"<p class='success'>You have signed up!</p>";
        // }
    }
?>

            </form>

        </div>
        <!-- ----signup area ends here---- -->

       

    </main>


<?php 
    include_once 'footer.php';
?>