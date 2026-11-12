// ============== ReloadData ==============
function loadData() {
    $.ajax({
        url: "select.php",
        type: "GET",
        success: function(data){            
            console.log(data);
            
            $('#demo').html(data);
        }
    });
}

// ============== create Data ==============
function createData(e){
    let formData = new FormData($('#formPost')[0]);
    $.ajax({
        url: "insert.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data){
            console.log(data);
            window.location.href = "index.php";
        },
    });
}
// ==============================
// Update Data

function updateData() {
    var formData = new FormData($('#formPost')[0]);
    
    $.ajax({
        url: "update.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
           
            alert(data);
            window.location.href = "index.php";
        },
        error: function(xhr) {
            alert("Error: " + xhr.responseText);
        }
    });
}
// function updateData() {

//     var formData = new FormData($('#formPost')[0]);

//     $.ajax({
//             url: "update.php",
//             type: "POST",
//             data: formData,
//             contentType: false,
//             processData: false,
        
//             success: function(data) {
        
//                 alert(data);
//                 $('#app-container').load('index.php #app-container > *');
//             },
//             error: function(xhr) {
//                 alert("Error: " + xhr.responseText);
//             }
//         });
//     }
//============delete =============
function deleteData(id){

      $.ajax({
        url:'delete.php',
        type:'POST',
        data:{id:id},
        success: function(res){
            console.log(res);
            
            window.location = 'index.php';
        }
      })

   
}

