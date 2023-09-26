<?php
include('config.php');
include('adminheader.php');
if (isset($_POST['name'])) {
    $mysqli->query("INSERT INTO `sections` (`name`) VALUES ('" . $_POST['name'] . "');");
    ?>
    <div class="alert alert-success" role="alert">
        section added success
        <br />
        <a href="sections.php" class="btn btn-info"> Back to list sections </a>
    </div>
    <?php
}
?>
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    Add Section
                </h5>
                <form action="?" method="post">

                    <div>
                        <label class="form-label">Section Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Section Name" />
                    </div>
                    <div class="text-center">
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