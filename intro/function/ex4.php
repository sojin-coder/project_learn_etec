<?php 

$result = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $math = $_POST['m'];
    $khmer = $_POST['k'];
    $english = $_POST['e'];
    $physics = $_POST['p'];
    $chemistry = $_POST['c'];
    $biology = $_POST['b'];
    $earth = $_POST['ea'];


    function calculate_total($math, $khmer, $english, $physics, $chemistry, $biology, $earth) {
        $total = $math + $khmer + $english + $physics + $chemistry + $biology + $earth;
        $average = $total / 7;
        return ['total' => $total, 'average' => $average];
    }


    $calc = calculate_total($math, $khmer, $english, $physics, $chemistry, $biology, $earth);
    $total = $calc['total'];
    $average = $calc['average'];

   
    if ($average >= 90) {
        $grade = "A";
    } elseif ($average >= 80) {
        $grade = "B";
    } elseif ($average >= 70) {
        $grade = "C";
    } elseif ($average >= 60) {
        $grade = "D";
    } elseif ($average >= 50) {
        $grade = "E";
    } else {
        $grade = "F";
    }


    function student_info($name, $gender, $math, $khmer, $english, $physics, $chemistry, $biology, $earth, $total, $average, $grade) {
        return [
            "name" => $name,
            "gender" => $gender,
            "math" => $math,    
            "khmer" => $khmer,
            "english" => $english,
            "physics" => $physics,
            "chemistry" => $chemistry,
            "biology" => $biology,
            "earth" => $earth,
            "total" => $total,
            "average" => round($average, 2), 
            "grade" => $grade,
        ];
    }

    $result = student_info($name, $gender, $math, $khmer, $english, $physics, $chemistry, $biology, $earth, $total, $average, $grade);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <title>Student Grade Management</title>
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h2>Student Grade Management</h2>
                </div>

                <div class="card-body">

                    <form action="" method="post">

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Student Name</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Enter your name"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Math</label>
                                <input type="number" name="m" class="form-control" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Khmer</label>
                                <input type="number" name="k" class="form-control" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">English</label>
                                <input type="number" name="e" class="form-control" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Physics</label>
                                <input type="number" name="p" class="form-control" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Chemistry</label>
                                <input type="number" name="c" class="form-control" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Biology</label>
                                <input type="number" name="b" class="form-control" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Earth</label>
                                <input type="number" name="ea" class="form-control" required>
                            </div>

                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg">
                                Submit
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            <?php if($result !== null): ?>

            <div class="card shadow mt-4">

                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Student Result</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped text-center align-middle">

                            <thead class="table-dark">

                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Math</th>
                                <th>Khmer</th>
                                <th>English</th>
                                <th>Physics</th>
                                <th>Chemistry</th>
                                <th>Biology</th>
                                <th>Earth</th>
                                <th>Total</th>
                                <th>Average</th>
                                <th>Grade</th>
                            </tr>

                            </thead>

                            <tbody>

                            <tr>
                                <td><?= htmlspecialchars($result['name']) ?></td>
                                <td><?= $result['gender'] ?></td>
                                <td><?= $result['math'] ?></td>
                                <td><?= $result['khmer'] ?></td>
                                <td><?= $result['english'] ?></td>
                                <td><?= $result['physics'] ?></td>
                                <td><?= $result['chemistry'] ?></td>
                                <td><?= $result['biology'] ?></td>
                                <td><?= $result['earth'] ?></td>

                                <td class="fw-bold text-primary">
                                    <?= $result['total'] ?>
                                </td>

                                <td class="fw-bold text-success">
                                    <?= $result['average'] ?>
                                </td>

                                <td>
                                    <?php
                                    if($result['grade']=="A"){
                                        echo "<span class='badge bg-success fs-6'>A</span>";
                                    }elseif($result['grade']=="B"){
                                        echo "<span class='badge bg-primary fs-6'>B</span>";
                                    }elseif($result['grade']=="C"){
                                        echo "<span class='badge bg-info fs-6'>C</span>";
                                    }elseif($result['grade']=="D"){
                                        echo "<span class='badge bg-warning text-dark fs-6'>D</span>";
                                    }elseif($result['grade']=="E"){
                                        echo "<span class='badge bg-secondary fs-6'>E</span>";
                                    }else{
                                        echo "<span class='badge bg-danger fs-6'>F</span>";
                                    }
                                    ?>
                                </td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <?php endif; ?>

        </div>

    </div>

</div>

</body>
</html>