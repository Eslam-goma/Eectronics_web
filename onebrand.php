<?php
include('config.php');
include('header.php');

$productsquery = $mysqli->query("SELECT * FROM `products`WHERE `brands_id`='" . $_GET['id'] . "'");
?>
<?php
if ($_GET['id'] == 'delete' && !empty($_GET['id'])) {
    $mysqli->query("DELETE FROM `products` WHERE `id` = '" . $_GET['id'] . "'");
    echo 'delete done<br />';
}
$dataquery = $mysqli->query("SELECT * FROM `products`");
?>
<div class="row">
    <?php
    while ($products = $productsquery->fetch_array()) {
        ?>
        <div class="col-lg">
            <div class="card border-danger mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    <h4 class="card-header">
                        <?php echo $products['title']; ?>
                    </h4>
                    <p class="card-text">
                        <img src="<?php echo $products['image']; ?>" style="max-width: 250px;" />
                    </p>
                    <p class="card-text">
                        <?php echo  "price :" .$products['price']; ?>
                    </p>
                    <p class="card-text">
                        <?php echo $products['description']; ?>
                    </p>
                   
                    <p class="card-title">
                        <?php echo $products['brands_id']; ?>
                    </p>
                    <a href="product.php?id=<?php echo $products['id']; ?>" class="btn btn-primary">view</a><br>
                    <a href="cart.php?id=<?php echo $products['id']; ?>" class="btn btn-primary">Add to cart</a>
                    <td>
                       
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
include('footer.php');
?>