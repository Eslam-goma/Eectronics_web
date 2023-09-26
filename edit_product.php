<?php
include('config.php');
include('adminheader.php');
$productsquery = $mysqli->query("SELECT * FROM `products`WHERE `id`='" . $_GET['id'] . "'");
$one_product = $productsquery->fetch_array();
$sectionquery = $mysqli->query("SELECT * FROM `sections`WHERE `id`='" . $_GET['id'] . "'");
$one_section = $sectionquery->fetch_array();
$sectionquery = $mysqli->query("SELECT * FROM `sections`");
$brandsquery = $mysqli->query("SELECT * FROM `brands`");
if (empty($one_product['id'])) {
    ?>
    <div class="alert alert-danger" role="alert">
        product not found
    </div>
    <?php
} else {
    //echo "test else ";
    if (isset($_POST['title'])) {
        echo "before qurey ";
        $image = $one_product['image'];
        if (!empty($_FILES['image']['name'])) {
            $ext = end(explode(".", $_FILES['image']['name']));
            $image = 'uploads/' . rand(1, 9999) . '_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        }
        $mysqli->query("UPDATE `products` SET `title` = '" . $_POST['title'] . "' , description='" . $_POST['description'] . "', create_at='" . $_POST['create_at'] . "', brands_id='" . $_POST['brand_id'] . "', section_id='" . $_POST['section_id'] . "', image='" . $image . "'  WHERE `id` = '" . $one_product['id'] . "';");
        echo "test update";
        ?>
        <div class="alert alert-success" role="alert">
            product updated success
            <br />
            <a href="products.php" class="btn btn-info"> Back to list products </a>
        </div>
        <?php
    }
    $productsquery = $mysqli->query("SELECT * FROM `products`WHERE `id`='" . $_GET['id'] . "'");
    $one_product = $productsquery->fetch_array();
    ?>
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        Edit product
                        </h5>
                        <form action="?id=<?php echo $one_product['id']; ?>" method="post" enctype="multipart/form-data">
                            <div>
                                <label class="form-label">product Name</label>
                                <input type="text" name="title" class="form-control" placeholder="title"
                                    value="<?php echo $one_product['title']; ?>" />
                                <br>
                                <input type="file" name="image" class="form-control" placeholder=" image" />
                                <br>
                                <label class="form-label">product section</label>
                                <select name="section_id" class="form-select">
                                    <option value="">Select section</option>
                                    <?php while ($section = $sectionquery->fetch_array()) { ?>
                                        <option value="<?php echo $section["id"]; ?>" <?php if ($section["id"] == $one_product["section_id"]) {
                                               echo "selected";
                                           } ?>><?php echo $section["name"]; ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <input type="text" name="description" class="form-control" placeholder="description"
                                    value="<?php echo $one_product['description']; ?>" />
                                <br>
                                <input type="text" name="create_at" class="form-control" placeholder="create_at"
                                    value="<?php echo $one_product['create_at']; ?>" />
                                <br>
                                <label class="form-label">product brand</label>
                                <select name="brand_id" class="form-select">
                                    <option value="">Select brand</option>
                                    <?php while ($brands = $brandsquery->fetch_array()) { ?>
                                        <option value="<?php echo $brands["id"]; ?>" <?php if ($brands["id"] == $one_product["brands_id"]) {
                                               echo "selected";
                                           } ?>><?php echo $brands["title"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="buttom-center">
                                <button type="submit" class="btn btn-success">edit</button>
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