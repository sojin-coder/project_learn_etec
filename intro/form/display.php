<?php

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $title = $_POST["title"];
        $price = $_POST["price"];
        $qty = $_POST["qty"];
        $des = $_POST["des"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <main class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-10 card">
                <table class="table table-bordered text-center align-middle mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>PRICE</th>
                            <th>QTY</th>
                            <th>IMAGE</th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td><?= $title ?? '' ?></td>
                            <td><?= $price ?? '' ?></td>
                            <td><?= $qty ?? '' ?></td>
                            <td></td>
                            <td><?= $des ?? '' ?></td>
                            <td>
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>