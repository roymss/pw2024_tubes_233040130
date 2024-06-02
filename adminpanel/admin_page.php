<?php

require '../inc/function.php';

include('add.php');

$produk = query("SELECT * FROM product");

if (isset($_POST["cari"])) {
    $produk = cari($_POST["keyword"]);
}

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
    <title>Admin Panel</title>
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
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
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

    <!-- Tambah Data -->

    <div class="container border border-1 tambah">

        <h2 class="text-center mt-3">ADD A NEW PRODUCT</h2>

        <div class="row mt-4 p-2">
            <form class="d-flex justify-content-center align-items-center flex-column gap-2" action="" method="post">
                <div class="col-12">
                    <input type="text" name="nama_produk" placeholder="enter the product name" required>
                </div>
                <div class="col-12">
                    <input type="text" name="harga_produk" placeholder="enter the product price" required>
                </div>
                <div class="col-12">
                    <input type="file" name="gambar_produk" required>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-success mb-3 w-100">Add Product</button>
            </form>
        </div>

    </div>

    <!-- Search -->

    <div class="container mt-4 p-0">
        <form class="d-flex" role="search" method="post">
            <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
        </form>
    </div>

    <!-- Table Data -->

    <div class="container mt-4 border border-1">
        <table class="w-100" cellpadding="11" cellspacing="0">

            <tr class="text-center">
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Action</th>
            </tr>

            <?php foreach ($produk as $row) : ?>
                <tr class="text-center">
                    <td><img src="../assets/img/<?= $row["gambar_produk"] ?>" alt="" width="80px" height="80px"></td>
                    <td><?= $row["nama_produk"] ?></td>
                    <td>Rp.<?= $row["harga_produk"] ?></td>
                    <td>
                        <a class="btn btn-success" href="update.php?id=<?= $row["id"]; ?>">Update</a>
                        <a class="btn btn-danger" href="delete.php?id=<?= $row["id"]; ?>">Delete</a>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>

    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>