<?php
    require_once "../middleware/authmidleware.php";

    requireLogin();
    requireAdmin();
?>
<main>
    <h1>Admin Dashboard</h1>
    <a href="../auth/logout.php">logout</a>
</main>