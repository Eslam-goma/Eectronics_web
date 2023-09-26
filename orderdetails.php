<?php
include('config.php');
    $query = "SELECT * FROM products ORDER BY id ASC";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
        ?>
<div style="clear:both"></div>
    <br />
    <h3>Order Details</h3>
    <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th width="40%">Item Name</th>
          <th width="10%">Quantity</th>
          <th width="20%">Price</th>
          <th width="15%">Total</th>
          <th width="5%">Action</th>
        </tr>
        <?php
        if (!empty($_SESSION["add_to_cart"])) {
          $total = 0;
          foreach ($_SESSION["add_to_cart"] as $keys => $values) {
            ?>
            <tr>
              <td>
                <?php echo $values["title"]; ?>
              </td>
              <td>
                <?php echo $values["quantity"]; ?>
              </td>
              <td>$
                <?php echo $values["price"]; ?>
              </td>
              <td>$
                <?php echo number_format($values["quantity"] * $values["price"], 2); ?>
              </td>
              <td><a href="order.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
                    class="text-danger">Remove</span></a></td>
            </tr>
            <?php
            $total = $total + ($values["quantity"] * $values["price"]);
          }
          ?>
        <tr>
          <td colspan="3" align="right">Total</td>
          <td align="right">$
            <?php echo number_format($total, 2); ?>
          </td>
          <td></td>
        </tr>
        <?php
        }
      }}  ?>

      </table>
    </div>
    <?php
include('footer.php');
?>