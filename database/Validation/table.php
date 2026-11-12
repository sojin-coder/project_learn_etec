<?php
require_once 'db.php';

$employees = $conn->query("SELECT * FROM employee");

?>
 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 <style>
      
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 420px;
            margin-bottom: 40px;
        }

        
        h1, h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #2c3e50;
            text-align: center;
        }

        form h1 {
            border-bottom: 2px solid #eef2f5;
            padding-bottom: 12px;
        }

       
        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px 14px;
            margin-top: 6px;
            border: 1px solid #dcdfe6;
            border-radius: 6px;
            font-size: 0.95rem;
            background-color: #fafafa;
            transition: all 0.2s ease-in-out;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #4a90e2;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.15);
        }

     
        p {
            font-size: 0.85rem;
            min-height: 1.2rem;
            margin: 4px 0 12px 2px;
        }

        p[style*="color: red"],
        p[style*="color:red"] {
            color: #e74c3c !important;
            font-weight: 500;
        }

        p[style*="color: green"],
        p[style*="color:green"] {
            color: #2ecc71 !important;
            font-weight: 600;
            text-align: center;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background-color: #4a90e2;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        button[type="submit"]:hover {
            background-color: #357abd;
        }

        button[type="submit"]:active {
            transform: scale(0.99);
        }

       
        .table-container {
            width: 100%;
            max-width: 900px;
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eef2f5;
        }

        th {
            background-color: #4a90e2;
            color: #ffffff;
            font-weight: 600;
        }

        tr:hover {
            background-color: #f8fafc;
        }
    </style>
<body>
    
 <div class="table-container">
    <a href="search.php" class="btn btn-primary">
            Search
        </a>
        <h2>Employee List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Salary</th>
                    <th>Position</th>
                    <th>Email</th>
                    <th>Pwd</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
           
                    <?php while($emp = $employees->fetch_assoc()): ?>
                        <tr>
                            <td><?= $emp['id'] ?></td>
                            <td><?= htmlspecialchars($emp['username']) ?></td>
                            <td><?= htmlspecialchars($emp['gender']) ?></td>
                            <td>$<?= number_format($emp['salary'], 2) ?></td>
                            <td><?= htmlspecialchars($emp['pos']) ?></td>
                            <td><?= htmlspecialchars($emp['email']) ?></td>
                            <td><?= htmlspecialchars($emp['pwd']) ?></td>
                            <td>
                               
                                <a href="edit.php=id<?php echo $emp['id']; ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-edit"></i>
                                    
                                </a> 
                                <a href="?delete.php=<?php echo $emp['id']; ?>" class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Are you sure you want to remove this student from the course?')">
                                    <i class="fas fa-trash"></i>
                                </a> 
                            </td>
                        </tr>
                    <?php endwhile; ?>
               
            </tbody>
        </table>
        <a href="post.php" class="btn btn-warning mt-2 btn-sm">Add Employee</a>
    </div>
</body>