<?php 
$mul = 5;
echo "====For loop ===<br>";
for($i =0 ;$i<=10; $i++){
    
    $res = $mul * $i;
    echo "$mul X $i = $res <br>";
    } 
    
    echo "====while loop ===<br>";
    $i = 1;
    while ($i<=10){
    $res = $mul * $i;
    echo "$mul X $i = $res <br>";
    $i++;
    }
    
    echo "====do...while loop ===<br>";
    $i = 1;
    
    do {
        echo $i;
        $i++;
        } while ($i < 6);
        echo "<br>==== for loop with Array ===<br>";
        $arr = ["jonh",20,"male","jonh@gmail.com","12345678"];
        for($i=0; $i<count($arr);$i++){
            echo $arr[$i] . "<br>";
            }
            
        echo "<hr>";   
        echo "====foreach  ===<br>";
        
        foreach($arr as $value){
         echo "$value <br>";
        }
            
        echo "<hr>";   
        foreach ($arr as $index => $value){  // key as បំបែកvalue 
        echo "$index , $value <br>";
        }
        
        echo "<hr>";  
        
        

// // --------- js-------------
//         // array 1d 
//         let arrName = [value1, value2,value3];
//         // array 2d
//         const arrName = [
//              [value1,value2],
//              [value1,value2],
//              [value1,value2]
//         ];
//         // object
//         let arrName = {
//           key1 :value1,
//           key2:value2
//         };
//         // array of obj
        // const arrName = [  //ចាប់index បន្ទាប់access key,value
//             {key1 :value1},
//             {key2 :value2}
            
//         ]
// --------php-------
// array 1d
// $arrName = [value1, value2,value3];
// array 2d
// $arrName = [value1,value2],[value1,value2],[value1,value2];
// object
//$arrName = [
//   "key1" => value1,  
//   "key2" => value2
// ];
// array of obj
//$arrName = [
//   ["key1" => value1],
//   ["key2" => value2]
//];




?>