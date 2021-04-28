<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form action="save.php" method="post">
    <label>Enter Name Of Product</label>
    <input type="text" name="productName" id="productName">
    <label>Enter Stock contity Of this Product</label>
    <input type="number" name="productStock" id="productStock" min="0">
    <input type="submit" value="Save" name="saveProduct">
    </form>
</body>
</html>

<?php

if (file_get_contents('products.json')!="") {
    
$showStock = file_get_contents('products.json');
$showStock = json_decode($showStock);

echo "<input type='search' name='' id='search' placeholder='Search'>".

"<table>";

        echo "<tr>
        <th>Product Name</th>
        <th>Statut Stock</th>
        <th>Number of Stock</th>
        </tr>";

foreach ($showStock as $value) {
    if ($value -> Stock > 0) {

        echo "<tr>
        <td class='nameProduit'>".$value -> name."</td>
        <td>In Our Stock</td>
        <td>".$value -> Stock."
        </tr>";
    }else {
        echo "<tr>
        <td class='nameProduit'>".$value -> name."</td>
        <td class='out'>Out Of Stock</td>
        <td>".$value -> Stock."
        </tr>";
    }
    
}

echo "</table>";

echo "<script>document.getElementById('search').addEventListener('input', () => {

    var getSearch = document.getElementById('search').value;
    var AllProduitNames = document.querySelectorAll('.nameProduit');

    AllProduitNames.forEach(element=>{

        var elementTextLower = element.textContent.toLowerCase()
        getSearch = getSearch.toLowerCase()

        if (elementTextLower.includes(getSearch)==false) {
            var closest = element.closest('tr')
            closest.style='display:none'
            
        }else{
            var closest = element.closest('tr');
            closest.style='display: table-row'
        }
    })

})</script>";

}


?>
