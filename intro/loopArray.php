<?php 
   $product = [
    "id" => 101,
    "title" =>"comput",
    "price" => 1200,
    "qty" => 20
   ];
   foreach ($product as $key => $value){
    echo "$key : $value <br>";
   }
 echo "<br>----------------------------><--------------------<br>";

   $employee = [
   [
     "id" =>002,
     "name" =>"wow",
     "position" =>"sale",
     "salary" =>1200
   ],
   [
     "id" =>003,
     "name" =>"joon",
     "position" =>"it",
     "salary" =>1200
   ],
   [
     "id" =>004,
     "name" =>"sok",
     "position" =>"manager",
     "salary" =>1200
   ],

   ];
   foreach ($employee as $emp){
    foreach ($emp as $key => $value){
        echo "$key : $value <br>";
    }
    echo "<hr>";
}



?>
<?php
  $product = [
   [
     "id" => "002",
     "name" => "wow",
     "image" => "https://i.pinimg.com/736x/34/ef/4f/34ef4f3253e28051e5a50d0293aeb0e8.jpg",
     "position" => "sale",
     "salary" => 1200
     ],
     [
       "id" => 003,
       "name" => "joon",
       "image" => "https://i.pinimg.com/736x/24/68/88/24688843903c8e0e07c8d0e4e0309781.jpg",
       "position" => "it",
       "salary" => 1200
       ],
       [
         "id" => "004",
         "name" => "sok",
         "image" => "https://i.pinimg.com/736x/76/3f/65/763f65dc9bec81e8a602553f25c0712e.jpg",
         "position" => "manager",
         "salary" => 1200
         ],
         [
           "id" => 006,
           "name" => "room",
           "image" => "https://i.pinimg.com/736x/93/e2/39/93e239f342211c2c44574b3a1255b58a.jpg",
           "position" => "Teacher",
           "salary" => 1200
   ]
  ];
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>
  <div class="container mt-2">
    <div class="row">
      <?php foreach($product as $pro):?>
      <div class="col-sm-4">
        <div class="card">
          
          <img src="<?= $pro['image'] ?>" alt="img" class="card-img-top img-responsive" style = "width:200px;">
          <div class="card-body">
            <h4><?= $pro['name'] ?></h4>
            <p>ID : <?= $pro['id'] ?></p>
            <p>Position : <?= $pro['position'] ?></p>
            <p>Salary : $<?= $pro['salary'] ?></p>
            
            <a href="#" class="btn btn-primary">
              See Profile
            </a>
          </div>
        </div>
        <?php endforeach ?>
      </div>

    </div>
  </div>
  <div class="container">
    <div class="row">

        <?php foreach($product as $pro): ?>

        <div class="col-sm-4">
            <div class="card">

                <img src="<?= $pro['image'] ?>" alt="" class="img-responsive">

                <div class="card-body">
                    <h4><?= $pro['name'] ?></h4>
                    <p>ID : <?= $pro['id'] ?></p>
                    <p>Position : <?= $pro['position'] ?></p>
                    <p>Salary : $<?= $pro['salary'] ?></p>

                    <a href="#" class="btn btn-primary">
                        See Profile
                    </a>
                </div>

            </div>
            <br>
        </div>

        <?php endforeach; ?>

    </div>
</div>
  
</body>
</html>