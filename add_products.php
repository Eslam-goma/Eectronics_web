<?php
include('config.php');
include('adminheader.php');

$sectionquery = $mysqli->query("SELECT * FROM `sections`");
$brandsquery = $mysqli->query("SELECT * FROM `brands`");
if (isset($_POST['title'])) {
    $image = '';
    if (!empty($_FILES['image']['name'])) {
        $ext = end(explode(".", $_FILES['image']['name']));
        $image = 'uploads/' . rand(1, 9999) . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }
    $mysqli->query("INSERT INTO products (`title`,`image`,`section_id`,`price`,`description`,`create_at`,`brands_id`) VALUES ('" . $_POST['title'] . "','" . $image . "','" . $_POST['section_id'] . "','" . $_POST['price'] . "','" . $_POST['description'] . "','" . date("Y-m-d") . "','" . $_POST['brands_id'] . "')");

    ?>
    <div class="alert alert-success" role="alert">
        product added success
        <br />
        <a href="products.php" class="btn btn-info"> Back to list products </a>
    </div>
    <?php
}
?>
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-body p-5">
                <h5 class="card-title">
                    Add products
                </h5>
                <form action="?" method="post" enctype="multipart/form-data">
                    <div>
                        <label class="form-label">product title</label>
                        <input type="text" name="title" class="form-control" placeholder=" title" />
                    </div>

                    <div>
                        <label class="form-label">product image</label>
                        <input type="file" name="image" class="form-control" />
                    </div>

                    <div>
                        <label class="form-label">product section</label>
                        <select name="section_id" class="form-select">
                            <option value="">Select section</option>
                            <?php while ($section = $sectionquery->fetch_array()) { ?>
                                <option value="<?php echo $section["id"]; ?>"><?php echo $section["name"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>
                        <label class="form-label">product price</label>
                        <input type="text" name="price" class="form-control" placeholder=" price" />
                    </div>

                    <div>
                        <label class="form-label">product description</label>
                        <textarea class="form-control" name="description" rows="3"
                            placeholder=" description"></textarea>
                    </div>
                    <div>
                        <label class="form-label">product brand</label>
                        <select name="brand_id" class="form-select">
                            <option value="">Select brand</option>
                            <?php while ($brands = $brandsquery->fetch_array()) { ?>
                                <option value="<?php echo $brands["id"]; ?>"><?php echo $brands["title"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="buttom-center">
                        <button type="submit" class="btn btn-success">add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>