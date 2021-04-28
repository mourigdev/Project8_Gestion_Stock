<?php
$ProductName = $_POST['productName'];
$productStock = $_POST['productStock'];
$productId = uniqid($ProductName);
$s = 0;
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


    $.ajax({
        url: 'saveTwo.php',
      cache: false,
      data : {'jsonString':JSON.stringify(product)},
      type: 'POST'
    })

    window.location.href = 'dashbord.php';

</script>";


// if (isset($_POST['jsonString'])) {


?>
