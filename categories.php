<?php include('partials-front/menu.php'); ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
                // Using sql query to find all categories
                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
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

                        <a href="category-foods.php?category_id=<?php echo $id; ?>">
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

<?php include('partials-front/footer.php'); ?>