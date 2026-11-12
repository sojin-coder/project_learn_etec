<?php

$create_success = $_COOKIE['create_success'] ?? '';
$update_success = $_COOKIE['update_success'] ?? '';
$delete_success = $_COOKIE['delete_success'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Posts · dark interface</title>
  <!-- Google Font & modern reset -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #0e0e12;
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
      color: #ecedee;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding: 2rem 1.5rem;
    }

    /* main container – glassmorphism card */
    #app-container {
      max-width: 1280px;
      /* max-width: 735px; */
      margin: 0 auto;
      width: 100%;
      background: rgba(22, 22, 30, 0.7);
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      border-radius: 2.5rem;
      padding: 2rem 2rem 2.5rem;
      box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(255, 255, 255, 0.03);
      transition: all 0.2s ease;
      border: 1px solid rgba(255, 255, 255, 0.02);
    }

    /* header inside container (we keep your existing header but style it) */
    #app-container h1:first-of-type {
      font-weight: 600;
      font-size: 2.2rem;
      letter-spacing: -0.02em;
      background: linear-gradient(135deg, #f0f2f5 0%, #b0b8c5 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      display: inline-block;
      margin-right: 1.2rem;
      border-right: 2px solid #2f313a;
      padding-right: 1.5rem;
      line-height: 1.2;
    }
    .success-message {
    position: fixed;
    top: 20px;
    right: 20px;

    background: #1f7a4d;
    color: white;

    padding: 14px 24px;

    border-radius: 10px;

    z-index: 9999;
    }
    .update-message{
      position: fixed;
    top: 20px;
    right: 20px;

    background: yellow;
    color: black;

    padding: 14px 24px;

    border-radius: 10px;

    z-index: 9999;
    }
    .delete-message{
      position: fixed;
    top: 20px;
    right: 20px;

    background: red;
    color: white;

    padding: 14px 24px;

    border-radius: 10px;

    z-index: 9999;
    }

    /* create button – subtle neon */
    #btn-create {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background: #2b2d38;
      color: #d6dae3;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.95rem;
      padding: 0.5rem 1.6rem;
      border-radius: 60px;
      border: 1px solid #3e404d;
      transition: all 0.2s ease;
      box-shadow: 0 2px 4px rgba(0,0,0,0.3);
      letter-spacing: 0.3px;
      margin-bottom: 0.5rem;
    }

    #btn-create:hover {
      background: #3b3e4d;
      border-color: #6b6f82;
      color: #ffffff;
      box-shadow: 0 0 12px rgba(110, 120, 180, 0.2);
      transform: scale(1.02);
    }

    /* table wrapper – scrollable on small screens */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1.8rem;
      border-radius: 1.2rem;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
      border: 1px solid #262832;
    }

    thead {
      background: #181a22;
      border-bottom: 1px solid #2c2e3a;
    }

    th {
      text-align: left;
      padding: 1rem 1.2rem;
      font-weight: 500;
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      color: #9aa1b2;
      border-right: 1px solid #262832;
      background: #16181f;
    }

    th:last-child {
      border-right: none;
    }

    td {
      padding: 1rem 1.2rem;
      border-bottom: 1px solid #262832;
      border-right: 1px solid #262832;
      background: #1b1d26;
      color: #e2e5ec;
      font-size: 0.95rem;
      vertical-align: middle;
    }

    td:last-child {
      border-right: none;
    }

    tbody tr:last-child td {
      border-bottom: none;
    }

    tbody tr:hover td {
      background: #22242f;
      transition: background 0.15s;
    }

    /* image placeholder – circle with icon */
    td:nth-child(4) {
      text-align: center;
      font-weight: 400;
      color: #9ca3b5;
    }

    /* action links / buttons */
    td:last-child a {
      display: inline-block;
      background: #2b2e3b;
      color: #ccd2df;
      padding: 0.25rem 1rem;
      border-radius: 30px;
      font-size: 0.75rem;
      font-weight: 500;
      text-decoration: none;
      border: 1px solid #3c3f4e;
      transition: all 0.15s ease;
      margin-right: 6px;
      letter-spacing: 0.2px;
    }

    td:last-child a:last-child {
      margin-right: 0;
    }

    td:last-child a:hover {
      background: #3e4155;
      border-color: #5d637b;
      color: white;
      box-shadow: 0 0 8px rgba(90, 100, 150, 0.2);
    }

    /* footer – minimal, inside container */
    footer {
      margin-top: 3rem;
      padding-top: 1.5rem;
      border-top: 1px solid #262832;
      text-align: center;
    }

    footer h1 {
      font-size: 1rem;
      font-weight: 500;
      color: #6c7388;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      opacity: 0.6;
    }

    /* responsive */
    @media (max-width: 700px) {
      body { padding: 1rem; }
      #app-container { padding: 1.2rem; border-radius: 1.8rem; }
      #app-container h1:first-of-type {
        font-size: 1.6rem;
        border-right: none;
        padding-right: 0;
        display: block;
        margin-bottom: 0.5rem;
      }
      table { font-size: 0.8rem; }
      th, td { padding: 0.7rem 0.6rem; }
      td:last-child a { padding: 0.2rem 0.7rem; font-size: 0.7rem; }
    }

    
    #app-container .create-wrapper {
      margin-top: 0.5rem;
    }

    
    #demo td:first-child {
      font-weight: 500;
      color: #bcc3d4;
    }

    
    td:nth-child(3) {
      font-family: 'Inter', monospace;
      background: #13151d;
      color: #b8c2d9;
    }

    
    td:nth-child(4) {
      font-size: 1.2rem;
    }

    
    header {
      display: none; 
    }

    
    .table-header {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 0.8rem 1.5rem;
      margin-bottom: 0.2rem;
    }
  </style>
</head>
<body>
  
  <header style="display: none;"></header>

  
  <div id="app-container">
   
    <div class="table-header">
      <h1>Posts</h1>
      <a href="create.php" id="btn-create">✨ create</a>
    </div>
    <!-- mes create success -->
   <?php if ($create_success): ?>

    <div class="success-message">
        <?= htmlspecialchars($create_success) ?>
    </div>

   <?php endif; ?>
    <!-- mes update success -->
   <?php if ($update_success): ?>

    <div class="update-message">
        <?= htmlspecialchars($update_success) ?>
    </div>

   <?php endif; ?>
    <!-- mes delete success -->
   <?php if ($delete_success): ?>

    <div class="delete-message">
        <?= htmlspecialchars($delete_success) ?>
    </div>

   <?php endif; ?>
    <table border="0" cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th>id</th>
          <th>title</th>
          <th>command</th>
          <th>image</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody id="demo">
        
      </tbody>
    </table>
  </div>

  <footer>
    <h1>Footer</h1>
  </footer>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="api.js"></script>
  <script>
 $(document).ready(function(){

    // CREATE
    $('#app-container').on('click', '#btn-create', function(e){

        e.preventDefault();

        $('#app-container').load('create.php');

    });


    // DELETE
    $('#app-container').on('click', '.btn-delete', function(e) {

    e.preventDefault();

    let id = $(this).data('id');

    console.log("Clicked ID:", id);

    if (confirm("Are you sure you want to delete this post?")) {

        deleteData(id);

    }

});
 


    loadData();

});
  </script>


</body>
</html>