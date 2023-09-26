<?php
include('config.php');
include('header.php');
if (isset($_POST["submit"])) {
     $search = $_POST['search'];
     $sql = "SELECT * FROM products WHERE title Like '%" . $search . "%' ";
     $result = mysqli_query($mysqli, $sql);
     if ($result) {
          while ($row = $result->fetch_assoc()) {
               echo '<tr><td>' . "title: " . $row["title"] . " ---image: " . $row["image"] . "   ---price: " . $row["price"] . "   ---section_id: " . $row["section_id"] . "   ---description: " . $row["description"] . "   ---create_at: " . $row["create_at"] . "   ---brands_id: " . $row["brands_id"] . '<tr><td>' . " <br>";
        }
     } else {
          echo '<label>Data not Found</label>';
     }
}
?>
<?php
include('footer.php');
?>