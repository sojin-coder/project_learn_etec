<?php
//    $name = "hello String Function ";
//    $text = "Hello";
//    // use strlen() for count text
//    echo strlen($name) . "<br>";

//    //  strtoupper() បម្លែងជាអក្សរធំ
//    echo strtoupper($name) . "<br>";
//    // trim() លុប Space ខាងមុខ និងខាងក្រោយ
//    echo trim($name);
//    echo "<br>";
//    echo "<br>";
//    //ucfirst() - អក្សរដំបូងធំ
//    echo ucfirst($name);
//    echo "<br>";
//    //. ucwords() - អក្សរដំបូងនៃពាក្យនីមួយៗធំ
//    echo ucwords($name);
//    echo "<br>";
//    //strrev() - បញ្ច្រាសអក្សរ
//    echo strrev($text);
//    echo "<br>";
//    //strpos() - ស្វែងរកទីតាំងអក្សរ
//    echo strpos($name, "Function");
//    echo "<br>";
//    //  str_replace chang word
//    echo str_replace("hello", "hi", $name);

//    echo "<br>";
//   // count() រាប់ចំនួន Elements ទាំងអស់
//    $arr= [10,20,30,40,50];
//    $count = count($arr);
//    echo $count;
//    echo "<br>";
//    // strtolower() - បម្លែងជាអក្សរតូច
//    echo strtolower($name); 
//    echo "<br>";
   
//    $sala = "etec center";
//    $substr = substr($sala, 4, 5);
   
//    echo $substr;
   
//    echo "<br>"; 
//    $posi= "Web developer";
//    $at_posi = trim($posi);
//    $result = ($at_posi === " Web developer")? "True":"Falsa";  
//    echo $result ;                                                                      
//    echo "<br>"; 
//    $email = "raksa@gmail.com";
   
//    $resul = explode("@", $email);
   
//    echo "Username: " . $resul[0] . "<br>";
//    echo "Domain: " . $resul[1];
   
//    echo "<br>"; 
//    $texts = "PHP LARVEL JAVA SPRING";
//    $ar = explode(' ',$texts);
//    print_r($ar);
//    echo "<br>";
//    foreach ($ar as $i => $v){
//       echo "$i  $v";
 //       echo "<br>";                                                                         

//       $text = "PHP";
//       $arr = str_split($text);
//        print_r($arr);
//        echo $arr[0];


$code = "<script>alert(12345)</script>";
$result = htmlspecialchars($code);

echo $result;
      










   

?>;