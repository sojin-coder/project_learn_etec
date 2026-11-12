
 <?php

   $posts = [
    [
        "id" => 1,
        "profile" => "https://i.pravatar.cc/150?img=1",
        "name" => "Raksa",
        "time" => "2 hrs ago",
        "caption" => "Today I learned Associative Arrays in PHP. 💻",
        "image" => "code.jpg",
        "likes" => 120,
        "comments" => 35,
        "shares" => 12
    ],

    [
        "id" => 2,
        "profile" => "https://i.pravatar.cc/150?img=2",
        "name" => "John",
        "time" => "5 hrs ago",
        "caption" => "Enjoying my coffee this morning ☕",
        "image" => "coffee_meet.jpg",
        "likes" => 89,
        "comments" => 10,
        "shares" => 5
    ],

    [
        "id" => 3,
        "profile" => "https://i.pravatar.cc/150?img=3",
        "name" => "Jane",
        "time" => "Yesterday",
        "caption" => "Beautiful sunset today 🌅",
        "image" => "sunset.jpg",
        "likes" => 256,
        "comments" => 48,
        "shares" => 20
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Document</title>
</head>
<style>
    
      
      body{
          background:#f0f2f5;
          padding:30px;
      }
      
      .container{
          max-width:700px;
          margin:auto;
          display:flex;
          flex-direction:column;
          gap:25px;
      }
      
      .card{
          background:#fff;
          border-radius:12px;
          overflow:hidden;
          box-shadow:0 2px 10px rgba(0,0,0,.15);
      }
      
      .header{
          display:flex;
          align-items:center;
          gap:12px;
          padding:15px;
      }
      
      .header img{
          width:50px;
          height:50px;
          border-radius:50%;
          object-fit:cover;
      }
      
      .header h3{
          font-size:18px;
      }
      
      .header span{
          font-size:14px;
          color:gray;
      }
      
      .caption{
          padding:0 15px 15px;
          line-height:1.5;
      }
      
      .post-image{
          width:100%;
          height:400px;
          object-fit:cover;
      }
      
      .footer{
          display:flex;
          justify-content:space-around;
          padding:15px;
          border-top:1px solid #ddd;
      }
      
      .footer button{
          width:100%;
          padding:10px;
          border:none;
          background:white;
          cursor:pointer;
          border-radius:8px;
          font-size:15px;
          transition:.3s;
      }
      
      .footer button:hover{
          background:#f0f2f5;
      }
      
      .status{
          display:flex;
          justify-content:space-between;
          padding:10px 15px;
          color:gray;
          font-size:14px;
      }
</style>
<body>

<div class="container">
   <?php foreach($posts as $post): ?>
      <div class="card">
         <div class="header">
            <img src="<?= $post['profile'] ?>" alt="<?=$post['profile'] ?>">
            <h3 class=""><?= $post['name'] ?></h3>
            <span><?= $post['time'] ?></span>

         </div>
         <div class="caption">
            <?= $post['caption'] ?>
         </div>
         <img src="image/<?=$post['image'] ?>" alt="<?=$post['name'] ?>" class ="post-image">
         <div class="status">
            <span><?=$post['likes'] ?> like</span>
            <span><?=$post['comments'] ?> comments</span>
            <span><?=$post['shares'] ?> shares</span>

         </div>
         <div class="footer">
            <button>👍 Like</button>
            <button>💬 Comment</button>
            <button>🔄️ Share</button>
         </div>

      </div>
   <?php endforeach ?>
 

</div>


</div>
</body>
</html>