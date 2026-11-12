<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }
        
        body{
            height:100vh;
            display:flex;
            
            gap:2px;
            align-items:center;
            
        }
        
        .container{
            width:400px;
            background:#1f2937;
            padding:35px;
            border-radius:15px;
            box-shadow:0 15px 40px rgba(0,0,0,.4);
            margin-left:20% ;
        }
        
        h1{
            color:white;
            text-align:center;
            margin-bottom:25px;
        }
        
        input{
            width:100%;
            padding:14px;
            margin-bottom:18px;
            border:none;
            border-radius:8px;
            background:#374151;
            color:white;
            font-size:16px;
            outline:none;
            transition:.3s;
        }
        
        input::placeholder{
            color:#cbd5e1;
        }
        
        input:focus{
            border:2px solid #3b82f6;
            background:#4b5563;
        }
        
        button{
            width:100%;
            padding:14px;
            border:none;
            border-radius:8px;
            background:#2563eb;
            color:white;
            font-size:18px;
            cursor:pointer;
            transition:.3s;
        }
        
        button:hover{
            background:#1d4ed8;
            transform:translateY(-2px);
        }
        
        .result{
            width:400px;
            /* margin-top:10px; */
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 5px 15px rgba(0,0,0,.2);
        }
        
        .result h3{
            margin:10px 0;
        }
        .result{
            width:400px;
            /* margin:25px auto; */
            background:#ffffff;
            border-radius:15px;
            padding:25px;
            box-shadow:0 10px 30px rgba(0,0,0,.2);
            
        }
        
        .result h2{
            text-align:center;
            color:#2563eb;
            margin-bottom:20px;
        }
        
        .result p{
            display:flex;
            justify-content:space-between;
            font-size:18px;
            padding:10px 0;
            border-bottom:1px solid #ddd;
        }
        
        .result p:last-child{
            border-bottom:none;
        }
        
        .result span{
            font-weight:bold;
            color:#1f2937;
        }
        
        .success{
            margin-top:15px;
            padding:12px;
            background:#d1fae5;
            color:#065f46;
            border-radius:8px;
            text-align:center;
            font-weight:bold;
        }
        
        .error{
            margin-top:15px;
            padding:12px;
            background:#fee2e2;
            color:#b91c1c;
            border-radius:8px;
            text-align:center;
            font-weight:bold;
        }
</style>
<body>

<div class="container">
    <form method="post">
        <h1> Bank Form</h1>

        <input type="number" name="balance"
       value="<?= isset($_POST['balance']) ? $_POST['balance'] : '' ?>">

       <input type="number" name="deposit"
       value="<?= isset($_POST['deposit']) ? $_POST['deposit'] : '' ?>">

       <input type="number" name="withdraw"
       value="<?= isset($_POST['withdraw']) ? $_POST['withdraw'] : '' ?>">

        <button type="submit">Process</button>
    </form>
</div>
</body>
</html>

<hr>
<?php

class Bank{

    private $balance = 0;
    private $deposit = 0;
    private $withdraw = 0;

    public function __construct($balance, $deposit, $withdraw){
        $this->balance = $balance;
        $this->deposit = $deposit;
        $this->withdraw = $withdraw;
    }

    public function process(){

    $total = $this->balance + $this->deposit;

    echo "<div class='result'>";
    echo "<h2>Bank Result</h2>";

    echo "<p>Balance <span>$".$this->balance."</span></p>";
    echo "<p>Deposit <span>$".$this->deposit."</span></p>";
    echo "<p>Withdraw <span>$".$this->withdraw."</span></p>";
    echo "<p>Total Balance <span>$".$total."</span></p>";

    if($total < $this->withdraw){
        echo "<div class='error'>❌ Balance Not Enough!</div>";
    }else{
        $result = $total - $this->withdraw;
        echo "<p>Balance After Withdraw <span>$".$result."</span></p>";
        echo "<div class='success'>✅ Transaction Successful</div>";
    }

    echo "</div>";
}
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $balance = $_POST["balance"];
    $deposit = $_POST["deposit"];
    $withdraw = $_POST["withdraw"];

    $bank = new Bank($balance, $deposit, $withdraw);
    $bank->process();
}

?>

</body>
</html>