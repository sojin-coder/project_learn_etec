<?php 


echo "---------------ex1-------------------<br>";
$n1 =1;
switch($n1){
    case 1:echo "Input <br>";break;
    case 2:echo " Output <br>";break;
    case 3:echo " Delect <br>";break;
    case 4:echo "search <br>";break;
    case 5:echo "Sort<br>";break;
    case 6:echo "Add<br>";break;
    case 7:echo "Update <br>";break;
    default :echo "Salary:" .$salary ."<br>";
   
}

echo "---------------ex2-------------------<br>";
 $position = "sale";
 $salary = 1000;
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
                     echo "Position: ".$positio;
                     break;
                case "sale":
                     echo "Salary:" .$salary *1.6 ."<br>";
                     echo "Position: ".$position;
                     break;
                default :
                echo "Salary:" .$salary ."<br>";
                                

                        }

?>