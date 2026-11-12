   <!-- <?php
   
        function returrn_non_paramet(){
            $hour = 240;
            $rate = 10;
            $total = $hour * $rate;

            return $total;
        }
        $result = returrn_non_paramet();
        echo "Total : " .number_format($result, 2);
   
   ?> -->


<?php
   $e_id = 101;
   $e_name = "John Doe";
   $e_gender = "Male";  
   $e_salary = 5000;
   $e_position = "Web Developer";


   
   function return_has_paramet($e_id, $e_name, $e_gender, $e_salary, $e_position){   

      $employee = [
          "id" => $e_id,
          "name" => $e_name,
          "gender" => $e_gender,
          "salary" => $e_salary,
          "position" => $e_position
          ];
          return $employee;
          }
          $result = return_has_paramet($e_id, $e_name, $e_gender, $e_salary, $e_position);

          

  
?>

        <body>
            <?php foreach($result as $key => $value): ?>
                <ul>
                    <p><?php echo $key . " : " . $value; ?></p>
                </ul>
            <?php endforeach; ?>
        </body>