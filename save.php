<?php
$ProductName = $_POST['productName'];
$productStock = $_POST['productStock'];
$productId = uniqid($ProductName);

echo "
<script src='https://code.jquery.com/jquery-3.6.0.js' integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=' crossorigin='anonymous'></script>
<script>
var product = {
    'name' : '".$ProductName."',
    'Stock' : '".$productStock."',
    'TimeAdded' : '".date('Y-m-d h:i:sa')."',
    'id' : '".$productId."'
}

console.log(product)


   var jsonString = JSON.stringify(product);

    $.ajax({
        url: 'save.php',
      cache: false,
      data : {'jsonString':jsonString},
      type: 'POST'
    })


</script>


    ";

if (isset($_POST['jsonString'])) {

 

    if (file_get_contents('products.json')=="") {
        // $product = json_decode($_POST['jsonString']);
        $product = [json_decode($_POST['jsonString'])];
        $product = json_encode($product);
        file_put_contents('products.json',$product);
        exit;
    }


        $product = json_decode($_POST['jsonString']);
        $savedProduct = file_get_contents('products.json');
        $savedProduct = json_decode($savedProduct);
        array_push($savedProduct,$product);
        $savedProduct = json_encode($savedProduct);

        file_put_contents('products.json',$savedProduct);

    
}

// header('location:dashbord.php');

?>
