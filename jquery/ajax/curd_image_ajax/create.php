<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post · dark interface</title>
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
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }

    /* main card – glassmorphism */
    .create-card {
      max-width: 680px;
      margin: auto;
      width: 100%;
      background: rgba(20, 20, 28, 0.8);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border-radius: 2.8rem;
      padding: 2.5rem 2.8rem 3rem;
      box-shadow: 0 30px 50px -18px rgba(0, 0, 0, 0.9), 0 0 0 1px rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(255, 255, 255, 0.03);
      transition: all 0.2s ease;
    }

    /* header area: title + back link */
    .create-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 2rem;
      border-bottom: 1px solid #282b36;
      padding-bottom: 1.2rem;
    }

    .create-header h1 {
      font-weight: 600;
      font-size: 2rem;
      letter-spacing: -0.02em;
      background: linear-gradient(145deg, #f0f2f7, #bcc3d4);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      display: inline-block;
    }

    .back-link {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      background: #252833;
      color: #cdd3e0;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.9rem;
      padding: 0.4rem 1.2rem;
      border-radius: 60px;
      border: 1px solid #363a47;
      transition: all 0.2s ease;
      letter-spacing: 0.2px;
    }

    .back-link:hover {
      background: #323644;
      border-color: #5c637a;
      color: #ffffff;
      box-shadow: 0 0 12px rgba(90, 100, 160, 0.15);
      transform: scale(1.02);
    }

    /* form elements */
    #formPost {
      display: flex;
      flex-direction: column;
      gap: 1.4rem;
    }

    #formPost input[type="text"] {
      background: #161a22;
      border: 1px solid #2b2f3b;
      border-radius: 60px;
      padding: 0.9rem 1.6rem;
      font-size: 1rem;
      font-family: 'Inter', sans-serif;
      color: #e5e8ef;
      outline: none;
      transition: all 0.2s ease;
      width: 100%;
      box-shadow: inset 0 2px 6px rgba(0,0,0,0.4);
    }

    #formPost input[type="text"]:focus {
      border-color: #6a7290;
      background: #1b1f2b;
      box-shadow: 0 0 0 3px rgba(100, 120, 200, 0.15), inset 0 2px 6px rgba(0,0,0,0.5);
    }

    #formPost input[type="text"]::placeholder {
      color: #6c748b;
      font-weight: 400;
      opacity: 0.7;
    }

    /* file input – custom styled */
    .file-wrapper {
      display: flex;
      align-items: center;
      gap: 1rem;
      flex-wrap: wrap;
    }

    .file-label {
      background: #222632;
      border: 1px solid #353a48;
      border-radius: 60px;
      padding: 0.6rem 1.8rem;
      font-size: 0.9rem;
      font-weight: 500;
      color: #c8cedd;
      cursor: pointer;
      transition: all 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      box-shadow: inset 0 1px 3px rgba(0,0,0,0.3);
    }

    .file-label:hover {
      background: #2f3444;
      border-color: #5b637d;
      color: white;
    }

    #formPost input[type="file"] {
      display: none;
    }

    .file-name {
      color: #9aa2b7;
      font-size: 0.9rem;
      padding: 0.2rem 0.4rem;
      background: #13161f;
      border-radius: 40px;
      padding: 0.3rem 1rem;
      border: 1px solid #2a2e3b;
    }

    /* image preview */
    .preview-container {
      margin: 0.2rem 0 0.2rem;
      display: flex;
      justify-content: center;
    }

    #formPost img {
      max-width: 140px;
      max-height: 140px;
      border-radius: 1.2rem;
      background: #11141d;
      border: 1px solid #2f3342;
      box-shadow: 0 6px 14px rgba(0, 0, 0, 0.6);
      object-fit: cover;
      display: block;
      padding: 0.3rem;
      background: #1b1e28;
      transition: all 0.2s;
    }

    /* buttons row */
    .button-group {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-top: 0.6rem;
      align-items: center;
    }

    .btn-submit {
      background: #2f3446;
      border: none;
      border-radius: 60px;
      padding: 0.8rem 2.6rem;
      font-weight: 600;
      font-size: 1rem;
      color: #e8ebf3;
      cursor: pointer;
      border: 1px solid #474d62;
      transition: all 0.2s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
      letter-spacing: 0.3px;
      flex: 1 1 auto;
    }

    .btn-submit:hover {
      background: #3d435b;
      border-color: #6b748f;
      transform: scale(1.02);
      box-shadow: 0 0 18px rgba(100, 120, 200, 0.2);
      color: white;
    }

    .btn-clear {
      background: #1f222d;
      border: 1px solid #343846;
      border-radius: 60px;
      padding: 0.8rem 2rem;
      font-weight: 500;
      font-size: 0.95rem;
      color: #b6bdd0;
      cursor: pointer;
      transition: all 0.2s ease;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }

    .btn-clear:hover {
      background: #2c303e;
      border-color: #585f78;
      color: #eef0f7;
      box-shadow: 0 0 10px rgba(80, 90, 140, 0.1);
    }

    /* responsive */
    @media (max-width: 550px) {
      .create-card { padding: 1.8rem 1.2rem 2rem; border-radius: 2rem; }
      .create-header { flex-direction: column; align-items: flex-start; gap: 0.8rem; }
      .button-group { flex-direction: column; }
      .btn-submit, .btn-clear { width: 100%; justify-content: center; }
    }

    /* small extra for the back link icon */
    .back-link::before {
      content: "←";
      font-weight: 300;
      margin-right: 0.2rem;
      opacity: 0.7;
    }

    
    img[src=""] {
      display: none;
    }

   
    img:not([src=""]):not([src="#"]) {
      display: block;
    }
  </style>
</head>
<body>
  <div class="create-card">
    
    <div class="create-header">
      <h1>✧ Create Post</h1>
      <a href="./index.php" class="back-link">back</a>
    </div>

   
    <form id="formPost" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="title">
      <input type="text" name="command" placeholder="command">

     
      <div class="file-wrapper">
        <label for="imageInput" class="file-label">📎 choose image</label>
        <input type="file" name="image" id="imageInput" onchange="handleChange(this)">
         <img id="preview" width="100"> <br>
        <!-- <span class="file-name" id="fileDisplay">no file</span> -->
      </div>
     
      <div class="button-group">
        <button type="submit" class="btn-submit">↗ post</button>
        <button type="button" id="clearCreateBtn" class="btn-clear">✕ clear form</button>
      </div>
    </form>
  </div>

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="api.js"></script>

  <script>
    // ===== old code
    $(document).ready(function(){
        $('#formPost').submit(function(e){
            e.preventDefault();

            createData();
        })

         $('#clearCreateBtn').click(function(){
               $('#preview').attr('src','');
               $('#formPost')[0].reset();

          });
       
     })

  
  </script>
  <script>
    let preview = document.getElementById('preview');
    function handleChange(input){
        let file = input.files[0];

        if(file){
            preview.src = URL.createObjectURL(file)
        }
    }
</script>
</body>
</html>