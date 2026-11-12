

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
           "image" => "https://i.pinimg.com/originals/9a/8b/82/9a8b82eb66090071a79989c8e7d216bd.gif",
           "position" => "Teacher",
           "salary" => 1200
        ],
         [
           "id" => 007,
           "name" => "me",
           "image" => "https://i.pinimg.com/originals/2f/27/45/2f27455d0cf3f745542f690cefc96bda.gif",
           "position" => "sl u",
           "salary" => 1200
        ],
        
         [
           "id" => 9,
           "name" => "me",
           "image" => "https://i.pinimg.com/originals/ac/79/ec/ac79ec5dd1a5b35f1121ba26bb0adef2.gif",
           "position" => "sl u",
           "salary" => 1200
        ],
         [
           "id" =>8,
           "name" => "you",
           "image" => "https://i.pinimg.com/originals/17/ba/bf/17babf36bdb2b9bd2ce1bc977e0ec3f5.gif",
           "position" => "sl me",
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
  <div class="container mt-5 p-2 t-center mb-2" style="margin-top: 50px;">
    <br>
    <br>
    <div class="row mt-2  p-2">
      <?php foreach($product as $pro):?>
      <div class="col-sm-3">
        <div class="thumbnail text-center" style = "border:4px solid black; ">
          
          <img src="<?= $pro['image'] ?>" alt="img" class=" mx-auto d-block" style = "width:200px;height: 200px; object-fit: cover;">
          <div class="card-body mb-2">
            <h4><?= $pro['name'] ?></h4>
            <p>ID : <?= $pro['id'] ?></p>
            <p>Position : <?= $pro['position'] ?></p>
            <p>Salary : $<?= $pro['salary'] ?></p>
            
            <a href="#" class="btn btn-primary">
              See Profile
            </a>
            <br><br>
          </div>
        </div>
      </div>
      <?php endforeach ?>

    </div>
    <br>
    <br>
    <br>
  </div>

  
</body>
</html>