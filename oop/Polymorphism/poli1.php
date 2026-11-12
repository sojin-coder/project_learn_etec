<?php

class Animal {
    public function sound() {
        echo "Animal make sound <br>";
    }
}

class Dog extends Animal {
    public function sound() {
        echo "Woh Woh <br>";
    }
}

class Cat extends Animal {
    public function sound() {
        echo "Moew Woh <br>";
    }
}

$dog = new Dog();
$dog->sound();

$cat = new Cat();
$cat->sound();

?>