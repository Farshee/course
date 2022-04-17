<?php
ob_start();
session_start();
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    <div class="container form-signin">

        <?php
        $msg = '';
        
        if (file_exists('user.json')) {
            $string = file_get_contents("user.json");
            $user = json_decode($string, true);
        }

        if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {

            if ($_POST['username'] == $user['username'] && $_POST['password'] == $user['password']) {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['id'] = '1';
                
                echo 'You have entered valid use name and password';
                header('Refresh: 2; URL = form_submit_table.php');

            } else {
                $msg = 'Wrong username or password';
            }
        }
        ?>
    </div> <!-- /container -->

    <div class="col-4 offset-4 mt-4">
        <h2>Enter Username and Password</h2>
        <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                        ?>" method="post">
            <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
            <input type="text" class="form-control" name="username" placeholder="username = salman" required autofocus></br>
            <input type="password" class="form-control" name="password" placeholder="password = 123456" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
        </form>

        Click here to clean <a href="logout.php" tite="Logout">Session.

    </div>

</body>

</html>