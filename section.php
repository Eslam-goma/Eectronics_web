<?php
include('config.php');
session_start();
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

unset($_SESSION['qty_array']);
include('header.php');
$productsquery = $mysqli->query("SELECT * FROM `products`WHERE `section_id`='" . $_GET['id'] . "'");
?>
<?php
if ($_GET['id'] == 'delete' && !empty($_GET['id'])) {
    $mysqli->query("DELETE FROM `products` WHERE `id` = '" . $_GET['id'] . "'");
    echo 'delete done<br />';
}
$dataquery = $mysqli->query("SELECT * FROM `products`");
?>
<div class="row ">
    <?php
    while ($products = $productsquery->fetch_array()) {
        ?>
        <div class="col-lg">
            <div class="card border-dark mb-3 " style="max-width: 18rem;">
               
            <div class="card-body ">
                    <h3 class="card-header">
                        <?php echo $products['title']; ?>
                    </h3>
                    <p class="card-text">
                        <img src="<?php echo $products['image']; ?>" style="max-width: 250px;" />
                    </p>
                    <p class="card-text">
                        <?php echo"price:" .$products['price']; ?>
                    </p>
                    <p class="card-text">
                        <?php echo $products['description']; ?>
                    </p>
                   
                    <p class="card-title">
                        <?php echo"Brands". $products['brands_id']; ?>
                    </p>
                    
                    <a href="product.php?id=<?php echo $products['id']; ?>" class="btn btn-primary">view</a><br>
                    <a href="add_to_card.php?id=<?php echo $products['id']; ?>" class="btn btn-primary">Add to cart</a>
                    <td>
                        
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
include('footer.php');
?>