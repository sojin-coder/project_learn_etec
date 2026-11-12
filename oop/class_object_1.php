<?php
     class Person{
       public $name ="Lily";
       public $age = 20;
       public $gender = "Female";


       public function Input($name,$age,$gender){
             $this -> name = $name;
             $this -> age = $age;
             $this -> gender = $gender;
       }
       public function Output(){
        echo $this->name ."<br>";
        echo $this->age ."<br>";
        echo $this->gender ."<br>";
       }

     }
     $obj1 = new Person();
     
     echo $obj1->name ."<br>";
     echo $obj1->age ."<br>";
     echo $obj1->gender ."<br>";
     echo "<hr>";
     echo $obj1 -> Input("Jonh",20,"male");
     echo $obj1 -> Output();

?>