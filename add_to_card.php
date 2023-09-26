<?php
include('config.php');
include('header.php');

if (!isset($_SESSION["cart"])) {
  $_SESSION['cart'] = array();
}
if ($_GET['id'] > 0 && intval($_GET['id']) && is_numeric($_GET['id'])) {
  array_push($_SESSION['cart'], $_GET['id']);
}
?>
<p>
  <h3>product add done.</h3>
  <a href="card.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> View Cart</a>
        
</p>

<?php
    include('footer.php');
    ?>