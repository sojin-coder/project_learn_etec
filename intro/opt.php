<?php
  $n1 = 10;
  $n2 = 20;

  if ($n1 > $n2 && $n2<$n1){
    echo "True";
  }else {
    echo "False";
  }
  echo "<hr>";
  if ($n1 > $n2 || $n2<$n1){
      echo "True";
      }else {
          echo "False";
          }
          echo "<hr>";
          if (($n1 == $n2) || !($n1 != $n2)){
              echo "True";
              }else {
                  echo "False";
                  }
                  
                  echo "<hr>";
                  
                  $position = "sale";
                  $salary = 1000;
                  if ($position == "Manager"){
                    echo "Salary:" .$salary *1.5 ."<br>";
                    echo "Position: ".$position;
                    }
                    else if ($position == "app"){
                    echo "Salary:" .$salary *1.5 ."<br>";
                    }
                  else if ($position == "web"){
                    echo "Salary:" .$salary *1.4  ."<br>";
                    }else {
                        echo "Salary : ".$salary;
                        }


                        
                        
                        echo "<hr>";

                        $age = 20;
                        $total = ($age>=18)?" age not" : " age yes";
                        echo $total;
                        echo "<hr>";

                        $total = $age ?? "flase";
                        echo $total;
                        echo "<hr>";

                         
                        $n3 = 50;
                        $resutl = ($n3 >=10)?"false":"true";
                        echo $resutl;

                        echo "<hr>";
                        echo "----------switch---------  <br>";


                        switch($position){
                            case "Manager" :
                                  echo "Salary:" .$salary *1.5 ."<br>";
                                  echo "Position: ".$position;
                                  break;
                            case "App":
                                 echo "Salary:" .$salary *1.4 ."<br>";
                                 echo "Position: ".$position;
                                 break;
                            case "web":
                                 echo "Salary:" .$salary *1.3 ."<br>";
                                 echo "Position: ".$position;

                                 break;
                            case "sale":
                                 echo "Salary:" .$salary *1.6 ."<br>";
                                 echo "Position: ".$position;

                                 break;
                            default :
                            echo "Salary:" .$salary ."<br>";
                                

                        }
                        ?>