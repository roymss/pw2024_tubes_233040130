<?php 

if(isset($_POST["cari"])){
    $produk = cari($_POST["keyword"]);
}

?>

<div class="container">
    <form class="search-box" action="" method="POST">
        <input type="text" name="keyword" placeholder="Type to search..." autocomplete="off">
        <button type="submit" name="cari">Search</button>
    </form>
</div>