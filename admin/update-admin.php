<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>

        <?php
            // 1. Getting the ID of selected Admin
            $id=$_GET['id'];

            // 2. Creating SQL Query to get the details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            // 3. Executing the Query
            $res=mysqli($conn, $sql);

            // Checking if query is executed or not
            if($res == TRUE)
            {
                $count=mysqli_num_rows($res);

                if($count==1)       // Only when count is one we update the query, not 0 and not more
                {
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="" placeholder="<?php echo $full_name; ?>"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value="" placeholder="<?php echo $username; ?>"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
                
            </table>
        </form>

    </div>
</div>

<?php
    // Check wheter submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Getting all the values from Form to Update

        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // Creating SQL Query to Update admin
        $sql = "UPDATE tbl_admin SET full_name='$full_name', username='$username' WHERE id='$id'";

        // Executing the query
        $res = mysqli_query($conn, $sql);

        // Checking if query is executed or not
        if($res == TRUE)
        {
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";

            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Failed to update admin"</div>; 

            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('partials/footer.php'); ?>