<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>



<div id="app-container">
<h1>Posts</h1>
<a href="create.php" id="btn-create">create</a><br>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Command</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="demo">


    </tbody>
</table>

</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="api.js"></script>
<script>
    $(document).ready(function(){

        // Load the create.php view into the container without refreshing
        $('#app-container').on('click', '#btn-create', function(e){
            e.preventDefault();
            $('#app-container').load('create.php');


        })
        loadData();
    });

</script>





</body>
</html>


