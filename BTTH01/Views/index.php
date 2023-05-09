<?php

use Controllers\StudentDAO;

include_once '../Models/Student.php';
include_once '../Controllers/StudentDAO.php';

$studentDAO = new StudentDAO();
$students = $studentDAO->getAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>BTTH01</title>
</head>
<body>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($students as $student) {
            ?>
            <tr>
                <td><?php echo $student->getId() ?></td>
                <td><?php echo $student->getName() ?></td>
                <td><?php echo $student->getAge() ?></td>
                <td>
                    <form action="update-student.php" method="POST" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $student->getId() ?>">
                        <button type="submit" class="btn btn-warning">Sửa</button>
                    </form>
                    <form action="delete-student.php" method="POST" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $student->getId() ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">
                            Xóa
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
