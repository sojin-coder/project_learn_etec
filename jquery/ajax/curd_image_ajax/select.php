<?php

require_once './db.php';

$posts = $conn->query('SELECT * FROM posts ORDER BY id DESC');

while ($row = $posts->fetch_assoc()):
?>

    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['command'] ?></td>

        <td>
            <img src="uploads/<?= $row['image'] ?>" width="100">
        </td>

        <td>
            <a href="test.php?id=<?= $row['id'] ?>" class="btn-edit">
                edit
            </a>

            <a href="" class="btn-delete" data-id="<?= $row['id'] ?>">
                delete
            </a>
        </td>
    </tr>

<?php endwhile; ?>