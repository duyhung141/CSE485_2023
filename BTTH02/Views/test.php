<?php
include_once '../Controllers/studentController.php';
include_once '../Controllers/attendanceController.php';
$studentController = new StudentController();
$data = $studentController->getAll();
print_r($data);
echo '<br/>';
$attendanceController = new AttendanceController();
$attendance = $attendanceController->getAttendance(2);
print_r($attendance);
?>