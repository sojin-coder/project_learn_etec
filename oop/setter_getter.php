<?php
class Employee{

    private $name;
    private $salary;
    private $position;

    public function set_name($name){
        $this->name = $name;
    }

    public function set_salary($salary){
        $this->salary = $salary;
    }

    public function set_position($position){
        $this->position = $position;
    }

    public function get_name(){
        echo $this->name . "<br>";
    }

    public function get_salary(){
        echo $this->salary . "<br>";
    }

    public function get_position(){
        echo $this->position . "<br>";
    }
}

$emp = new Employee();

$emp->set_name("Dara");
$emp->set_salary(1200);
$emp->set_position("Web Developer");

$emp->get_name();
$emp->get_salary();
$emp->get_position();

?>