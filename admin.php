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
}?>
<?php
include('adminheader.php');
include('footer.php');
?>