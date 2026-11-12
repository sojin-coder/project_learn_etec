// ============== ReloadData ==================

function loadData() {
  $.ajax({
    url: "select.php",
    type: "GET",
    success: function (data) {
      $("#demo").html(data);
    },
  });
}

// ==============FORM SUBMIT============
function handleCreate(e) {
  e.preventDefault();

  let formdata = new FormData(this);

  $.ajax({
    url: "insert.php",
    type: "POST",
    data: formdata,
    contentType: false,
    processData: false,
    success: function () {
      window.location = "index.php";
    },
  });
}

// ==================== PREVIEW IMAGE ====================
function previewImage(input, previewSelector) {
  if (input.files && input.files[0]) {
    let imageUrl = URL.createObjectURL(input.files[0]);
    $(previewSelector).attr('src', imageUrl).show();
  }
}

// ==================== Edit ====================

function editRecode(id) {
  $.ajax({
    url: "edit.php",
    type: "POST",
    data: { id: id },
    success: function (res) {
      $("#app-container").html(res);
    },
  });
}

// ==================== Update ====================

// function updatePost(form) {
//   let formdata = new FormData(form);
//   $.ajax({
//     url: "update.php",
//     type: "POST",
//     data: formdata,
//     contentType: false,
//     processData: false,
//     success: function (res) {
//       console.log(res);
//       window.location = "index.php";
//     },
//   });
// }
function updatePost(form) {

  let formdata = new FormData(form);

  $.ajax({

    url: "update.php",
    type: "POST",
    data: formdata,

    contentType: false,
    processData: false,

    success: function (res) {

      console.log(res);

      window.location = "index.php";

    },

  });

}

// ==================== Delete ====================
function deleteRecode(id) {
  if (!confirm("Are you sure you want to delet?")) return;
  $.ajax({
    url: "delete.php",
    type: "POST",
    data: { id: id },
    success: function (res) {
      window.location = "index.php";
    },
  });
}

//  contentType: false, វាអត់បំប្លែងdata ទៅជា string ឡើយ
//  processData: false, វាអត់បំប្លែងdata ទៅជា string ឡើយ
//  ហើយ Header ក៍ត្រូវតាមទម្រង់ File Upload ដែល

//  contentType: true,
// processData: true, បំប្លែងdata ទៅជាstring (ប្រើសម្រាប់ Form អត្ថបទធម្មតា)

// window.location ប្តូរទំព័រ (Redirect / Navigate): ប្រើ​សម្រាប់​បញ្ជូន User ទៅកាន់ទំព័រថ្មីមួយទៀត​តាមរយៈ JavaScript
// console.log(window.location.hostname):  ទាញយកព័ត៌មាន URL បច្ចុប្បន្ន: ប្រើ​ដើម្បី​ដឹង​ថា User កំពុង​ស្ថិត​នៅ Link ណា,
// Domain ណា ឬមាន Query Parameter ( search string ) អ្វីខ្លះ
// window.location.reload():   Refresh ទំព័រ (Reload): ប្រើ​សម្រាប់ Reload ទំព័រ​ឡើងវិញ
