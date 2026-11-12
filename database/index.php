<?php
require_once 'db.php';

$result = $conn->query("SELECT * FROM students ORDER BY student_id DESC");
?>
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 30px;
        }

        .action-btn {
            display: inline-block;
            padding: 8px 16px;
            margin-bottom: 15px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            font-size: 14px;
        }

        .btn-add {
            background-color: #28a745;
        }

        .btn-add:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        thead {
            background-color: #007bff;
            color: #ffffff;
        }

        tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        tbody tr:nth-of-type(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-edit {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .btn-delete {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-edit:hover, .btn-delete:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<a class="action-btn btn-add" href="insert.php">+ Add New Student</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($student = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $student['student_id']; ?></td>
                <td><?php echo $student['student_name']; ?></td>
                <td><?php echo $student['student_phone']; ?></td>
                <td>
                    <a class="btn-edit" href="edit.php?id=<?= $student['student_id']; ?>">Edit</a>
                    <a class="btn-delete" href="delete.php?id=<?= $student['student_id']; ?>" onclick="return confirm('តើអ្នកពិតជាចង់លុបមែនទេ?');">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>