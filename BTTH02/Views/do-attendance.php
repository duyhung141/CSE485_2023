<?php
session_start();
include_once "../Controllers/attendanceController.php";
echo "course_id ". $_POST['course_id'];
if (isset($_POST['class_id'])&&isset($_POST['course_id'])) {
    $class_id = $_POST['class_id'];
    $course_id = $_POST['course_id'];
    $user_id = $_SESSION['user_id'];
    $attendanceController = new AttendanceController();
    $attendanceController->doAttendance($class_id, $user_id,$course_id);
    header("Location:attendance.php");
}
?>
