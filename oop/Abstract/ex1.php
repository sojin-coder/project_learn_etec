<?php

abstract class Banking{

    abstract public function User();

    public function Money($m){
        return $m;
    }

    public function Transfer($t){
        return $t;
    }

}

class UserAcc extends Banking{

    public function User(){
        return "Sok Heng";
    }

}

$user1 = new UserAcc();

echo "<h1>User Name : " . $user1->User() . "</h1>";
echo "<h1>User Money : $" . $user1->Money(1000) . "</h1>";
echo "<h1>User Transfer : $" . $user1->Transfer(100) . "</h1>";

?>