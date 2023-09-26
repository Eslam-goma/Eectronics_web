<?php
include('config.php');
include('header.php');

?>
<form method="POST" action="add_to_card.php">
  <table class="table table-bordered table-striped">
    <thead>
      <th></th>
      <th>Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Subtotal</th>
    </thead>
    <tbody>
      <?php
      //initialize total
      $total = 0;
      if (!empty($_SESSION['cart'])) {
        //connection
        //create array of initail qty which is 1
        $index = 0;
        
        if (!isset($_SESSION['qty_array'])) {
          $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
        }
        
        $sql = "SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
         //echo implode(',', $_SESSION['cart']);
        // exit();
        //echo 'test';
        $query = $mysqli->query("SELECT * FROM `products` WHERE `id` IN (" . implode(',', $_SESSION['cart']) . ") GROUP BY `id`");
        //$query = $mysqli->query($sql);
        while ($row = $query->fetch_array()) {
          ?>
          <tr>
            <td>
              <a href="card.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>"
                class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
            <td>
              <?php echo $row['title']; ?>
            </td>
            <td>
              <?php echo number_format($row['price'], 2); ?>
            </td>
            <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
            <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>"
                name="qty_<?php echo $index; ?>"></td>
            <td>
              <?php echo number_format($_SESSION['qty_array'][$index] * $row['price'], 2); ?>
            </td>
            <?php $total += $_SESSION['qty_array'][$index] * $row['price']; ?>
          </tr>
          <?php
        }
      } else {
        
        ?>
      <tr>
        <td colspan="4" class="text-center">No Item in Cart</td>
      </tr>
      <?php
      }

      ?>
      <tr>
        <td colspan="4" align="right"><b>Total</b></td>
        <td><b>
            <?php echo number_format($total, 2); ?>
          </b></td>
      </tr>
    </tbody>
  </table>
  <a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
  <a href="confirm.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Buy</a>
</form>
</div>
<?php
include('footer.php');
?>