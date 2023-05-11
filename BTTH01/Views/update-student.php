<?php

use Controllers\StudentDAO;
use Models\Student;

include_once '../Models/Student.php';
include_once '../Controllers/StudentDAO.php';

$studentDAO = new StudentDAO();
$data = new Student();
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $data = $studentDAO->findById($_POST["id"]);
}

if (isset($_POST['btnEdit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    // kiểm tra thông tin nhập vào có hợp lệ hay không
    if (!empty($name) && !empty($age)) {
        $data->setName($name);
        $data->setAge($age);
        $studentDAO->update($data);
//        $message = "<h2 style='color: red'>Successfully updated!</h2>";

    } else {
        $message = "<h2 style='color: red'>Please complete all information.</h2>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create Student</title>
</head>
<body>
<?php include_once "Components/header.php"?>

<div class="wrapper" style="width: 600px; margin: 0 auto">
    <?php echo $message; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">Update Student</h2>
                <p>Please fill this form and submit to add employee record to the database.</p>
                <form action="update-student.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data->getId(); ?>">
                    <div class="form-group" style="padding-bottom: 10px;">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="<?php echo $data->getName() ?>">
                    </div>
                    <div class="form-group" style="padding-bottom: 15px">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age"
                               value="<?php echo number_format($data->getAge()); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnEdit" onclick="return alert('Successfully update!')">Submit</button>
                    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
