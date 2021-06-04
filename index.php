<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                // Using sql query to find all categories
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        // Getting value of each row
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="category-foods.html">
                            <div class="box-3 float-container">
                                
                                <?php
                                if($image_name == "")       // Showing image if available else error
                                {
                                    echo "<div class='error'>No image available</div>";
                                }
                                else
                                {
                                    ?>
                                        <img src="images/category/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                                    <?php
                                }
                                ?>

                                <h3 class="float-text text-white"><?php echo $title?></h3>
                            </div>
                        </a>
                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>No Category Available.</div>";
                }
            ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->





    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
                // Executing query for food
                $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);

                if($count2 > 0)
                {
                    while($row = mysqli_fetch_assoc($res2))
                    {
                        // Getting value of each row
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['described'];
                        $image_name = $row['image_name'];

                        ?>

                        <div class="food-menu-box">                    
                            <div class="food-menu-img">

                            <?php
                                if($image_name == "")
                                {
                                    echo "<div class='error'>Image not Available.</div>";
                                }
                                else
                                {
                                    ?>

                                    <img src="images/food/<?php echo $image_name;?>" alt="<?php echo $title;?>" class="img-responsive img-curve">

                                    <?php
                                }
                            ?>

                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="food-price"><?php echo $price;?></p>
                                <p class="food-detail"><?php echo $description;?></p>
                                <br>
                                <a href="order.html" class="btn btn-primary">Order Now</a>
                            </div>

                        </div>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'>No Food Available.</div>";
                }
            ?>

            <div class="clearfix"></div>

        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>