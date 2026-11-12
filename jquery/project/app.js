$(document).ready(function() {
    $("#productForm").on("submit",function(e){
        e.preventDefault();

        let name = $("#productName").val();
        let price = $("#productPrice").val();

        if(name === "" || price === "") {
            $("#message")
            .text("plaese fill in all fields")
            .removeClass("text-success")
            .addClass("text-danger");
            return;
        }

        $("#productList").append(`
        <tr>
          <td>1</td>
          <td>${name}</td>
          <td>$${price}</td>
          <td><button class="delete-btn">Delete</button></td>
        </tr>`);

        $("#message")
        .text("Product added successfully")
        .removeClass("text-danger")
        .addClass("text-success");

       $("#productName").val("");
       $("#productPrice").val("");
    
    

    });
});