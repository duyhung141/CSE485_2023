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
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php include_once "Components/header.php"; ?>
<div class="container">
    <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
        <div class="list-group w-75">
            <?php foreach ($classes as $class) { ?>
                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <p class="mb-0 opacity-75">ATTENDANCE</p>
                            <h6 class="mb-0"><?php echo $class['name'] ?></h6>
                        </div>
                    </div>
                </a>
            <?php } ?>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown Example
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
