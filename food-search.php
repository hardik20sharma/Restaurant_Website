<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <h2>Foods on your Search:- <a href="#" class="text-white"><?php echo $_POST['search']?></a></h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

            // Getting the search keyword
            $search = $_POST['search'];

            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR described LIKE '%$search%'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    // Getting the data from database
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $description = $row['described'];
                    $id = $row['id'];

                    ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            
                            if($image_name == "")
                            {
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                ?>
                                    <img src="images/food/<?php echo $image_name?>"  class="img-responsive img-curve">
                                <?php
                            }

                            ?>
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title?></h4>
                            <p class="food-price"><?php echo $price?></p>
                            <p class="food-detail"><?php echo $description?></p>
                            <br>
                            <a href="#" class="btn btn-primary">Order Now</a>
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