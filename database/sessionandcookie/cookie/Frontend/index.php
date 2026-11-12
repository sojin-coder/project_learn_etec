<?php
    require_once "../middleware/authmidleware.php";

    requireLogin();
    requireClient();
?>
<main>
    <h1>Client Dashboard</h1>
    <a href="../auth/logout.php">logout</a>
</main>