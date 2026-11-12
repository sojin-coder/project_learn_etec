<?php

class Bank{
    protected $accountNumber;
    protected $balance;

    public function __construct($accountNumber, $balance){
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    public function bank(){
        echo "<h1>Account Number : {$this->accountNumber}</h1>";
        echo "<h1>Balance : \${$this->balance}</h1>";
    }
}

class ABA extends Bank{
    private $bankName = "ABA";
    private $deposit;

    public function __construct($accountNumber, $balance, $deposit){
        parent::__construct($accountNumber, $balance);
        $this->deposit = $deposit;
    }

    public function aba(){
        echo "<h1>{$this->bankName} Bank</h1>";
        $this->bank();
        echo "<h1>Deposit : \${$this->deposit}</h1>";
        echo "<h1>Total Balance : $" . ($this->balance + $this->deposit) . "</h1>";
    }
}

class AC extends Bank{
    private $bankName = "AC";
    protected $withdraw;

    public function __construct($accountNumber, $balance, $withdraw){
        parent::__construct($accountNumber, $balance);
        $this->withdraw = $withdraw;
    }

    public function ac(){
        echo "<h1>{$this->bankName} Bank</h1>";
        $this->bank();
        echo "<h1>Withdraw : \${$this->withdraw}</h1>";
        echo "<h1>Total Balance : $" . ($this->balance - $this->withdraw) . "</h1>";
    }
}

// ABA Object
$aba = new ABA("101", 5000, 1200);
$aba->aba();

echo "<hr>";

// AC Object
$ac = new AC("102", 10000, 1700);
$ac->ac();

?>