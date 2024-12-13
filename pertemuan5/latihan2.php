<?php 

// Pengulangan pada array
    // for / foreach
$angka = [2,5,4,8,12,56,72,27]


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .kotak{
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }

        .clear{
            clear: both;
        }
    </style>

</head>
<body>

    <?php for ($i=0; $i < count($angka); $i++) :?>
    <div class="kotak"><?= "$angka[$i]"?></div>
    <?php endfor;?>

    <div class="clear"></div>

    <?php foreach($angka as $a){?>
        <div class="kotak"><?= "$a"?></div>
    <?php }?>

    <div class="clear"></div>

    <!-- Lebih Disarankan -->
    <?php foreach($angka as $a):?>
        <div class="kotak"><?= "$a"?></div>
    <?php endforeach;?>

    



</body>
</html>










<?php 
$array = ["deri","dava","rafif"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php foreach($array as $a):?>
    <h1><?= $a ?></h1>
<?php endforeach;?>
    
</body>
</html>