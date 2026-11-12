<?php

require_once "db.php";

// Get all employees
$employees = $conn->query("SELECT * FROM employee ORDER BY id DESC");

$keySearch = trim($_GET['search'] ?? '');

$search_result = [];

if (!empty($keySearch)) {

    while ($emp = $employees->fetch_assoc()) {

        if (
            stripos($emp['username'], $keySearch) !== false ||
            stripos($emp['email'], $keySearch) !== false ||
            stripos($emp['pos'], $keySearch) !== false
        ) {
            $search_result[] = $emp;
        }
    }

} else {

    while ($emp = $employees->fetch_assoc()) {
        $search_result[] = $emp;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search Employee</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    >

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px 20px;
            background: #f4f7f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .container-custom {
            width: 100%;
            max-width: 1100px;
            margin: auto;
        }

        /* Header */
        .page-header {
            background: white;
            padding: 25px 30px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.07);
        }

        .page-header h1 {
            margin: 0;
            color: #2c3e50;
            font-size: 28px;
            font-weight: 700;
        }

        .page-header p {
            margin: 6px 0 0;
            color: #777;
        }

        /* Search Box */
        .search-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.07);
        }

        .search-form {
            display: flex;
            gap: 10px;
        }

        .search-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #dcdfe6;
            border-radius: 7px;
            outline: none;
            font-size: 15px;
            transition: 0.2s;
        }

        .search-input:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.15);
        }

        .btn-search {
            padding: 12px 22px;
            border: none;
            border-radius: 7px;
            background: #4a90e2;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-search:hover {
            background: #357abd;
        }

        .btn-refresh {
            padding: 12px 18px;
            border-radius: 7px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-refresh:hover {
            background: #5a6268;
            color: white;
        }

        /* Result */
        .result-info {
            margin-top: 15px;
            color: #666;
            font-size: 14px;
        }

        /* Table */
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.07);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px 15px;
            text-align: left;
            border-bottom: 1px solid #eef2f5;
        }

        th {
            background: #4a90e2;
            color: white;
            font-weight: 600;
            white-space: nowrap;
        }

        th:first-child {
            border-radius: 7px 0 0 0;
        }

        th:last-child {
            border-radius: 0 7px 0 0;
        }

        tbody tr {
            transition: 0.2s;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        td {
            color: #444;
            vertical-align: middle;
        }

        /* Action buttons */
        .btn-edit {
            display: inline-block;
            padding: 7px 10px;
            background: #ffc107;
            color: #222;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 4px;
        }

        .btn-edit:hover {
            background: #e0a800;
            color: #222;
        }

        .btn-delete {
            display: inline-block;
            padding: 7px 10px;
            background: #dc3545;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-delete:hover {
            background: #bb2d3b;
            color: white;
        }

        /* Empty */
        .no-result {
            text-align: center;
            padding: 35px;
            color: #888;
        }

        .no-result i {
            font-size: 35px;
            margin-bottom: 10px;
            color: #aaa;
        }

        /* Bottom */
        .bottom-link {
            margin-top: 20px;
        }

        .btn-add {
            display: inline-block;
            padding: 11px 18px;
            background: #198754;
            color: white;
            border-radius: 7px;
            text-decoration: none;
            font-weight: 600;
        }

        .btn-add:hover {
            background: #157347;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {

            body {
                padding: 20px 10px;
            }

            .search-form {
                flex-direction: column;
            }

            .btn-search,
            .btn-refresh {
                width: 100%;
                text-align: center;
            }

            .page-header h1 {
                font-size: 22px;
            }

            th,
            td {
                padding: 10px;
                font-size: 14px;
            }

        }

    </style>

</head>

<body>

<div class="container-custom">

    <div class="page-header">

        <h1>
            Employee Management
        </h1>

        <p>
            Search and manage your employees
        </p>

    </div>


    <div class="search-box">

        <form method="GET" class="search-form">

            <input
                type="text"
                name="search"
                class="search-input"
                value="<?= htmlspecialchars($keySearch) ?>"
                placeholder="Search name, email or position..."
            >

            <button type="submit" class="btn-search">
                <i class="fas fa-search"></i>
                Search
            </button>

            <a href="search.php" class="btn-refresh">
                <i class="fas fa-sync-alt"></i>
                Refresh
            </a>

        </form>

        

    </div>


    <!-- Table -->
    <div class="table-container">

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Salary</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

                <?php if (!empty($search_result)): ?>

                    <?php foreach ($search_result as $emp): ?>

                        <tr>

                            <td>
                                <?= $emp['id'] ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($emp['username']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($emp['gender']) ?>
                            </td>

                            <td>
                                $<?= number_format($emp['salary'], 2) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($emp['pos']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($emp['email']) ?>
                            </td>

                            <td>

                                <a
                                    href="edit.php?id=<?= $emp['id'] ?>"
                                    class="btn-edit"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a
                                    href="delete.php?id=<?= $emp['id'] ?>"
                                    class="btn-delete"
                                    onclick="return confirm('Are you sure you want to delete this employee?')"
                                >
                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="7" class="no-result">

                            <i class="fas fa-user-slash"></i>

                            <br>

                            No employee found

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>


    <!-- Add Employee -->
    <div class="bottom-link">

        <a href="post.php" class="btn-add">
            <i class="fas fa-plus"></i>
            Add Employee
        </a>

    </div>

</div>

</body>

</html>