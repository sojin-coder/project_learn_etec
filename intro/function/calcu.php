<?php 

   if (isset($_POST['addition'])) {
       $num1 = $_POST['num1'];
       $num2 = $_POST['num2'];
       $result = $num1 + $num2;
   }else if (isset($_POST['subtract'])) {
       $num1 = $_POST['num1'];
       $num2 = $_POST['num2'];
       $result = $num1 - $num2;
    }else if (isset($_POST['multiply'])) {
       $num1 = $_POST['num1'];
       $num2 = $_POST['num2'];
       $result = $num1 * $num2;
    }else if (isset($_POST['divide'])) {
       $num1 = $_POST['num1'];
       $num2 = $_POST['num2'];
       if ($num2 == 0) {
           $result = "Error: Division by zero";
       } else {
           $result = $num1 / $num2;
       }
    }else if (isset($_POST['modulo'])) {
       $num1 = $_POST['num1'];
         $num2 = $_POST['num2'];
         if ($num2 == 0) {
              $result = "Error: Division by zero";
            } else {
                $result = $num1 % $num2;
                }
    }

    function Sum($num1 , $num2){
        return $num1 + $num2;
    }
    function Sub($num1 , $num2){
        return $num1 - $num2;

    }
    function Mul($num1 , $num2){
        return $num1 * $num2;

    }
    function Div($num1 , $num2){
        if($num2 == 0){
            return "Error: Division by zero";
        }
        return $num1 / $num2;

    }
    function Mod($num1 , $num2){
        if($num2 == 0){
            return "Error: Division by zero";
        }
        return $num1 % $num2;

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, 'Khmer OS Battambang';
        }
        body {
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px 20px;
            margin: 0;
        }
        .exercise-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 25px;
            text-decoration: underline;
            text-align: center;
        }
        .calculator-card {
            background: white;
            width: 100%;
            max-width: 420px;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .calculator-title {
            text-align: center;
            color: #333;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 22px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
            font-size: 14px;
        }
        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.2s;
        }
        .input-group input:focus {
            border-color: #3b82f6;
        }
        .button-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            margin-bottom: 25px;
        }
        .btn {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 15px 0;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.1s;
        }
        .btn:hover {
            background-color: #2563eb;
        }
        .btn:active {
            transform: scale(0.95);
        }
        .result-box {
            background-color: #0062e3;
            color: white;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            min-height: 110px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .result-label {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            opacity: 0.9;
        }
        .result-value {
            font-size: 36px;
            font-weight: bold;
            word-break: break-all;
        }
    </style>
</head>
<body>

    <div class="calculator-card">
        <h2 class="calculator-title">Simple Calculator</h2>
        
        <form method="POST" action="">
            <div class="input-group">
                <label for="num1">First Number</label>
                <input type="number" step="any" name="num1"  value="<?= $num1 ?>" required>
            </div>
            
            <div class="input-group">
                <label for="num2">Second Number</label>
                <input type="number" step="any" name="num2" id="num2" value="<?= $num2 ?>" required>
            </div>
            
            <div class="button-grid">
                <button type="submit" name="addition" value="+" class="btn">+</button>
                <button type="submit" name="subtract" value="-" class="btn">-</button>
                <button type="submit" name="multiply" value="x" class="btn">×</button>
                <button type="submit" name="divide" value="÷" class="btn">÷</button>
                <button type="submit" name="modulo" value="%" class="btn">%</button>
            </div>
        </form>

        <div class="result-box">
            <div class="result-label">Your Result</div>
            <div class="result-value" >
                <?php 
                    if (isset($result)) {
                        echo $result;
                    }
                ?>

            </div>
        </div>
    </div>

</body>
</html>