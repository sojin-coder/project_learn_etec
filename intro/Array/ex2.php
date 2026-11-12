<?php
   $course = ['PHP','LARAVEL','REACT','VUE','JS','TS','CSS','HTML',"C#",'C++'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class=" row mt-5 d-flex justify-content-center">
            <div class="col-10">
                <?php foreach($course as $value): ?>
                    <div class="alert alert-danger d-flex justify-content-between ">
                        <?= $value ?>
                        <button class="btn btn-close"></button>
                    </div>
                <?php endforeach ?>
            </div>

        </div>
    </div>
    
</body>
</html>