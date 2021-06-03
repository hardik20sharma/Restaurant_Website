<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>

            <br /><br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))  // When we fail to delete the food
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['upload']))  // When we fail to upload the image
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if(isset($_SESSION['unauthorize']))  // User/data is not authorized
                {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                }

                if(isset($_SESSION['update']))  // When we successfully update
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['remove-failed']))  // When we failed to remove image
                {
                    echo $_SESSION['remove-failed'];
                    unset($_SESSION['remove-failed']);
                }
            ?>

            <br><br>

            <a href="add-food.php" class="btn-primary">Add Food</a>
            <br /><br />
            
            <table class="tbl-full">
                <tr>
                    <th>S. No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM tbl_food";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if($count > 0)
                    {
                        $sn = 1;
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $description = $row['described'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                        <?php
                                            if($image_name == "")
                                            {
                                                echo "<div class='error'>Image not added.</div>";
                                            }
                                            else
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name?>" width='100px'>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $description; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="update-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-secondary">Update Food</a>

                                        <a href="delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "<tr><td colspan='7' class='error'>Food not added yet.</td></tr>";
                    }
                ?>
            </table>
        </div>
    </div>

<?php include('partials/footer.php'); ?>