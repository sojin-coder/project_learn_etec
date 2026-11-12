<?php

class Person{
    protected $name;
    protected $age;

    public function __construct($name, $age){
        $this->name = $name;
        $this->age = $age;
    }

    public function personInfo(){
        echo "<h1>Name : " . $this->name . "</h1>";
        echo "<h1>Age : " . $this->age . "</h1>";
    }
}

class Employee extends Person{
    protected $salary;

    public function __construct($name, $age, $salary){
        parent::__construct($name, $age);
        $this->salary = $salary;
    }

    public function employeeInfo(){
        $this->personInfo();
        echo "<h1>Salary : " . $this->salary . "</h1>";
    }
}

class Manager extends Employee{
    protected $department;

    public function __construct($name, $age, $salary, $department){
        parent::__construct($name, $age, $salary);
        $this->department = $department;
    }

    public function managerInfo(){
        $this->personInfo();
        $this->employeeInfo();
        echo "<h1>Department : " . $this->department . "</h1>";
    }
}

// បង្កើត Object និងហៅទៅប្រើប្រាស់
$manager = new Manager('Jonh', 35, 5000, 'IT');
// $manager->personInfo();
// echo "<hr>";
// $manager->employeeInfo();
// echo "<hr>";
$manager->managerInfo();

?>