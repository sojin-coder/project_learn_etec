<?php

$name = "";
$email = "";
$pwd = "";
$gender = "";

$name_error = "";
$email_error = "";
$pwd_error = "";
$gender_error = "";
$success = "";

$user = [];

if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);
    $gender = $_POST['gender'] ?? "";


  
    if ($name == "") {
        $name_error = "Name is required";
    } elseif (strlen($name) < 3) {
        $name_error = "Name must be at least 3 characters";
    }



    if ($email == "") {
        $email_error = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email address";
    }


  
    if ($pwd == "") {
        $pwd_error = "Password is required";
    } elseif (strlen($pwd) < 6) {
        $pwd_error = "Password must be at least 6 characters";
    }


    // Gender Validation
    if ($gender == "") {
        $gender_error = "Please select gender";
    }


    // Check Error
    if (
        $name_error == "" &&
        $email_error == "" &&
        $pwd_error == "" &&
        $gender_error == ""
    ) {

        $success = "Registration Successful!";

        $user = [
            "name" => $name,
            "email" => $email,
            "password" => $pwd,
            "gender" => $gender
        ];
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration</title>

<link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
rel="stylesheet">

</head>


<body class="bg-light">


<div class="container py-5">


<div class="row justify-content-center">


<div class="col-md-7">


<?php if ($success != "") { ?>

<div class="alert alert-success">
    <?= $success ?>
</div>

<?php } ?>


<div class="card shadow">


<div class="card-header bg-primary text-white">

<h4 class="mb-0">
Student Registration Form
</h4>

</div>


<div class="card-body">


<form method="POST">


<!-- Name -->

<div class="mb-3">

<label class="form-label">
Full Name
</label>


<input 
type="text"
name="name"
class="form-control <?= $name_error != "" ? 'is-invalid' : '' ?>"
value="<?= htmlspecialchars($name) ?>"
placeholder="Enter your name">


<?php if ($name_error != "") { ?>

<div class="invalid-feedback">
<?= $name_error ?>
</div>

<?php } ?>


</div>



<!-- Email -->

<div class="mb-3">


<label class="form-label">
Email
</label>


<input

type="email"

name="email"

class="form-control <?= $email_error != "" ? 'is-invalid' : '' ?>"

value="<?= htmlspecialchars($email) ?>"

placeholder="Enter your email">


<?php if ($email_error != "") { ?>

<div class="invalid-feedback">
<?= $email_error ?>
</div>

<?php } ?>


</div>




<!-- Password -->


<div class="mb-3">


<label class="form-label">
Password
</label>


<input

type="password"

name="pwd"

class="form-control <?= $pwd_error != "" ? 'is-invalid' : '' ?>">



<?php if ($pwd_error != "") { ?>

<div class="invalid-feedback">

<?= $pwd_error ?>

</div>

<?php } ?>


</div>




<!-- Gender -->


<div class="mb-3">


<label class="form-label d-block">

Gender

</label>



<div class="form-check form-check-inline">


<input

class="form-check-input"

type="radio"

name="gender"

value="Male"

<?= $gender == "Male" ? "checked" : "" ?>>


<label class="form-check-label">

Male

</label>


</div>




<div class="form-check form-check-inline">


<input

class="form-check-input"

type="radio"

name="gender"

value="Female"

<?= $gender == "Female" ? "checked" : "" ?>>


<label class="form-check-label">

Female

</label>


</div>



<?php if ($gender_error != "") { ?>


<div class="text-danger mt-2">

<?= $gender_error ?>

</div>


<?php } ?>


</div>




<!-- Button -->


<div class="d-flex gap-2">


<button 

type="submit"

name="submit"

class="btn btn-primary">

Submit

</button>



<button

type="reset"

class="btn btn-secondary">

Reset

</button>


</div>


</form>


</div>


</div>





<?php if ($success != "") { ?>


<div class="card mt-4 shadow">


<div class="card-header bg-success text-white">

<h5>User Information</h5>

</div>



<div class="card-body">


<table class="table table-bordered">


<tr>

<th width="150">
Name
</th>

<td>
<?= htmlspecialchars($user['name']) ?>
</td>

</tr>



<tr>

<th>
Email
</th>

<td>
<?= htmlspecialchars($user['email']) ?>
</td>

</tr>




<tr>

<th>
Password
</th>

<td>
<?= htmlspecialchars($user['password']) ?>
</td>

</tr>



<tr>

<th>
Gender
</th>

<td>
<?= htmlspecialchars($user['gender']) ?>
</td>

</tr>



</table>


</div>


</div>


<?php } ?>



</div>


</div>


</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>