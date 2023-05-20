<?php
include_once "../Controllers/classController.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location:login.php');
}
$id = -1;
if (!isset($_GET['id'])) {
    header('Location:error.php');

} else {
    $id = $_GET['id'];
}

$classController = new ClassController();
$classes = $classController->getAll($id);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php include_once "Components/header.php"; ?>
<div class="container">
    <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
        <div class="list-group w-75">
            <?php foreach ($classes as $class) { ?>
                <div class="list-group-item d-flex gap-3 py-3">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <p class="mb-0 opacity-75">ATTENDANCE </p>
                            <h6 class="mb-0"><?php echo $class['name'] ?></h6>
                        </div>
                        <form action="do-attendance.php" method="POST">
                            <input type="text" name="class_id" value="<?php echo $class['id'];?>" hidden>
                            <input type="text" name="course_id" value="<?php echo $class['course_id'];?>" hidden>
                            <button type="submit" class="btn btn-info">Điểm danh</button>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
