<?php
include_once "../Controllers/classController.php";
$classController = new ClassController();
$classes = $classController->getAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>attendance</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php include_once "Components/header.php"; ?>
<div class="container">
    <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center" >
        <div class="list-group w-75">
            <?php foreach ($classes as $class) {?>
            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3">
                <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32"
                     class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <p class="mb-0 opacity-75">ATTENDANCE</p>
                        <h6 class="mb-0"><?php echo $class['name']?></h6>
                    </div>
                    <small class="opacity-50 text-nowrap">now</small>
                </div>
            </a>
            <?php }?>
        </div>
    </div>
</div>
</body>
</html>
