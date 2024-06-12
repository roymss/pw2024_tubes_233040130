<?php
session_start();

if(isset($_SESSION["login"])){
    header("Location: ../../adminpanel/admin_page.php");
    exit;
}

require '../../inc/function.php';

if(isset($_POST["login"])){

    $email = $_POST["email"];
    $pass = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    //cek username
    if(mysqli_num_rows($result) === 1){

        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row["password"])){
            //set session

            $_SESSION["login"] = true;

            header("Location: ../../adminpanel/admin_page.php");
            exit;

        }

    }

    $error = true;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <div class="login-form w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h3 class="text-center">Login</h3>
                    <?php if(isset($error)) : ?>
                        <p style="color: red; font-style:italic; margin-top: 10px;">Username / Password Salah</p>
                    <?php endif; ?>
                    <form action="" method="post"> 
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                        <a class="btn btn-primary btn-block" href="register.php">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>