<?php

require 'inc/function.php';

$produk = query("SELECT * FROM product");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/index.css?<?= time() ?>">
</head>

<body>

    <!-- Navbar -->

    <?php include('assets/partikels/header.php') ?>

    <!-- Carousel -->

    <?php include('assets/partikels/carousel.php') ?>

    <!-- Search -->

    <?php include('assets/partikels/search.php') ?>

    <!-- Card -->

    <?php include('assets/partikels/card.php') ?>

    <!-- Category -->

    <?php include('assets/partikels/category.php') ?>

    <!-- Contact -->

    <?php include('assets/partikels/contact.php') ?>

    <!-- Footer -->

    <?php include('assets/partikels/footer.php') ?>

    <!-- Modal -->

    






    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>