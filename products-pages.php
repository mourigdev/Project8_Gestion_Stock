<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Look To Our Stock</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php

if (file_get_contents('products.json')!="") {
    
$showStock = file_get_contents('products.json');
$showStock = json_decode($showStock);

echo "<table>";

        echo "<tr>
        <th>Product Name</th>
        <th>Statut Stock</th>
        </tr>";

foreach ($showStock as $value) {
    if ($value -> Stock != 0) {



        echo "<tr>
        <td>".$value -> name."</td>
        <td>In Our Stock</td>
        </tr>";
    }else {
        echo "<tr>
        <td>".$value -> name."</td>
        <td class='out'>Out Of Stock</td>
        </tr>";
    }
    
}

echo "</table>";

}


?>

</body>
</html>