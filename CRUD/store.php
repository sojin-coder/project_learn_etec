
<!-- 
<?php
   require_once './config/db.php';

   if($_SERVER['EQUEST_METHOD']==='POST'){
    $title = trim($_POST['title']);
    $price = trim($_POST['price']);
    $qty = trim($_POST['qty']);
    $des = trim($_POST['descript']);
    
    $errors = [];

    if(empty($title)){
    $errors['title'] = "Title is required";
   }

   if(empty($price)){
     $errors['price'] = "Price is required";
   }else if(($price <0) || (!is_numeric($price))){
      $errors['price'] = "Price must be a positive number";
   }

  if ($qty === '' || !filter_var($qty, FILTER_VALIDATE_INT) || $qty <= 0) {
        $errors['qty'] = "Qty must be a positive integer";
    }

   if(empty($des)){
    $errors['des'] = "descript is required";
   }

   if(!$error){
     $insert = $conn->query("INSERT * FROM products (title,price,qty,descript)
                                            VALUES ('$title',$price,$qty,'$des')");
        $conn->close();
        
        if($insert){
            setcookie('success','Insert Product successfully',time()+10,'/');
            header('location: index.php');
            exit;
        }
   }else{
    setcookie('title',$error['title'],time()+10,'/');
    setcookie('price',$error['price'],time()+10,'/');
    setcookie('qty',$error['qty'],time()+10,'/');
    setcookie('des',$error['des'],time()+10,'/');

    header('location: create.php');
    exit;
   }

   
   
   

   }



?> -->
<?php
    require_once './config/db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $title = trim($_POST['title']);
        $image = trim($_POST['image']);
        $price = trim($_POST['price']);
        $qty = trim($_POST['qty']);
        $des = trim($_POST['des']);

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
            $insert = $conn->query("INSERT  INTO products (title,image,price,qty,descript)
                                  VALUES ('$title','$image',$price,$qty,'$des')");
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