<?php
include('config.php');
include('header.php');
?>
<?php
$comment = $_POST["comment"];
$products_id = $_POST["products_id"];
$sql = "INSERT INTO comment (comment,products_id) VALUES ('$comment','$products_id')";
if (mysqli_query($mysqli, $sql)) {
  echo "<h3>Comment added successfully</h3>";
} else {
  echo "Error adding comment: " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>
<?php
include('footer.php');
?>