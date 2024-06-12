<?php

require '../inc/function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM product
                WHERE
              nama_produk LIKE '%$keyword%'
            ";

$produk = query($query);


?>

<?php foreach ( $produk as $row ) : ?>

<div class="col-lg-2 col-md-2 col-sm-4 col-6 mt-2">
    <div class="card text-center">
        <img src="assets/img/<?= $row["gambar_produk"]; ?>" class="card-img-top object-fit-cover" width="200px" height="200px" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $row["nama_produk"]; ?></h5>
            <p class="card-text">Rp.<?= $row["harga_produk"]; ?></p>
            <a href="#" class="btn btn-dark d-grid">beli</a>
        </div>
    </div>
</div>

<?php endforeach; ?>