<?php

    // Including constants.php file here
    include('../config/constants.php');

    // 1. Get the ID of admin to be deleted
    $id = $_GET['id'];
    
    // 2. Create SQL Query to Delete Admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // Executing the query
    $res = mysqli_query($conn, $sql);

    // Check if query is executed successfully

    // 3. Redirect to manage admin page with message
    if($res == TRUE)
    {
        // Query executed succefully

        // Creating session variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";

        // Redirect to <manage-admin.php
        header("location:".SITEURL."admin/manage-admin.php");
    }
    else
    {
        // Query failed

        // Creating session variable to display message
        $_SESSION['delete'] = "<div class='error'>Failed to delete Admin. Try Again Later</div>";

        // Redirect to <manage-admin.php
        header("location:".SITEURL."admin/manage-admin.php");
    }
?>