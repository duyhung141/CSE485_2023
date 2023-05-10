<?php

use Controllers\StudentDAO;

include_once '../Models/Student.php';
include_once '../Controllers/StudentDAO.php';

$studentDAO = new StudentDAO();
$message = '';

$studentDAO = new StudentDAO();
$message = '';

if(isset($_POST['btnAdd'])){
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);

    //check rong
    if(!empty($name) && !empty($age)){
        $studentDAO->create($_POST);
        $message = "<h2 style='color: red'>Successfully added new!</h2>";
    } else {
        $message = "<h2 style='color: red'> Please complete all information </h2>";
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
<div class="wrapper" style="width: 600px; margin: 0 auto">
    <?php echo $message; ?>
    <div class="container-fluid"
    <div
    ="row">
    <div class="col-md-12">
        <h2 class="mt-5">Create Student</h2>
        <p>Please fill this form and submit to add employee record to the database.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group" style="padding-bottom: 10px;">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group" style="padding-bottom: 15px"
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age">
    </div>

    <button type="submit" class="btn btn-primary" name="btnAdd">Submit</button>
    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
    </form>
</div>
</div>
</div>
</div>
</body>
</html>
