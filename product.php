<?php
include('config.php');
include('header.php');
$productsquery = $mysqli->query("SELECT * FROM `products` WHERE `id`='" . $_GET['id'] . "'");
$commentquery = $mysqli->query("SELECT * FROM `comment` where products_id =" . $_GET['id']);
?>
<div class="row">
    <?php
    while ($products = $productsquery->fetch_array()) {
        ?>
        <div class="col-lg">
            <div class="card border-danger mb-5 , background-color: #a3c7f3 " style="max-width: 100rem;">
                <div class="card-body">
                    <center>
                        <h2 class="card-title ">
                            <?php echo "Name of   product  " . $products['title']; ?>
                        </h2>
                    </center>
                    <p class="card-image">
                        <img src="<?php echo $products['image']; ?>" style="max-width: 400px;" />
                    </p>
                    <p class="card-text">
                        <?php echo "price:" . $products['price'] ; ?>
                    </p>
                    <p class="card-text">
                        <?php echo "descripton :" . $products['description']; ?>
                    </p>
                     
                    <p class="card-title">
                        <?php echo " type of brand:" . $products['brands_id']; ?>
                    </p> 
                    <div class="row">
                        <div class="col-lg border-danger b text-dark">
                            <div class="card border border-5">
                                <div
                                    class="card-body p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                                    <form method="POST" action="comment.php">
                                        <input type="hidden" name="products_id" value="<?php echo $products['id']; ?>">
                                        <textarea name="comment" class=" placeholder-bg-info "
                                            placeholder="Comments Here..."></textarea><br>
                                        <input class="btn btn-outline-danger" type="submit" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>comments:: </h4>
                    <?php
                    $commentquery = $mysqli->query("SELECT * FROM `comment` where products_id ='" . $_GET['id'] . "'");
                    while ($comment = $commentquery->fetch_array()) { ?>
                        <?php echo $comment["comment"]; ?>
                        <hr />
                    <?php } ?><br>
                    <a href="add_to_card.php?id=<?php echo $products['id']; ?>" class="btn btn-primary">Add to cart</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
include('footer.php');
?>