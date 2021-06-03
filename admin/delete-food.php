<?php

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        // Proceeding to delete

        // 1. Get ID and image_name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // 2. Remove the image if available

        // Checking if image is present or not
        if($image_name != "")
        {
            // Image available
            $path = "../images/food/".$image_name;

            // Remove image from folder
            $remove = unlink($path);

            if($remove == FALSE)
            {
                // Failed to remove image
                $_SESSION['upload'] = "<div class='error'>Failed to remove the image.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();  // Just die bro
            }
        }

        // 3. delete food from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        // 4. Redirect to manage food with session message
        if($res == TRUE)    // Checks if query is executed or not
        {
            $_SESSION['delete'] = "<div class='success'>Food deleted successfully.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to delete food.</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else
    {
        //  Impossible to delete, redirect back

        $_SESSION['unauthorize'] = "<div class='error'>Failed to delete the food.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>