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