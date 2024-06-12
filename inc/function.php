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
    $nama = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga_produk"]);

    // Upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO product
                VALUES
                ('0', '$gambar', '$nama', '$harga')
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{

    $namaFile = $_FILES['gambar_produk']['name'];
    $ukuranFile = $_FILES['gambar_produk']['size'];
    $tmpName = $_FILES['gambar_produk']['tmp_name'];
    $error = $_FILES['gambar_produk']['error'];

    // Cek Error

    if ($error === 4){
        echo "
        <script>
            alert('Silahkan pilih gambar terlebih dahulu!')
        </script>";
        return false;
    }

    // Cek apakah diupload adalah gambar

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "
        <script>
            alert('yang anda upload bukan gambar!')
        </script>";
        return false;
    }

    // Cek jika ukurannya terlalu besar

    if($ukuranFile > 1000000){
        echo "
        <script>
            alert('ukuran gambar terlalu besar!')
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload

    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);
    

    return $namaFileBaru;
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
    $nama = htmlspecialchars($data["nama_produk"]);
    $harga = htmlspecialchars($data["harga_produk"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Cek apakah user pilih gambar baru atau tidak
    if ( $_FILES['gambar_produk']['error']  === 4 ){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE product SET
                gambar_produk ='$gambar',
                nama_produk = '$nama',
                harga_produk = '$harga'
              WHERE id = $id  
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM product
                WHERE
              nama_produk LIKE '%$keyword%'
            ";
    return query($query);
}



function register($data){

    global $conn;

    $firstName = $data["first_name"];
    $lastName = $data["last_name"];
    $email = $data["email"];
    $pass = mysqli_real_escape_string($conn, $data["password"]);
    $pass2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek konfirmasi pass

    if($pass !== $pass2){
        echo "<script>alert('Konfirmasi Password Tidak Sesuai!')</script>";
        return false;
    }

    // enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('0', '$firstName', '$lastName', '$email', '$pass')");

    return mysqli_affected_rows($conn);

}
