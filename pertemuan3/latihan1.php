<?php 

// Pengulangan 
// for
for ($i = 0; $i < 5; $i ++) { 
    echo "Hello World! <br>";
}
echo "<br>";

// while
$o = 0 ;
while ( $o < 5 ) {
    echo "Hello Gaes! <br>";
    $o++;
}
echo "<br>";

// do..while
$a = 0 ;
do {
    echo "Hello kawan! <br>";
    $a++;
} while ($a < 5);
echo "<br>";
// foreach (khusus array)

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .wb{
            background-color: silver;
        }
        .wp{
            background: red;
        }
    </style>

</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>1,1</td>
            <td>1,2</td>
            <td>1,3</td>
            <td>1,4</td>
            <td>1,5</td>
        </tr>
        <tr>
            <td>2,1</td>
            <td>2,2</td>
            <td>2,3</td>
            <td>2,4</td>
            <td>2,5</td>
        </tr>
        <tr>
            <td>3,1</td>
            <td>3,2</td>
            <td>3,3</td>
            <td>3,4</td>
            <td>3,5</td>
        </tr>
    </table>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <?php 
            for ($i = 1; $i <= 3; $i++) { 
                echo "<tr>";
                    for ($a = 1; $a <= 5; $a++) {
                        echo "<td>$i,$a</td>";
                    }
                echo "</tr>";
            }
        ?>
    </table>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <?php for ($i = 1; $i <= 5 ; $i++) :?>
            <?php if ($i % 2 == 1) : ?>
                <tr class="wb">
            <?php else : ?>
                <tr>
            <?php endif;?>
                <?php for ($a = 1; $a <= 5; $a++):?>
                    <?php if ($a % 2 == 1):?>
                        <td class="wp"> <?= "$i,$a"; ?>
                    <?php else :?>
                        <td><?= "$i,$a"; ?>
                    <?php endif;?>
                        </td>
                <?php endfor;?>
            </tr>
        <?php endfor;?>
    </table>
    <br>


</body>
</html>