<?php
include('config.php');
include('adminheader.php');
?>
<?php
$id = $_GET['id'];
$ordersquery = $mysqli->query("SELECT * FROM `orders` WHERE `id`='" . $_GET['id'] . "'");
$productsquery = $mysqli->query("SELECT * FROM `products`");
$product_order = $mysqli->query("SELECT * FROM `product_order` WHERE `orders_id` = '" . $_GET['id'] . "'");
$orders = $ordersquery->fetch_array()
    ?>
<div class="row">
<div class="col-lg">
    <div class="card border-danger mb-4 custom-card">
        <div class="card-body">

            <h3 class="card-title custom-title">
                <?php echo "Card Holder Name :" . $orders['Card Holder Name']; ?>
            </h3>
            <p class="card-text custom-text">
                <?php echo "Expiry date:" . $orders['Expiry date']; ?>
            </p>
            <p class="card-text custom-text">
                <?php echo "CVV :" . $orders['CVV']; ?>
            </p>
            <p class="card-text custom-text">
                <?php echo "Card Number:" . $orders['Card Number']; ?>
            </p>

            <p class="card-text">
            <h4 class="custom-subtitle">Order Products</h4>
            <table class="table table-striped table-dark table-striped custom-table">
                <?php while ($order = $product_order->fetch_array()) { ?>
                    <tr>
                        <?php
                        $qproduct = $mysqli->query("SELECT * FROM `products` WHERE `id` = '" . $order['products_id'] . "'");
                        $product = $qproduct->fetch_array();
                        ?>
                        <td>
                            <?php echo "Name of product::" . $product['title']; ?>
                        </td>
                        <td>
                            <?php echo "Price of product::" . $product['price']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            </p>
        </div>
    </div>
</div>


</div>
<?php
include('footer.php'); ?>