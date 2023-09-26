<?php
include('config.php');
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
        unset($_SESSION['user_id']);
        header("Location: login.php");
    }
}
include('adminheader.php');
?>
<?php
$product_order = $mysqli->query("SELECT * FROM `orders`");

?>
<div class="row">
    <div class="col-lg">
        <table class="table table-striped table -dark  table-dark table-striped">
            <thead>
                <center>
                    <h3>List of orders</h3>
                </center>
                <tr>
                    <th scope="col">orders</th>
                    <th scope="col">Action</th>

                </tr>

            </thead>
            <tbody table-group-divider>
                <?php
                while ($order = $product_order->fetch_array()) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $order['id']; ?>
                        </th>
                        <td>
                            <a href="one_order.php?id=<?php echo $order['id']; ?>" class="btn btn-warning">View</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include('footer.php');
?>