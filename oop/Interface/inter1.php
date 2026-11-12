<?php

interface Payment{

    public function pay($amount);

    public function message();

}

class ABA implements Payment{

    public function message(){
        echo "Pay With ABA Successfully <br>";
    }

    public function pay($amount){
        echo "Amount : $$amount <br>";
    }

}

class AC implements Payment{

    public function message(){
        echo "Pay With AC Successfully <br>";
        
    }

    public function pay($amount){
        echo "Amount : $$amount <br>";
    }

}

class Wing implements Payment{

    public function message(){
        echo "Pay With Wing Successfully <br>";
    }

    public function pay($amount){
        echo "Amount : $$amount <br>";
    }

}

// ABA
$aba = new ABA();
$aba->message();
$aba->pay(20000);

echo "<hr>";

// AC
$ac = new AC();
$ac->message();
$ac->pay(400000);

echo "<hr>";

// Wing
$wing = new Wing();
$wing->message();
$wing->pay(4999);

echo "<hr>";

?>