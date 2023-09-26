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
      $mysqli->query("DELETE FROM `sections` WHERE `id` = '" . $_GET['id'] . "'");
      $delete = 'done';
    } else {
      $delete = 'not';
    }
    if ($delete == 'done') {
      ?>
      <div class="alert alert-success" role="alert">
        delete done success
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
$sectionsquery = $mysqli->query("SELECT * FROM `sections`");
?>
<div class="row">
  <div class="col-lg">
    <a href="add_section.php" class="btn btn-success">add section</a>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($section = $sectionsquery->fetch_array()) {
          ?>
          <tr>
            <th scope="row">
              <?php echo $section['id']; ?>
            </th>
            <td>
              <?php echo $section['name']; ?>
            </td>
            <td>
              <a href="edit_section.php?id=<?php echo $section['id']; ?>" class="btn btn-warning">edit</a> |
              <a href="?action=delete&id=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure ?');">Delete</a>

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