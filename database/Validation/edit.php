<?php

require_once "db.php";

if (!isset($_GET['id'])) {
    header("Location: post.php");
    exit;
}

$id = (int) $_GET['id'];

// Get employee
$result = $conn->query("SELECT * FROM employee WHERE id = $id");

if ($result->num_rows == 0) {
    echo "Employee not found";
    exit;
}

$employee = $result->fetch_assoc();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name   = trim($_POST['name'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $salary = trim($_POST['salary'] ?? '');
    $email  = trim($_POST['email'] ?? '');
    $pwd    = $_POST['pwd'] ?? '';
    $pos    = trim($_POST['pos'] ?? '');

    // Validation
    if (empty($name)) {
        $errors['name_error'] = 'Name is required';
    } elseif (strlen($name) < 3) {
        $errors['name_error'] = 'Name must be at least 3 characters';
    }

    if (empty($salary)) {
        $errors['salary_error'] = 'Salary is required';
    }

    if (empty($email)) {
        $errors['email_error'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email_error'] = 'Email format is invalid';
    }

    if (empty($pwd)) {
        $errors['pwd_error'] = 'Password is required';
    } elseif (strlen($pwd) < 6) {
        $errors['pwd_error'] = 'Password must be at least 6 characters';
    }

    if (empty($pos)) {
        $errors['pos_error'] = 'Position is required';
    }

    // If no errors
    if (empty($errors)) {

        $sql = "UPDATE employee SET
                    username = '$name',
                    gender = '$gender',
                    salary = '$salary',
                    pos = '$pos',
                    email = '$email',
                    pwd = '$pwd'
                WHERE id = $id";

        if ($conn->query($sql)) {
            header("Location: post.php");
            exit;
        } else {
            $errors['db_error'] = $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <title>Edit Employee</title>

    <style>
        body {
            background-color: #f4f7f6;
            padding: 40px;
        }

        form {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,.08);
            max-width: 500px;
            margin: auto;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 12px;
        }

        button {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>

<body>

<form method="POST">

    <h2 class="text-center mb-4">Edit Employee</h2>

    <?php if (isset($errors['db_error'])): ?>
        <p class="error">
            <?= htmlspecialchars($errors['db_error']) ?>
        </p>
    <?php endif; ?>


    <!-- Name -->
    <label>Name</label>

    <input
        type="text"
        name="name"
        value="<?= htmlspecialchars($_POST['name'] ?? $employee['username']) ?>"
    >

    <p class="error">
        <?= $errors['name_error'] ?? '' ?>
    </p>


    <!-- Gender -->
    <label>Gender</label>

    <select name="gender">

        <option value="female"
            <?= (($_POST['gender'] ?? $employee['gender']) == 'female') ? 'selected' : '' ?>>
            Female
        </option>

        <option value="male"
            <?= (($_POST['gender'] ?? $employee['gender']) == 'male') ? 'selected' : '' ?>>
            Male
        </option>

    </select>

    <br><br>


    <!-- Salary -->
    <label>Salary</label>

    <input
        type="number"
        name="salary"
        value="<?= htmlspecialchars($_POST['salary'] ?? $employee['salary']) ?>"
    >

    <p class="error">
        <?= $errors['salary_error'] ?? '' ?>
    </p>


    <!-- Email -->
    <label>Email</label>

    <input
        type="email"
        name="email"
        value="<?= htmlspecialchars($_POST['email'] ?? $employee['email']) ?>"
    >

    <p class="error">
        <?= $errors['email_error'] ?? '' ?>
    </p>


    <!-- Password -->
    <label>Password</label>

    <input
        type="password"
        name="pwd"
        value="<?= htmlspecialchars($_POST['pwd'] ?? $employee['pwd']) ?>"
    >

    <p class="error">
        <?= $errors['pwd_error'] ?? '' ?>
    </p>


    <!-- Position -->
    <label>Position</label>

    <input
        type="text"
        name="pos"
        value="<?= htmlspecialchars($_POST['pos'] ?? $employee['pos']) ?>"
    >

    <p class="error">
        <?= $errors['pos_error'] ?? '' ?>
    </p>


    <button type="submit" class="btn btn-primary">
        Update Employee
    </button>

    <a href="post.php" class="btn btn-secondary w-100 mt-2">
        Cancel
    </a>

</form>

</body>
</html>