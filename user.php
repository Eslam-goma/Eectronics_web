<?php
include('config.php');
include('header.php');

$delete = '';

?>
<p style="background-color:Tomato;" ></p> 
<?php
if (isset($_GET['action'])) {
  if ($_GET['action'] == 'delete') {
    if (!empty($_GET['id'])) {
      $mysqli->query("DELETE FROM `products`  WHERE `id` = '" . $_GET['id'] . "'");
      $delete = 'done';
    } else {
      $delete = 'not';
    }
    if ($delete == 'done') {
      ?>
      <div class="alert alert-success" role="alert">
        delete done products
      </div>
      <?php
    }
    if ($delete == 'not') {
      ?>
      <div class="alert alert-danger" role="alert">
        delete not success
      </div>
      <?php
    }
  }
}
$productsquery = $mysqli->query("SELECT * FROM `products` ");

?>
