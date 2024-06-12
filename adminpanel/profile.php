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
        <div class="container">
            <a class="navbar-brand" href="#">Think Tech</a>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Admin
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="admin_page.php">Home</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
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
                <input class="w-50 form-control" type="text" value="<?= $result["nama_lengkap"]; ?>">
                <label>Username :</label>
                <input class="w-50 form-control" type="text" value="<?= $result["username"]; ?>">
                <label>Email :</label>
                <input class="w-50 form-control" type="email" value="<?= $result["email"]; ?>">
                <label>Address :</label>
                <textarea class="w-50 form-control" name="alamat" id=""><?= $result["alamat"]; ?></textarea>
                <label>Contact :</label>
                <input class="w-50 form-control" type="text" value="<?= $result["no_telpon"]; ?>">
            </form>
        </div>
    </div>






    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>