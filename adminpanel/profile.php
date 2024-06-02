<?php
$conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040130");

$query = mysqli_query($conn,"SELECT * FROM admin");

$result = mysqli_fetch_assoc($query);





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin.css?<?= time() ?>">
    <title>Document</title>
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Think Tech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin_page.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content -->

    <div class="container admin-profile">
        <h2 class="text-center">Admin Profile</h2>
        <div class="row gap-2">
            <img class="mt-4 mx-auto mb-4" src="../assets/img/<?= $result["gambar_admin"]; ?>" alt="" style="width: 12rem; height:10rem;">
            <form class="d-flex justify-content-start align-items-center flex-column w-100 gap-2" action="" method="post">
                <label>Full Name :</label>
                <input class="w-50" type="text" value="<?= $result["nama_lengkap"]; ?>">
                <label>Username :</label>
                <input class="w-50" type="text" value="<?= $result["username"]; ?>">
                <label>Email :</label>
                <input class="w-50" type="email" value="<?= $result["email"]; ?>">
                <label>Address :</label>
                <textarea class="w-50" name="alamat" id=""><?= $result["alamat"]; ?></textarea>
                <label>Contact :</label>
                <input class="w-50" type="number" value="<?= $result["no_telpon"]; ?>">
            </form>
        </div>
    </div>






    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>