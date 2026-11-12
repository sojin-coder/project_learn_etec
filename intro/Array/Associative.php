<?php
$student = [
    "id" => "001",
    "name" => "Raksa",
    "image" =>"https://i.pravatar.cc/150?img=3",
    "gender" => "Male",
    "age" => 19,
    "major" => "Information Technology",
    "phone" => "012345678",
    "email" => "raksa@gmail.com"
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Card</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial;
        }

        body{
            background:#f5f5f5;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .card{
            width:350px;
            background:white;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.2);
            overflow:hidden;
            /* text-align:center; */
        }

        .header{
            background:#0d6efd;
            color:white;
            text-align:center;
            padding:20px;
        }

        .profile{
            width:100px;
            height:100px;
            border-radius:50%;
            margin:auto;
            display:block;
            margin-top:-50px;
            border:5px solid white;
        }

        .body{
            padding:20px;
        }

        .body p{
            margin:10px 0;
            font-size:17px;
        }
        .edit{
            background:#0d6efd;
            color:white;
            border:none;
            padding:10px 20px;
            border-radius:5px;
            cursor:pointer;
            margin-top:10px;
            width: 100%;
        }
        .img-card{
            text-align:center;
        }
    </style>
</head>
<body>
<div class="card">

    <div class="header">
        <h2>Student Card ;-)</h2>
    </div>
    <br><br>
    <div class="img-card">
    <img src="<?= $student['image'] ?>" class="profile">
    <h3>Khut Raksa</h3>
    <p>User Profile</p>
    </div>
    <div class="body">
        <p><hr></p>
        <p><b>ID :</b> <?= $student["id"] ?></p>
        <p><b>Name :</b> <?= $student["name"] ?></p>
        <p><b>Gender :</b> <?= $student["gender"] ?></p>
        <p><b>Age :</b> <?= $student["age"] ?></p>
        <p><b>Major :</b> <?= $student["major"] ?></p>
        <p><b>Phone :</b> <?= $student["phone"] ?></p>
        <p><b>Email :</b> <?= $student["email"] ?></p>
        <button class="edit">Update</button>
    </div>

</div>

</body>
</html>