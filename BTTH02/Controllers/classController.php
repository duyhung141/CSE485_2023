<?php
include_once "../Models/ConnectDatabase.php";
class ClassController{
    public function getAll($id)
    {
        $pdo = new ConnectDatabase();
        $conn=$pdo->getConnection();
        $sql = "SELECT * from classes where course_id = $id";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>
