<?php
include('config.php');
include('adminheader.php');
$brandsquery = $mysqli->query("SELECT * FROM brands WHERE `id`='" . $_GET['id'] . "'");
 
if (!$brandsquery) {
    ?>
    <div class="alert alert-danger" role="alert">
        brand not found
    </div>
    <?php
} else {
    if (isset($_POST['name'])) {
        $mysqli->query("UPDATE brands SET `title` = '" . $_POST['name'] . "' WHERE `id` = '" . $_GET['id'] . "';");
        ?>
        <div class="alert alert-success" role="alert">
            brand updated success
            <br />
            <a href="brand.php" class="btn btn-info"> Back to list brands </a>
        </div>
        <?php
    }
     
    $brands = $brandsquery->fetch_row();
 
    ?>
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Edit brands
                    </h5>
                    <form action="?id=<?php echo $brands[0]; ?>" method="post">

                        <div>
                            <label class="form-label">brand Name</label>
                            <input type="text" name="name" class="form-control" placeholder="brand Name"
                                value="<?php echo $brands[1]; ?>" />
                              
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-success">Edit</button>
                       
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
}
include('footer.php');
?>