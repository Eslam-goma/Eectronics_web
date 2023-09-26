<?php
include('config.php');
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
}
include('adminheader.php');
$delete = '';

?>
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
<div class="row">
  <div class="col-lg">
    <a href="add_products.php" class="btn btn-success">add product</a>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="table-primary">#</th>
          <th scope="table-danger">title</th>
          <th scope="col">image</th>
          <th scope="col">section_id</th>
          <th scope="col">price</th>
          <th scope="col">description</th>
          <th scope="table-info">create_at</th>
          <th scope="col">brands_id</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($section = $productsquery->fetch_array()) {
          ?>
          <tr>
            <th scope="row">
              <?php echo $section['id']; ?>
            </th>
            <td>
              <?php echo $section['title']; ?>
            </td>
            <td>
              <?php echo $section['image']; ?>
            </td>
            <td>
              <?php echo $section['section_id']; ?>
            </td>
            <td>
              <?php echo $section['price']; ?>
            </td>
            <td>
              <?php echo $section['description']; ?>
            <td>
              <?php echo $section['create_at']; ?>
            </td>
            <td>
              <?php echo $section['brands_id']; ?>
            </td>
            </td>
            <td>
              <a href="edit_product.php?id=<?php echo $section['id']; ?>" class="btn btn-warning">edit</a>
              <a href="?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure ?');">Delete</a>
            </td>
          </tr>

          <?php

        } ?>
      </tbody>
    </table>
  </div>

</div>
<?php
include('footer.php');
?>