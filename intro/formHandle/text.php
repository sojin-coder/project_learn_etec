<?php

session_start();  //Session គឺជាកន្លែងរក្សាទុកទិន្នន័យបណ្តោះអាសន្ននៅ Server


$data = isset($_SESSION['students']) ? $_SESSION['students'] : [];  //បើ $_SESSION['students'] មានទិន្នន័យយកវាមកដាក់ក្នុង $dataបើមិនមានបង្កើត Array ទទេ []

if(isset($_POST['submit'])){

  
    $data[] = [
        "name" => $_POST['fullname'],
        "gender" => isset($_POST['gender']) ? $_POST['gender'] : 'Not Specified', // ការពារកំហុសករណីមិនបានធិកយកភេទ
        "email" => $_POST['email'],
        "password" => $_POST['password'],
        "confirm" => $_POST['cm_password']
    ];
    $_SESSION['students'] = $data;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Show Data Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- Form -->
    <div class="card shadow mb-5">
        <div class="card-header bg-primary text-white">
            <h4>Student Registration Form</h4>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Gender</label><br>
                    <input type="radio" name="gender" value="Male" checked> Male
                    <input type="radio" name="gender" value="Female"> Female
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="cm_password" class="form-control" required>
                </div>


                <button name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow">
        <div class="card-body">
            <h2 class="text-center text-primary">Show Data in Table</h2>
            <p class="text-center">Submitted registration data</p>

            <table class="table table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Confirm Password</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php if($data != []): ?>
                    <?php foreach($data as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['gender']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <!-- <td><?= htmlspecialchars($row['password']) ?></td>
                            <td><?= htmlspecialchars($row['confirm']) ?></td> -->
                            <td>********</td>
                            <td>********</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-muted">Data not found</td>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>