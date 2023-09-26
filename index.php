<?php
include('config.php');
include('header.php');
$dataquery = $mysqli->query("SELECT * FROM `products`");
?>
<?php
while ($section = $dataquery->fetch_array()) {
    ?>
    <div class="col-lg-4">
        <div class="card text-bg-#a3c7f3  mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo "" . $section['title']; ?>
                </h5>
                <p class="card-image">
                    <img src="<?php echo $section['image']; ?>" style="max-width: 70px;" />
                </p>

                <p class="card-text">
                    <?php echo "Price:" . $section['price'] . "$"; ?>
                </p>
                <a href="product.php?id=<?php echo $section['id']; ?>" class="btn btn-primary">view</a>
                <a href="add_to_card.php?id=<?php echo $section['id']; ?>" class="btn btn-primary">Add to cart</a>
            </div>
        </div>
    </div>

<?php } ?>

<?php
include('footer.php');
?>