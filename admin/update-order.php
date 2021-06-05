<?php include('partials/menu.php') ?>

<div class='main-content'>
    <div class='wrapper'>
        <h1>Update Order</h1>
        
        <br><br>

        <?php
            // Check wheter id is set or not
            if(isset($_GET['id']))
            {
                // Get order details
                $id = $_GET['id'];

                // Get all other details through sql query
                $sql = "SELECT * FROM tbl_order WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count == 1)     // Only one row should be present
                {
                    $row = mysqli_fetch_assoc($res);

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
                }
                else
                {
                    // Else, go back
                    header('location:'.SITEURL.'admin/manage-order.php');    
                }
            }
            else
            {
                // Else, go back
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        ?>

        <form action="" method="POST">
            <table class='tbl-30'>
                
                <tr>
                    <td>Food Name</td>
                    <td><b><?php echo $food; ?></b></td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td><b><?php echo $price; ?></b></td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td><input type='number' name='qty' placeholder='<?php echo $qty; ?>'></td>
                </tr>

                <tr>
                    <td>Food Name</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered") {echo "selected";}?> value="Ordered">Ordered</option>
                            
                            <option <?php if($status=="On Delivery") {echo "selected";}?> value="On Delivery">On Delivery</option>
                            
                            <option <?php if($status=="Delivered") {echo "selected";}?> value="Delivered">Delivered</option>
                            
                            <option <?php if($status=="Cancelled") {echo "selected";}?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Customer Name: </td>
                    <td><input type='text' name='customer_name' placeholder='<?php echo $customer_name; ?>'></td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td><input type='text' name='customer_contact' placeholder='<?php echo $customer_contact; ?>'></td>
                </tr>

                <tr>
                    <td>Customer E-mail: </td>
                    <td><input type='text' name='customer_email' placeholder='<?php echo $customer_email; ?>'></td>
                </tr>

                <tr>
                    <td>Customer Address: </td>
                    <td><textarea name='customer_address' cols='30' rows='5' placeholder="<?php echo $customer_address; ?>"></textarea></td>
                </tr>

                <tr>
                    <td colspan='2'><input type='submit' name='submit' value='Update Order' class='btn-secondary'></td>

                    <input type='hidden' name='id' value='<?php echo $id; ?>'>
                    <input type='hidden' name='price' value='<?php echo $price; ?>'>
                </tr>

            </table>
        </form>

        <?php
            // Check wheter update button is clicked or not
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = (float)$price * (float)$qty;
                $order_date = $_POST['order_date'];
                $status = $_POST['status'];
                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                // Update the values
                $sql2 = "UPDATE tbl_order SET 
                    qty = $qty,
                    total = $total,
                    status = $status,
                    customer_name = $customer_name,
                    customer_email = $customer_email,
                    customer_contact = $customer_contact,
                    customer_address = $customer_address,
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == TRUE)
                {
                    // Updated
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else
                {
                    // Failed to update
                    $_SESSION['update'] = "<div class='error'>Failed to update Order.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>
    </div>
</div>

<?php include('partials/footer.php') ?>