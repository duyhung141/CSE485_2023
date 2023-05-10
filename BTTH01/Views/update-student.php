<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Student</title>
</head>
<body>
<div class="wrapper" style="width: 600px; margin: 0 auto">
    <div class="container-fluid"
    <div="row">
    <div class="col-md-12">
        <h2 class="mt-5">Update Student</h2>
        <p>Please edit the input values and submit to update the employee record.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class = "form-group" style="padding-bottom: 10px;">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="Student-Name">
            </div>
            <div class = "form-group" style="padding-bottom: 15px"
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="Student-Age">
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
