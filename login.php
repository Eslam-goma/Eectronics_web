<?php
include('config.php');
if (isset($_POST['email'])) {
    if ($_POST['email'] == 'name@qqq.com' && md5($_POST['password']) == md5('12345678')) {
        $_SESSION['user_id'] = '1';
    }
}
if (isset($_SESSION['user_id'])) {
    header("Location: admin.php");
}
?>
<main class="form-signin w-100 m-auto">
    <form method="post" action="login.php">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    </form>

    <?php
    include('footer.php');
    ?>