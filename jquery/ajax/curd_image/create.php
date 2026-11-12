<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Create Post</h1>

<form id="formPost" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="title"><br><br>
    <input type="text" name="command" placeholder="command"><br><br>
    <input type="file" name="image" id ="image_preview"><br><br>
    <img src=""​ id="preview" alt="" width="100"><br><br>
    
    <button type="submit">post</button>
    <button type="button" id="clearCreateBtn">Clear Form</button>

</form>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="api.js"></script>
<script>
    $(document).ready(function(){
        $('#formPost').on('submit', handleCreate);

        $('#image_preview').on('change', function(){
            previewImage(this, "#preview");
        })
    })


</script>
    
</body>
</html>

<!-- enctype="multipart/form-data" ដាក់ដើម្បីចាប់image បើអត់អានិងរូបអត់ចេញ -->


