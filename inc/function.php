<?php

$conn = mysqli_connect("localhost", "root", "", "pw2024_tubes_233040130");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;
    $gambar = htmlspecialchars($data["gambar_produk"]);
    $nama = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga_produk"]);

    $query = "INSERT INTO product
                VALUES
                ('0', '$gambar', '$nama', '$harga')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM product WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $gambar = htmlspecialchars($data["gambar_produk"]);
    $nama = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga_produk"]);

    $query = "UPDATE product SET
                gambar_produk ='$gambar',
                nama_produk = '$nama',
                harga_produk = '$harga'
              WHERE id = $id  
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword){
    $query = "SELECT * FROM product
                WHERE
              nama_produk LIKE '%$keyword%'
            ";
    return query($query);
}
