<?php 

    function salam($admin) {

        date_default_timezone_set('Asia/Jakarta');

        $waktu = time();
        // echo "$waktu";
        $ini = (int) date('H', $waktu);
        // echo "$ini";

        if ($ini >= 5 && $ini < 12) {
            $wayah = "Pagi";
        } else if ($ini >= 12 && $ini < 15) {
            $wayah = "Siang";
        } else if ($ini >= 15 && $ini < 18) {
            $wayah = "Sore";
        } else if ($ini >= 18 && $ini < 21) {
            $wayah = "Malam";
        } else if ($ini >= 21 && $ini < 24) {
            $wayah = "Larut Malam";
        }else{
            $wayah = "Subuh";
        }
        

        return "$wayah $admin";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan function</title>
</head>
<body>

    <h1>Selamat <?= salam("Budi"); ?></h1>

</body>
</html>