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


function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $npsn = htmlspecialchars($data["npsn"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO mahasiswa (nama, npsn, email, jurusan, gambar)
            VALUES ('$nama', '$npsn', '$email', '$jurusan', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function ubah($data){
    global $conn;

    $id =  $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $npsn = htmlspecialchars($data["npsn"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);
    
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


function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE
                nama LIKE '%$keyword%' OR
                npsn LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' 
                ";

    return query($query);
}










// function tambah($data){
    
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


// }

?>