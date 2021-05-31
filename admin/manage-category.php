<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Categories</h1>

            <br /><br />

            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            ?>

            <br><br>

            <a href="add-category.php" class="btn-primary">Add Category</a>

            <br /><br />
            
            <table class="tbl-full">
                <tr>
                    <th>S. No.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM tbl_category";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count > 0)
                    {
                        $sn = 1;

                        while($row = mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>

                                <td>
                                    <?php
                                        if($image_name != "")
                                        {
                                            ?>
                                            <image src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px">
                                            <?php
                                        }
                                        else
                                        {
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                    ?>
                                </td>

                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="#" class="btn-secondary">Update Category</a>
                                    <a href="#" class="btn-danger">Delete Category</a>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        ?>
                            <tr>
                                <td colspane='6'><div class='error'>No category added.</div></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>

        </div>
    </div>

<?php include('partials/footer.php'); ?>