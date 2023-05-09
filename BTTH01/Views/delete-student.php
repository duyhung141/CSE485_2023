<?php
use Controllers\StudentDAO;

include_once '../Models/Student.php';
include_once '../Controllers/StudentDAO.php';

$studentDAO = new StudentDAO();

// Kiểm tra xem yêu cầu có phải là yêu cầu xóa hay không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    $studentDAO->delete($id);

    // Chuyển hướng về trang hiển thị danh sách các bản ghi
    header("Location: index.php");
    exit;
}

