<?php
include('config.php');

include('header.php');

    if (isset($_POST['submit'])) {
        $Card_Number = $_POST['Card_Number'];
        $Expiry_date = $_POST['Expiry_date'];
        $CVV = $_POST['CVV'];
        $Card_Holder_Name = $_POST['Card_Holder_Name'];
        $orderdate = date("Y-m-d");
        $sql = "INSERT INTO `orders` (`Card Number`,`Expiry date`, `CVV`, `Card Holder Name`, `orderdate`) VALUES ('".$_POST['Card_Number']."', '".$_POST['Expiry_date']."','".$_POST['CVV']."', '".$_POST['Card_Holder_Name']."', '".date("Y-m-d")."')";
        // mysqli_query($mysqli, $sql);
        $mysqli->query($sql);
        $id = $mysqli->insert_id;
        $query2 = $mysqli->query("SELECT * FROM `products` WHERE `id` IN (" . implode(',', $_SESSION['cart']) . ") GROUP BY `id`");
        //$query = $mysqli->query($sql);
        while ($row = $query2->fetch_array()) {
            $mysqli->query("INSERT INTO `product_order` (`products_id`,`orders_id`) VALUES ('".$row['id']."', '".$id."')");
        }
        unset($_SESSION['cart']);
        ?>
        <div class="alert alert-success text-center">
            order has been added
        </div>
        <?php
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 px-4 pb-4" id="order">
                <h4 class="text-center text-info p-2">Complete your order!</h4>
                <form action="?" method="post" id="placeOrder">
                    <div class="form-group">
                        <input type="int" name="Card_Number" class="form-control" placeholder="Card Number" required>
                    </div>

                    <div class="form-group">
                        <input type="date" name="Expiry_date" class="form-control" placeholder="Expiry date" required>
                    </div>
                    <div class="form-group">
                        <input type="CVV" name="CVV" class="form-control" placeholder="CVV" required>
                    </div>
                    
                    <div class="form-group">
                        <textarea name="Card_Holder_Name" class="form-control" rows="3" cols="10"
                            placeholder="Enter Card Holder Name..."></textarea>
                    </div>
                    
                    <div class="buttom-center">
                        <button type="submit" name="submit" class="btn btn-success">BUY</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

</body>

</html>
<script>
let form = document.querySelector('form')
form.addEventListener('submit', mypay);
function mypay(event)
{  event.preventDefault();
    let cardnumber = form.cardNumber.value
    let expdate = form.expdate.value
    let cvv = form.cvv.value   
     if(cardnumber=='1234567812345678'&&expdate=='2025-11-11'&&cvv==123)
    {
       alert('an OTP has been sent to your number') 
          window.location.href = "otp.html";
    }
    else{
        alert('Wrong card credentials')
    }
}
</script>
<?php
include('footer.php'); ?>