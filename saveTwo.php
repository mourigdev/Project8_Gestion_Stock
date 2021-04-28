
<?php
if (file_get_contents('products.json')!="") {
    $product = @json_decode($_POST['jsonString']);
    $savedProduct = file_get_contents('products.json');
    $savedProduct = json_decode($savedProduct);
    array_push($savedProduct,$product);
    $savedProduct = json_encode($savedProduct);
    file_put_contents('products.json',$savedProduct);
    // header('location:dashbord.php');
    
};

        if (file_get_contents('products.json')=="") {

            // $product = json_decode($_POST['jsonString']);
            $product = @[json_decode($_POST['jsonString'])];
            $product = json_encode($product);
            file_put_contents('products.json',$product);
            // header('location:dashbord.php');
            // exit;
    
        };
// }




?>