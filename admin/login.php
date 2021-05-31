<?php include('../config/constants.php')?>

<html>
    <head>
        <title>Login - Restaurant Website</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        <div class="login">
            <h1 class="text-center">LOGIN</h1>

            <br><br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <br><br>
            <form action="" method="POST" class="text-center">
                Username:
                <input type="text" name="username" placeholder="Enter Username">

                <br><br>

                Password:
                <input type="password" name="password" placeholder="Enter Password">
                <br><br><br>
                <input type="submit" name="submit" value="LOGIN" class="btn-primary">
            </form>
            <br>
        </div>

<?php
    // Check wheter submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Process for login

        // 1. Getting data from login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // 2. Creating sql query
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        // 3. Executing sql query
        $res = mysqli_query($conn, $sql);

        // 4. Count rows to check if user exists or not
        $count = mysqli_num_rows($res);

        if($count == 1)
        {
            $_SESSION['login'] = "<div class='success text-center'>Login Successful !</div>";
            $_SESSION['user'] = $username;      // Checks wheter user is logged in or not

            // Redirecting to admin page
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";

            // Redirecting to admin page
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>


<?php include('partials/footer.php'); ?>