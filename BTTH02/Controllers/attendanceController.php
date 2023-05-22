<?php
include_once 'studentController.php';
include_once '../Models/ConnectDatabase.php';
include_once '../Controllers/classController.php';
include_once '../Controllers/studentController.php';

class AttendanceController
{
    public function getAttendance($id,$class_id)
    {
        $studentController = new StudentController();
        $studentId = $studentController->getStudentIdbyIdUser($id);
        $pdo = new ConnectDatabase();
        $conn = $pdo->getConnection();
        $sql = "SELECT date FROM attendance WHERE student_id=? and class_id=? and is_absent=0";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$studentId,$class_id]);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function checkBeforeDoAttendance($class_id, $user_id)
    {
        $studentController = new StudentController();

    }

    public function doAttendance($class_id, $user_id, $course_id)
    {
        //can them getCourseByClassId
        $studentController = new StudentController();
        $studentId = $studentController->getStudentIdbyIdUser($user_id);

        if ($studentController->isStudentInClass($class_id, $user_id)) {
            $pdo = new ConnectDatabase();
            $conn = $pdo->getConnection();

            $date = date('Y-m-d');

            $sql = "INSERT INTO attendance (course_id, student_id, date, class_id) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$course_id, $studentId, $date, $class_id]);
        }
    }

}

?>
