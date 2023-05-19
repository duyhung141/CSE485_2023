<?php
include_once '../Models/ConnectDatabase.php';
class CourseController
{
    public function getAll()
    {
        $pdo = new ConnectDatabase();
        $conn = $pdo->getConnection();
        $sql = "SELECT * FROM courses";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}