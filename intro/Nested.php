

<?php 
 
 $bolance = 1000;
 $username = "test";
 $email = "test@gmail.com";
 $pwd = "12121212";
 $withdraw = 900;
 
 if ($email =="test@gmail.com")
    {
        if($pwd = "12121212"){
          
            echo  "Login success !!";
            echo "<table style='border='1' cellpadding='10' cellspacing='0''>";
            echo "<tr>";
            echo "<th>User Name</th>";
            echo "<th>Email</th>";
            echo "<th>Bolance</th>";
            echo "<th>Withdraw</th>";
            echo "<th>After Withdraw</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>$username</td>";
            echo "<td>$email</td>";
            echo "<td>$bolance</td>";
            echo "<td>$withdraw</td>";
    
           
            

            if($bolance >= $withdraw){
                // echo "After withdraw:".$bolance - $withdraw."$" ;
                 echo "<td>$bolance - $withdraw $</td>";
                  echo "</tr>";
           

            echo "</table>";
            }else{
                echo "<p style= 'color:red;'>Balance not enough!</p>";
            }
        }else {
            echo "pwd not match";
        }
    }else{
        echo "email not fuond";
    }
 
?>