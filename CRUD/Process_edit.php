<?php
require_once './config/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id  = trim($_POST['id']);
    $title  = trim($_POST['title']);
    $price  = trim($_POST['price']);
    $qty  = trim($_POST['qty']);
    $des  = trim($_POST['des']);

    $errors = [];

    if(empty($id)){
        header("Location: index.php");
        exit;
    }

    if(empty($title)){
        $errors['title'] = "Title is required";
    }
    if ($price === '') {
        $errors['price'] = "Price is required";
    } elseif (!is_numeric($price) || $price <= 0) {
        $errors['price'] = "Price must be a positive number";
    }

    if ($qty === '') {
        $errors['qty'] = "Qty is required";
    } elseif (!filter_var($qty, FILTER_VALIDATE_INT) || $qty <= 0) {
        $errors['qty'] = "Qty must be a positive integer";
    }

    if (empty($des)) {
        $errors['des'] = "Description is required";
    }

    if(!$errors){
         $update = $conn->query("
        UPDATE products
        SET
            title = '$title',
            price = '$price',
            qty = '$qty',
            descript = '$des'
        WHERE id = $id
    ");

        $conn ->close();
        if($update){
            setcookie('update_success' , "Update Product successfully", time() + 10 ,'/');
            header("Location:index.php");
            exit;
        }else{
            setcookie('id',$errors['id'],time()+10 , '/');
            setcookie('title',$errors['title'],time()+10 , '/');
            setcookie('price',$errors['price'],time()+10 , '/');
            setcookie('qty',$errors['qty'],time()+10 , '/');
            setcookie('des',$errors['des'],time()+10 , '/');
           
            header("Loation:edit.php?id=".$id);
            exit;
        }
    }

   
}

?>