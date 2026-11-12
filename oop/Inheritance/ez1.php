<!DOCTYPE html>
<html>
<head>
    <title>Bank Form</title>
</head>
<body>

<form method="post">
    <label>Bank</label>
    <select name="bank">
        <option value="ABA">ABA</option>
        <option value="AC">AC</option>
    </select>
    <br><br>

    <label>Account Number</label>
    <input type="text" name="accountNumber" required>
    <br><br>

    <label>Balance</label>
    <input type="number" name="balance" required>
    <br><br>

    <label>Amount (Deposit/Withdraw)</label>
    <input type="number" name="amount" required>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

<hr>

<?php

class Bank{
    protected $accountNumber;
    protected $balance;

    public function __construct($accountNumber,$balance){
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    public function bank(){
        echo "Account Number : ".$this->accountNumber."<br>";
        echo "Balance : $".$this->balance."<br>";
    }
}

class ABA extends Bank{
    private $deposit;

    public function __construct($accountNumber,$balance,$deposit){
        parent::__construct($accountNumber,$balance);
        $this->deposit = $deposit;
    }

    public function show(){
        echo "<h2>ABA Bank</h2>";
        $this->bank();
        echo "Deposit : $".$this->deposit."<br>";
        echo "Total Balance : $".($this->balance+$this->deposit);
    }
}

class AC extends Bank{
    private $withdraw;

    public function __construct($accountNumber,$balance,$withdraw){
        parent::__construct($accountNumber,$balance);
        $this->withdraw = $withdraw;
    }

    public function show(){
        echo "<h2>AC Bank</h2>";
        $this->bank();
        echo "Withdraw : $".$this->withdraw."<br>";
        echo "Total Balance : $".($this->balance-$this->withdraw);
    }
}

if(isset($_POST['submit'])){

    $bank = $_POST['bank'];
    $accountNumber = $_POST['accountNumber'];
    $balance = $_POST['balance'];
    $amount = $_POST['amount'];

    if($bank == "ABA"){
        $aba = new ABA($accountNumber,$balance,$amount);
        $aba->show();
    }
    else{
        $ac = new AC($accountNumber,$balance,$amount);
        $ac->show();
    }

}

?>

</body>
</html>