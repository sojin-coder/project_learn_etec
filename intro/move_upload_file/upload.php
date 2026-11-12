<?php
       if($_SERVER['REQUEST_METHOD'] === "POST"){
        $name = $_POST["name"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];
        

        // print_r($_FILES['image']);​​  // path name link


        $image_name = $_FILES["image"]['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        //  $path = "upload /" .$image_name;  //Duplicate image names cannot be used.
        $path = "upload /" . $image_name;
        $path  = "upload /" .time(). "-" . $image_name;
        move_uploaded_file($tmp_name, $path);
    }
?>
<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <img src="<?= $path ?>" width="80">
            </td>

            <td><?= $name ?></td>

            <td>$<?= $price ?></td>

            <td><?= $stock ?></td>
            <td>
                <button>Edit</button>
                <button>Delect</button>
            </td>

        </tr>

  

    </tbody>
</table>