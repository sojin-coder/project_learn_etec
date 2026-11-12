<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1 style="color:red" class="text-center">Form</h1>
    <div class="container mt-3">
        
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
        <?php
        
        $name = "";
        $email = "";
        $pwd = "";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
           $name = $_POST['name'];
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
        }
        ?>

       
         
            <ul class="list-group">
                <li class="list-group-item"><strong>Name:</strong> <?= $name ?></li>
                <li class="list-group-item"><strong>Email:</strong> <?= $email ?></li>
                <li class="list-group-item"><strong>Password:</strong> <?= $pwd ?></li>
            </ul>
        

    </div>
</body>
</html>