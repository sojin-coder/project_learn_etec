<?php

require_once './db.php';

$posts = $conn->query('SELECT * FROM posts');

?>
<?php while ($row = $posts->fetch_assoc()): ?>

    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['command'] ?></td>

        <td>
            <img src="<?= $row['image'] ?>" alt="<?= $row['title'] ?>" width="100px">
        </td>
        <td>
            <button onclick='editRecode(<?= $row["id"] ?>)'>edit</button>
            <button onclick='deleteRecode(<?= $row["id"] ?>)'>delete</button>
        </td>
    </tr>

<?php endwhile; ?>

