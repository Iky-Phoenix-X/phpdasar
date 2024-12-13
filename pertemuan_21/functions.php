<?php 
// koneksi ke databases
$conn = mysqli_connect("localhost","root","","phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// ================================================= Tambah ====================================================

function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $npsn = htmlspecialchars($data["npsn"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    // uploud gambar
    $gambar = upload();
    if (!$gambar) {
        return false; // Gagal mengunggah gambar
    }

    // $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO mahasiswa (nama, npsn, email, jurusan, gambar)
            VALUES ('$nama', '$npsn', '$email', '$jurusan', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


// ================================================= Upload ====================================================

function upload(){
    
    $namaFile = $_FILES["gambar"]["name"]; //["gambar"] dapat dari file tambah name="gambar"
    $ukuranFile =  $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yng di upload
    if ($error === 4) {
        echo "
            <script>
                alert('Tidak ada gambar yang di upload, Uploud dulu')
            </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar)); //1.strtolower():memaksa/mengubah semua skatensinya jadi huruf kecil   2.end():untuk mengambil array paling akhir 
    // in_array(): untuk mengecek apakah ada sebuah string didalam sebuah array(bagaikan mencari jarum di dalam jerami)
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "
            <script>
                alert('Yang Anda Uploud bukan gambar, pakai kacamata biar jelas')
            </script>
        ";
        return false;
    }

    // cek apakah ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
            <script>
                alert('ukuran terlalu besar kak, yang kecil ada gak')
            </script>
        ";
        return false;
    }

    // lolos pengecekkan, gambar siap di upload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'saga/'.$namaFileBaru);

    // kembalikan $namaFile(jadi nanti ini akan di kirim ke upload();)
    return $namaFileBaru;
}


// ================================================= Delete ====================================================

function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}


// ================================================= Ubah Data ====================================================

function ubah($data){
    global $conn;

    $id =  $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $npsn = htmlspecialchars($data["npsn"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user milih gambar baru / tidak
    if ($_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    }else {
        $gambar = upload();
        
    }
    
    $query = "UPDATE mahasiswa SET 
                nama='$nama', 
                npsn='$npsn', 
                email='$email', 
                jurusan='$jurusan', 
                gambar='$gambar'
                    WHERE id = $id
                ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


// ================================================= Keyword ====================================================

function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE
                nama LIKE '%$keyword%' OR
                npsn LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
                ";

    return query($query);
}




// ================================================= Registrasi ====================================================
function registrasi($data) {
    global $conn;

    // Ambil data dari $data (array assosiatif)
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek Username sudah ada apa belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('User Name Sudah Ada');
              </script>";

              return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan username ke database (tanpa kolom id, karena AUTO_INCREMENT)
    $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}



?>




<!-- // function tambah($data){
    
    //     global $conn;
    
    //      // ambil data dari tiap elemen dalam form
    //      $npsn = $data["npsn"];
    //      $nama = $data["nama"];
    //      $email = $data["email"];
    //      $jurusan = $data["jurusan"];
    //      $gambar = $data["gambar"];
    
    //      // koneksi / query insert data
    //     $query = "INSERT INTO mahasiswa
    //     VALUES
    //     ('', '$npsn' , '$nama', '$email', '$jurusan', '$gambar')";
    
    //     mysqli_query($conn,$query);
    
    
    // } -->