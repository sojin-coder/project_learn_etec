


<?php

session_start();
require_once '../middleware/authmidleware.php';



requireLogin();
    requireAdmin();
?>
<main>
    <h1><?=  $_SESSION['username']  ?> Dashboard</h1>
    <a href="../auth/logout.php">logout</a>
</main>