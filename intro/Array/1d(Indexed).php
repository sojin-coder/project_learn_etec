<?php 
    
   
    echo "Indexed Array<br>";
    // syntax for creating an indexed array in PHP
    // $arrayName = [value1, value2, value3];
    $fruits = ["Apple", "Banana", "Mango", "Orange"];
    echo $fruits[0] . "<br>"; // Output: Apple
    echo $fruits[1] . "<br>"; // Output: Banana
    echo $fruits[2] . "<br>"; // Output: Mango
    echo $fruits[3] . "<br>"; // Output: Orange

    echo "<hr>"."<br>";
    echo "Changing the value of an element in an indexed array<br>";
    $fruits[0] = "Mango";

     print_r($fruits);
    echo "<hr>"."<br>";
    echo "Adding a new element to an indexed array<br>";
    $fruits[] = "Orange";
    echo "<hr>"."<br>";
    echo "Adding multiple elements to an indexed array<br>";
    array_push($fruits, "Orange", "Mango");

    print_r($fruits);

     print_r($fruits);
    echo "<hr>"."<br>";
    echo "Counting the number of elements in an indexed array<br>";
    echo count($fruits);
    echo "<hr>"."<br>";
    echo "Looping array with for loop<br>";
    for($i = 0; $i < count($fruits); $i++){
    echo $fruits[$i] . "<br>";
    }
          
     echo "<hr>"."<br>";
     echo "Looping array with foreach loop<br>";
    foreach($fruits as $fruit){
     echo $fruit . "<br>";
    }
     echo "<hr>"."<br>";
     echo "Looping array with foreach loop with index<br>";
    foreach($fruits as $index => $fruit){
    echo "Index : $index = $fruit <br>";
    }
     echo "<hr>"."<br>";
     echo "example of an indexed array with numbers<br>";

     $score = [90, 85, 100, 70, 95];

    foreach($score as $s){
        echo $s . "<br>";
    }
    echo "<hr>"."<br>";
    echo "example of an indexed array with strings<br>";
     $students = [
    "Raksa",
    "Dara",
    "Sokha",
    "Lina"
     ];

    for($i = 0; $i < count($students); $i++){
        echo $students[$i] . "<br>";
    }
     echo "<hr>"."<br>";
     echo "<hr>"."<br>";
?>