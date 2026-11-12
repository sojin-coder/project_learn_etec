<?php 
 $employee = [
    [
        "name" => "john",
        "age" => 24,
        "skill" => "MySQL",
        "position" => "web developer",
        "address" => "kandal",
        
    ],
    [
        "name" => "David",
        "age" => 30,
        "skill" => "PHP",
        "position" => "backend developer",
        "address" => "phnom penh",
        
    ],
    [
        "name" => "Sarah",
        "age" => 28,
        "skill" => "JavaScript",
        "position" => "frontend developer",
        "address" => "siem reap",
        
    ],
    [
        "name" => "Mike",
        "age" => 35,
        "skill" => "Python",
        "position" => "web developer",
        "address" => "battambang",
        
    ]
   
 ];
function non_return_has_param($employee){

    if(isset($employee)){

        echo "<table border='1' cellpadding='10'>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Age</th>";
        echo "<th>Skill</th>";
        echo "<th>Position</th>";
        echo "<th>Address</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        foreach($employee as $emp){

            echo "<tr>";
            echo "<td>".$emp['name']."</td>";
            echo "<td>".$emp['age']."</td>";
            echo "<td>".$emp['skill']."</td>";
            echo "<td>".$emp['position']."</td>";
            echo "<td>".$emp['address']."</td>";
            echo "<td><button>Edit</button> <button>Delete</button></td>";
            echo "</tr>";

        }

        echo "</table>";

    }else{
        echo "Employee Not Found";
    }

}

non_return_has_param($employee);

?>