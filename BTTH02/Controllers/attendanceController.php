<?php
include_once 'studentController.php';
include_once '../Models/ConnectDatabase.php';
class AttendanceController{
    public function getAttendance($id)
    {
        $studentController = new StudentController();
        $student=$studentController->getStudent($id);
        $studentId = $studentController->getStudentIdbyIdUser($id);
        $pdo = new ConnectDatabase();
        $conn = $pdo->getConnection();
        $sql = "SELECT date FROM attendance WHERE student_id=? and is_absent=0";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$studentId]); // Sử dụng $studentId thay vì $id
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>
