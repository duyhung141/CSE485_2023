<?php
//use Controllers\StudentDAO;
//include_once '../Controllers/StudentDAO.php';
//require_once("C:/xampp/htdocs/CSE485_2023/BTTH01/data.txt");
//$data =array();
//$errors = array();
//
//$is_update = false;
//
//// Lấy chi tiết một sinh viên dựa vào sinh viên id
//function getStudent($student_id)
//{
//    // Lấy danh sách sinh viên để tìm
//    $studentDAO = new StudentDAO();
//    $students = $studentDAO->getAll();
//
//    // Duyệt qua từng phần tử, nếu xuất hiện ID giống nhau thì tức là đã tìm thấy sinh viên
//    foreach ($students as $item)
//    {
//        if ($item['student_id'] == $student_id){
//            return $item;
//        }
//    }
//
//    return array();
//}
//
//if(!empty($_Get['id'])) {
//    $data = getStudent($_GET['id']);
//    $is_update  = true;
//}
//
//// Nếu người dùng click vào nút submit
//if (!empty($_POST['add_student']))
//{
//
//    // Lấy thông tin
//    $data['student_id'] = isset($_POST['id']) ? $_POST['id'] : '';
//    $data['student_name'] = isset($_POST['name']) ? $_POST['name'] : '';
//    $data['student_age'] = isset($_POST['age']) ? $_POST['age'] : '';
//
//    // Validate
//    if (empty($data['student_id'])){
//        $errors['student_id'] = 'Ban chua nhap ID';
//    }
//
//    if (empty($data['student_name'])){
//        $errors['student_name'] = 'Ban chua nhap name';
//    }
//
//    if (empty($data['student_age'])){
//        $errors['student_age'] = 'Ban chua nhap Email';
//    }
//
//    //  Nếu dữ liệu hợp lệ thì thực hiện thao tác update thông tin
//    // đồng thời redirect về trang danh sách
//
//    if (empty($errors)){
//        update($data['student_id'], $data['student_name'], $data['student_age']);
//        header("Location:index.php");
//    }
//}
//?>
<?php
require_once ("C:/xampp/htdocs/CSE485_2023/BTTH01/data.txt");

$name = $age = "";
$name_err = $age_err = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Update Record</h2>
                <p>Please edit the input values and submit to update the employee record.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                        <span class="invalid-feedback"><?php echo $name_err;?></span>
                    </div>

                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                        <span class="invalid-feedback"><?php echo $age_err;?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

