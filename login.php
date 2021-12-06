<?php
    include_once 'header.php';
?>
    <main class="authentication">
        <!-- ----signup area starts here---- -->
        <div class="login-form">
            <h2>Log in</h2>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Email/Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <a href="reset_password.php" class="forgot-link"> forgot password?</a>
                <button type="submit" name="submit">Log In</button>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"]=="emptyinput"){
            echo"<p class='error'>Fill in all fields!</p>";
        }
        else if($_GET["error"]=="wronglogin"){
            echo"<p class='error'>Incorrect login information!</p>";
        }
        
    }
?>

            </form>

        </div>
        <!-- ----signup area ends here---- -->

    </main>

<?php 
    include_once 'footer.php';
?>