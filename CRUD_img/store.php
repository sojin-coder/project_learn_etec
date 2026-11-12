
<?php
    require_once './config/db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $title = trim($_POST['title']);
        $price = trim($_POST['price']);
        $qty = trim($_POST['qty']);
        $des = trim($_POST['des']);
//  image upload
        $image_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        $path = "upload /" . $image_name;
        $path  = "upload /" .time(). "-" . $image_name;
        move_uploaded_file($tmp_name, $path);

        $errors = [];

        if(empty($title)){
            $errors['title'] = "Title is required";
        }

        if ((empty($price)) || ($price < 0) || (!is_numeric($price))){
            $errors['price'] = "Price must be a positive number";
        }

        if((empty($qty)) || ($qty <= 0) || !filter_var($qty, FILTER_VALIDATE_INT)){
            $errors['qty'] = 'Qty must be a position integer';
        }
        if(empty($des)){
            $errors['des'] = "Des is required";
        }

        if(!$errors){
            $insert = $conn->query("INSERT  INTO products (title,image,price,qty,description)
                                  VALUES ('$title','$path',$price,$qty,'$des')");
            $conn -> close();
            if($insert){
                setcookie('success',"Insert Product is sucessfully", time() +10,'/');
                header("Location:index.php");
                exit;
            }
        }else{
            setcookie('title',$errors['title'],time() + 10 ,'/');
            // setcookie('title',$errors['title'],time() + 10 ,'/');
            setcookie('price',$errors['price'],time() + 10 ,'/');
            setcookie('qty', $errors['qty'] , time() + 10,'/');
            setcookie('des', $errors['des'] , time() + 10,'/');
            header("location:create.php");
            exit;
        }
    }


?>