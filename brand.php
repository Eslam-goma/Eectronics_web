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
            $mysqli->query("DELETE FROM `brands` WHERE `id` = '" . $_GET['id'] . "'");
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
$brandsquery = $mysqli->query("SELECT * FROM `brands`");
?>
<div class="row">
    <div class="card text-bg-secondary mb-3" style="max-width: 220rem;">
        <a href="add_brand.php" class="btn btn-warning">add brand</a>
        <table class="table table-striped table-striped-columns  table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($brands = $brandsquery->fetch_array()) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $brands['id']; ?>
                        </th>
                        <td>
                            <?php echo $brands['title']; ?>
                        </td>
                        <td>
                            <a href="edit_brand.php?id=<?php echo $brands['id']; ?>" class="btn btn-warning">edit</a> |
                            <a href="?action=delete&id=<?php echo $row['id']; ?>"
                            onclick="return confirm('Are You Sure ?');">Delete</a> 
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