<?php
require_once "db.php";

$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $salary = $_POST['salary'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pos = $_POST['pos'];

    if(empty($name)){
        $errors['name_error'] = 'name is require';
    }else if(strlen($name) < 3){
        $errors['name_error'] = 'Name must be least at 3 charactor';
    }

    if(empty($salary)){
        $errors['salary_error'] = 'salary is require';
    }

    if(empty($email)){
        $errors['email_error'] = 'Email is require';
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email_error'] = 'Email is not format';
    }

    if(empty($pwd)){
        $errors['pwd_error'] = 'Password is require';
    }else if(strlen($pwd) < 6){
        $errors['pwd_error'] = 'Name must be least at 6 charactor';
    }

    if(empty($pos)){
        $errors['pos_error'] = 'Position is require';
    }

       $sql = "INSERT INTO employee (username, gender, salary, pos, email, pwd)
            VALUES ('$name', '$gender', '$salary', '$pos', '$email', '$pwd')";

      if ($conn->query($sql)) {
          header("Location: table.php");
          exit;
      } else {
          $errors['db_error'] = $conn->error;
      }
}

$employees = $conn->query("SELECT * FROM employee");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employee Management</title>
    <style>
      
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 420px;
            margin-bottom: 40px;
        }

        
        h1, h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #2c3e50;
            text-align: center;
        }

        form h1 {
            border-bottom: 2px solid #eef2f5;
            padding-bottom: 12px;
        }

       
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px 14px;
            margin-top: 6px;
            border: 1px solid #dcdfe6;
            border-radius: 6px;
            font-size: 0.95rem;
            background-color: #fafafa;
            transition: all 0.2s ease-in-out;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #4a90e2;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.15);
        }

     
        p {
            font-size: 0.85rem;
            min-height: 1.2rem;
            margin: 4px 0 12px 2px;
        }

        p[style*="color: red"],
        p[style*="color:red"] {
            color: #e74c3c !important;
            font-weight: 500;
        }

        p[style*="color: green"],
        p[style*="color:green"] {
            color: #2ecc71 !important;
            font-weight: 600;
            text-align: center;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        button[type="submit"]:hover {
            background-color: #357abd;
        }

        button[type="submit"]:active {
            transform: scale(0.99);
        }

       
        .table-container {
            width: 100%;
            max-width: 900px;
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eef2f5;
        }

        th {
            background-color: #4a90e2;
            color: #ffffff;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f8fafc;
        }
    </style>
</head>
<body>

    
    <form method="post">
        <h1>Employee Form</h1>
        <p style="color: red;">
            <?= $errors['db_error'] ?? '' ?>
        </p>
        <input type="text" name="name" placeholder="name"><br>
        <p style="color: red;"><?=$errors['name_error'] ?? '' ?></p>
        <select name="gender">
            <option value="female">female</option>
            <option value="male">male</option>
        </select><br>
        <input type="number" name="salary" placeholder="salary"><br>
        <p style="color: red;"><?=$errors['salary_error'] ?? '' ?></p>
        <input type="email" name="email" placeholder="email"><br>
        <p style="color: red;"><?=$errors['email_error'] ?? '' ?></p>
        <input type="password" name="pwd" placeholder="password"><br>
        <p style="color: red;"><?=$errors['pwd_error'] ?? '' ?></p>
        <input type="text" name="pos" placeholder="position"><br>
        <p style="color: red;"><?=$errors['pos_error'] ?? '' ?></p>

        <button type="submit">submit</button>
    </form>


   

</body>
</html>