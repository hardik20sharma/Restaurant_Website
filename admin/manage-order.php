<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Orders</h1>

            <br /><br />
            <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <br><br>
            
            <table class="tbl-full">
                <tr>
                    <th>S.No.</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty.</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Cust Name</th>
                    <th>Contact</th>
                    <th>E-mail</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
                
                <?php
                    // Getting all orders from tbl_order
                    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if($count > 0)
                    {
                        $sn = 1;
                        while($row = mysqli_fetch_assoc($res))
                        {
                            // Get all the order details
                            $id = $row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];

                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $food; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $qty; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td><?php echo $order_date; ?></td>
                                    <td>
                                        <?php
                                            if($status == 'Ordered')
                                            {
                                                echo "<label>$status</label>";
                                            }
                                            else if($status == 'On Delivery')
                                            {
                                                echo "<label style='color: orange;'>$status</label>";
                                            }
                                            else if($status == 'Delivered')
                                            {
                                                echo "<label style='color: green;'>$status</label>";
                                            }
                                            else if($status == 'Cancelled')
                                            {
                                                echo "<label style='color: red;'>$status</label>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $customer_contact; ?></td>
                                    <td><?php echo $customer_email; ?></td>
                                    <td><?php echo $customer_address; ?></td>
                                    <td>
                                        <a href="update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "<tr><td colspane='12' class='error'>Order not available.</td></tr>";
                    }
                ?>

            </table>

        </div>
    </div>

<?php include('partials/footer.php'); ?>