


<?php

session_start();
require_once '../middleware/authmidleware.php';



    requireLogin();
    requireClient();
?>
<main>
    <h1><?=  $_SESSION['username']  ?> Dashboard</h1>
    <a href="../auth/logout.php">logout</a>
</main>