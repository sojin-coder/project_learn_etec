<?php

      echo "<h1 style='color:blue;text-align:center'>This is a function example </h1><br>";
      echo "<p style='color:blue;'>Function Return </p><br>";
      function Addnumber($n1 ,$n2){
            $total = $n1 + $n2;
            return $total;
            
            }
            $result = Addnumber(10,20);
            echo "Total :" .$result;
            
            // if say type of function that function have 
            // 2 : user-defined functions and Buit-in functions. User-defined functions 
            
            echo "<p style='color:blue;'>Function​ None Return </p><br>";
            
            function Show($n1 ,$n2){
                  $total = $n1 + $n2;
                  echo "Total :" .number_format($total, 2);
                  
                  
                  }
                  Show(10,20);
                  
                  echo "<p style='color:blue;'>Function​ None Return has patamate </p><br>";









   

?>

<?php

$products = [
    [
        'id' => 101,
        'title' => 'product 1',
        'price' => 1200.22,
        'qty' => 20,
        'image' => 'https://i.pinimg.com/736x/a0/b8/b2/a0b8b2790378aa618e0928be92bc1959.jpg'
    ],
    [
        'id' => 102,
        'title' => 'product 2',
        'price' => 1330.22,
        'qty' => 55,
        'image' => 'https://i.pinimg.com/736x/d6/c7/aa/d6c7aad6dd6f89753d948f486f5b31b9.jpg'
    ]
];

function non_return_has_param($products){
    if(isset($products)){
        foreach($products as $product){
            echo "Id : " . $product['id'] . "<br>";
            echo "Title : " . $product['title'] . "<br>";
            echo "Price : " . number_format($product['price'], 2) . "<br>";
            echo "Qty : " . number_format($product['qty'], 2) . "<br>";
            echo "Total : " . number_format($product['price'] * $product['qty'], 2) . "<br>";
            echo "<img src='" . $product['image'] . "' width='200'> <br>";
            echo "<hr>";
        }
    } else {
        echo "Product Not Found";
    }
}

// Call the function and pass the array
non_return_has_param($products);

?>