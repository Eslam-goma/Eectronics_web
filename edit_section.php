<?php
include('config.php');
//include('sections.php');
$sectionquery = $mysqli->query("SELECT * FROM `sections`WHERE `id`='" . $_GET['id'] . "'");
$one_section = $sectionquery->fetch_array();
if (empty($one_section['id'])) {
    ?>
    <div class="alert alert-danger" role="alert">
        section not found
    </div>
    <?php
} else {
    if (isset($_POST['name'])) {
        $mysqli->query("UPDATE `sections` SET `name` = '" . $_POST['name'] . "' WHERE `id` = '" . $one_section['id'] . "';");
        ?>
        <div class="alert alert-success" role="alert">
            section updated success
            <br />
            <a href="sections.php" class="btn btn-info"> Back to list sections </a>
        </div>
        <?php
    }
    $sectionquery = $mysqli->query("SELECT * FROM `sections`WHERE `id`='" . $_GET['id'] . "'");
    $one_section = $sectionquery->fetch_array();
    ?>
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Edit Section
                    </h5>
                    <form action="?id=<?php echo $one_section['id']; ?>" method="post">

                        <div>
                            <label class="form-label">Section Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Section Name"
                                value="<?php echo $one_section['name']; ?>" />
                              
                        </div>
                        <div class="text-center ">
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