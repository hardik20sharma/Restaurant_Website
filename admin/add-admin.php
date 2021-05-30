<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br />

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <br />
        <br />

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php
    // Process the value from Form and save it in database
    
    // On Button Clicked
    if(isset( $_POST['submit'] ))
    {   
        // 1. Getting the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);        // Encrypting password with MD5


        // 2. SQL Query to save the data in database
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        // 3. Executing the query, adding the data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // 4. Check whether the data is inserted or not and displayed
        if($res == TRUE)
        {
            // ON DATA INSERTED
            // Creating a session
            $_SESSION['add'] = "Admin added successfully";

            // Redirecting to manage-admin page
            header("location:".SITEURL."admin/manage-admin.php");
        }
        else
        {
            // FAILED TO INSERT THE DATA

            // Creating a session
            $_SESSION['add'] = "Failed to add Admin";

            // Redirecting to add-admin page
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }
?>