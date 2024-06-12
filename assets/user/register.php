<?php

require '../../inc/function.php';

if (isset($_POST["submit"])) {

    if (register($_POST) > 0) {
        echo "
        <script>
            alert('User Berhasil Dibuat');
            document.location.href = 'login.php'
        </script>
";
    } else {
        echo mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="register-form w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center">Register</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="firstName" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Enter last name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" name="password2" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                        <a class="btn btn-primary btn-block" href="login.php">Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>