<?php 

//1. menghubungkan ke databases
$conn = mysqli_connect("localhost","root","","phpdasar");

// if (!$conn) {
//     echo "Gagal connect" . mysqli_connect_error();
// } else {
//     echo "Berhasil Connect";
// }



//2. membuat fungsi untuk menjalankan perintah. sedangkan parameter $query akan menerima string query("SELECT * FROM ultra") dari halaman index.php
function query($query){

    //3. memanggil variabel $conn pake global
    global $conn;

    //4. memanggil query: mysqli_query(koneksi ke database, nama tabel)
    $return = mysqli_query($conn, $query);

    //5. membuat variabel array kosong(wadah kosong)
    $isi = [];

    //6. mengambil setiap baris hasil perintah(query) menggunakan mysqli_fetch_assoc() dan menambahkan ke variabel kososng tadi
    while ($row = mysqli_fetch_assoc($return)) {

        //7. simpan ke variabel array kosong tadi
        $isi[] = $row;
    }

    //8. kemballikan $isi/variabel kosong ke $ultraman di halaman index.php
    return $isi;
}







// membuat fungsi untuk menjalankan perintah tambah
function tambah($data){
    // Menggunakan koneksi database yang sudah ada
    global $conn;

    // Mengambil data dari form dan membersihkan karakter khusus
    $nama = htmlspecialchars($data["nama"]);
    $lahir = htmlspecialchars($data["lahir"]);
    $agama = htmlspecialchars($data["agama"]);
    $host = htmlspecialchars($data["host"]);
    $ultra = htmlspecialchars($data["ultra"]);

    // memberikan function pada $gambar agar file gambar bisa di upload ke database
    $gambar = upload();
    if (!$gambar) {
        return false; // Gagal mengunggah gambar
    }

    // Membuat query SQL untuk menambahkan data ke dalam tabel mahasiswa
    $query = "INSERT INTO ultra (nama, lahir, agama, host, ultra, gambar)
                values ('$nama', '$lahir', '$agama', '$host', '$ultra', '$gambar')";

    // Mengeksekusi query
    mysqli_query($conn, $query);

    // Mengembalikan jumlah baris yang terpengaruh oleh query
    return mysqli_affected_rows($conn);

}


//membuat fungsi untuk $gambar dengan nama upload
function upload(){

    // kita tangkap array pada file gambar menggunakan $_FILES
    $namaFile = $_FILES["gambar"]["name"];
    $ukuran = $_FILES["gambar"]["size"];
    $tmpFile = $_FILES["gambar"]["tmp_name"];
    $error = $_FILES["gambar"]["error"];
    
    // cek apakah tidak ada gambar yang di upload(kita gunakan error, jadi jika error tidak sama dengan 4 maka ada salah satu dari array yang error/tidak terisi)
    if ($error === 4) {
        echo "
            <script>
                alert('Tidak ada gambar yang di upload, Uploud dulu')
            </script>
        ";

    //     // false: berarti nanti ini akan kembalikan ke $gambar = upload(); ,jika false sama saja tidak ada yang di upload jika true berarti ada yang di upload
        return false;
    }


    // cek apakah yang di upload gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile);//explode() berfungsi untuk memecah string menjadi array, misalnya string "farismubarok.png" maka akan menjadi array['farismubarok','png']
    $ekstensiGambar = strtolower(end($ekstensiGambar));//1.strtolower():memaksa/mengubah semua skatensinya jadi huruf kecil   2.end():untuk mengambil array paling akhir 

    // in_array(): untuk mengecek apakah ada sebuah string didalam sebuah array(bagaikan mencari jarum di dalam jerami)
    // in_array() mencari jarum didalam jerami: mencari apakah ekstensi gambar sama dengan salah satu array di dalam $ekstensiGambarValid
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('Yang Lu Upload Apa Anj!!!!')
            </script>
        ";

    //     // false: berarti nanti ini akan kembalikan ke $gambar = upload(); ,jika false sama saja tidak ada yang di upload jika true berarti ada yang di upload
        return false;
    }

    // cek apakah ukurannya terlalu besar
    if ($ukuran > 1000000) {
        echo "
            <script>
                alert('Waduh Filenya kebesaran kak!')
            </script>
        ";

    //     // false: berarti nanti ini akan kembalikan ke $gambar = upload(); ,jika false sama saja tidak ada yang di upload jika true berarti ada yang di upload
        return false;
    }

    // lolos pengecekkan, gambar siap di upload
    // generate nama file baru
    $namaBaru = uniqid();   //uniqid(): menghasilkan id berdasarkan waktu saat ini dan id ini dijadikan nama untuk gambar baru
    $namaBaru .= '.';
    $namaBaru .= $ekstensiGambar;

    // kembalikan $namaFile(jadi nanti ini akan di kirim ke upload();
    return $namaFile;
    
}







// membuat fungsi untuk menjalankan perintah hapus, sedangkan parameter $id digunakan untuk menerima "id" yang dikirimkan daari halaman hapus dan disimpan di $id
function hapus($id){
    // Menggunakan koneksi database yang sudah ada
    global $conn;

    // Membuat query SQL untuk menghapus data di tabel mahasiswa. mysqli_query(koneksi ke database, hapus data dengan id ...)
    mysqli_query($conn, "DELETE FROM ultra WHERE id = $id");

    // Mengembalikan jumlah baris yang terpengaruh oleh query
    return mysqli_affected_rows($conn);

}




function ubah($data){

    //1. ambil koneksi databases yang sudah ada di atas sendiri
    global $conn;

    // Mengambil data baru dari form khusus
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $lahir = htmlspecialchars($data["lahir"]);
    $agama = htmlspecialchars($data["agama"]);
    $host = htmlspecialchars($data["host"]);
    $ultra = htmlspecialchars($data["ultra"]);
    $gambar = htmlspecialchars($data["gambar"]);

    // Membuat query SQL untuk menambahkan data ke dalam tabel mahasiswa
    $query = "UPDATE ultra SET 
                nama = '$nama',
                lahir = '$lahir',
                agama = '$agama',
                host = '$host',
                ultra = '$ultra',
                gambar = '$gambar'
                WHERE id = '$id'
                ";

    // Mengeksekusi query
    mysqli_query($conn,$query);

    // Mengembalikan jumlah baris yang terpengaruh oleh query
    return "mysqli_affected_rows($data)";
}


// membuat fungsi keyword: kita tangkap $_POST["keyword"] menggunakan $keyword
function coba($keyword){
    // memindai hasil pencarian, masuk ke tabel database/$query: misalnya,cari mahasiswa dengan inputan yang sama seperti yang di inputkan user
    $query = "SELECT * FROM ultra 
                WHERE 
                -- LIKE: agar memudahkan user jika ingin memasukkan nama yang tidak lengkap, misal didata namanya faris mubarok dan user mengetik faris saja, maka secara otomatis sistem akan mengambil data yang ada kata farisnya. namun sebelum dan sesudah mengetikkan parameternya haris diberi %
                nama LIKE '%$keyword%'OR
                lahir LIKE '%$keyword%'OR
                agama LIKE '%$keyword%'OR
                host LIKE '%$keyword%'OR
                ultra LIKE '%$keyword%'OR
                agama LIKE '%$keyword%'
                ";

    // kembalikan $query
    return query($query);
}



?>










