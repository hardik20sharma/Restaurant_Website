<?php include('partials/menu.php'); ?>
        
    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <!-- Button to add Admin -->
            <br />

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];      // Display message showing admin added
                    unset($_SESSION['add']);    // Remove the message
                }
            ?>

            <br /><br />

            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br />
            <br />
            
            <table class="tbl-full">
                <tr>
                    <th>S. No.</th>
                    <th>FUll Name</th>
                    <th>UserName</th>
                    <th>Actions</th>
                </tr>

                <?php
                    // Query to get all admin
                    $sql = "SELECT * FROM tbl_admin";

                    // Executing the query
                    $res = mysqli_query($conn, $sql);

                    // Check wheter the query worked or not
                    if($res == TRUE)
                    {
                        // Count rows to check wheter we have any data in database or not
                        $count = mysqli_num_rows($res);      // Function to get no. of rows

                        if($count > 0)
                        {
                            $sn = 1;    // Serial Number variable

                            // WE HAVE DATA IN DATABASE
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                // Using this loop, we get and display all data

                                // Getting individual data
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];

                                ?>
                                    <tr>
                                        <td><?php echo $sn++?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td> 
                                        <td>
                                            <a href="#" class="btn-secondary">Update Admin</a>
                                            <a href="#" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>

                                <?php
                            }
                        }
                        else
                        {
                            // WE DON'T HAVE DATA IN DATABASE
                        }

                    }
                ?>
            </table>
        </div>
    </div>
    <!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); ?>