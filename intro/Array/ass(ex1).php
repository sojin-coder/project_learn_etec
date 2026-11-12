<?php 
   $students = [
       [
        "id"=>1,
        "name"=>"Raksa",
        "image"=>"https://i.pinimg.com/736x/69/f8/b5/69f8b52d5021b1309dab43d3b0a98fdc.jpg",
        "gender"=>"Male",
        "age"=>18,
        "major"=>"Information Technology",
        "phone"=>"012345678",
        "email"=>"Raksa@gmail.com"
       ],
       [
        "id"=>2,
        "name"=>"Jonh",
        "image"=>"https://i.pinimg.com/1200x/55/ac/7e/55ac7e1914b7157faf361daef9db8322.jpg",
        "gender"=>"Male",
        "age"=>18,
        "major"=>"Information Technology",
        "phone"=>"012345678",
        "email"=>"Jonh@gmail.com"
       ],
       [
        "id"=>3,
        "name"=>"Jane",
        "image"=>"https://i.pinimg.com/736x/26/60/5e/26605e26bc6d1dc2d176fc68364a5f18.jpg",
        "gender"=>"Female",
        "age"=>19,
        "major"=>"Information Technology",
        "phone"=>"012345679",
        "email"=>"Jane@gmail.com"
       ],
       [
        "id"=>4,
        "name"=>"Alice",
        "image"=>"https://i.pinimg.com/736x/c8/19/d7/c819d760dee4b7616be48de6cf109c47.jpg",
        "gender"=>"Female",
        "age"=>20,
        "major"=>"Information Technology",
        "phone"=>"012345680",
        "email"=>"Alice@gmail.com"
       ]


   ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Card</title>
</head>
<style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }
        
        body{
            background:#f3f4f6;
            padding:40px;
        }
        
        .container{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
            gap:25px;
        }
        
        .card{
            background:#fff;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,.15);
            transition:.3s;
        }
        
        .card:hover{
            transform:translateY(-8px);
            box-shadow:0 10px 20px rgba(0,0,0,.25);
        }
        
        .img_card{
            background:#0d6efd;
            text-align:center;
            padding:30px 20px;
        }
        
        .img_card img{
            width:120px;
            height:120px;
            border-radius:50%;
            object-fit:cover;
            border:5px solid #fff;
        }
        
        .img_card h3{
            color:white;
            margin-top:15px;
        }
        
        .card_body{
            padding:20px;
        }
        
        .card_body p{
            margin:10px 0;
            border-bottom:1px solid #eee;
            padding-bottom:8px;
        }
        
        .card_body b{
            color:#0d6efd;
        }
        
        .edit{
            width:100%;
            margin-top:15px;
            padding:12px;
            background:#0d6efd;
            color:white;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-size:16px;
            transition:.3s;
        }
        
        .edit:hover{
            background:#0b5ed7;
        }
</style>

<body>
  <div class="container">
    

<?php foreach($students as $student): ?>

<div class="card">
    

    <div class="img_card">
        <h2>Student Cards</h2><br>
        <img src="<?= $student['image']; ?>" alt="">
        <h3><?= $student['name']; ?></h3>
    </div>

    <div class="card_body">
        <p><b>ID :</b> <?= $student['id']; ?></p>
        <p><b>Gender :</b> <?= $student['gender']; ?></p>
        <p><b>Age :</b> <?= $student['age']; ?></p>
        <p><b>Major :</b> <?= $student['major']; ?></p>
        <p><b>Phone :</b> <?= $student['phone']; ?></p>
        <p><b>Email :</b> <?= $student['email']; ?></p>

        <button class="edit">Edit</button>
    </div>

</div>

<?php endforeach; ?>

</div>
    
</body>
</html>