<?php include('partials-front/menu.php'); ?>

<?php
    // Check wheter ID is passed or not
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];

        // Getting title of category
        $sql = "SELECT title FROM tbl_category WHERE id=$category_id";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $category_title = $row['title'];
    }
    else
    {
        // Not passed, go back
        header('location:'.SITEURL);
    }
?>

    <!-- FOOD SEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white"><?php echo $category_title; ?></a></h2>

        </div>
    </section>
    <!-- FOOD SEARCH Section Ends Here -->



    <!-- FOOD MENU Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";
                $res2 = mysqli_query($conn, $sql2);
                
                $count2 = mysqli_num_rows($res2);

                if($count2 > 0)
                {
                    while($row2 = mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['described'];
                        $image_name = $row2['image_name'];

                        ?>

                        <div class="food-menu-box">
                            
                            <?php
                                if($image_name == "")       // Showing image if available else error
                                {
                                    echo "<div class='error'>No image available</div>";
                                }
                                else
                                {
                                    ?>
                                        <img src="images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>


                            <div class="food-menu-desc">
                                <h4><?php echo $title?></h4>
                                <p class="food-price"><?php echo $price?></p>
                                <p class="food-detail"><?php echo $description?></p>
                                <br>
                                <a href="order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>Food not found.</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>