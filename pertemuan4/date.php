<?php 

// ==================================================================================================================================
    // Date untuk menampilkan tanggal dengan format tertentu
   echo date("l,d,M,Y ");
   echo "<br>";

    // Time
        // UNIX Timestap / EPOCH time
        // detik yang sudah berlaku sejak (1 januari 1970)
    echo time();
    echo "<br>";

    echo date("l", time()+60*60*24*100);//100 hari ke belakang
    echo "<br>";

    // mktime
    //membuat sendiri detik
    //mktime(0,0,0,0,0,0);
    // jam, menit, detik, bulan, tanggal, tahun
    echo date("l", mktime(0,0,0,01,13,2014));
    echo "<br>";

    //strtotime
    echo date("l", strtotime("21 januari 2008"));

// ====================================================String========================================================================
    // strlen()
    // strcmp()
    // explode()
    // htmlspecialchars()

// ====================================================Utility=======================================================================
    // var_damn()
    // isset()
    // empty()
    // die()
    // sleep()

// ==================================================================================================================================

     

?>