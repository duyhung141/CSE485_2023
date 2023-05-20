<?php
include_once "../Models/ConnectDatabase.php";
class ClassController{
    public function getAll()
    {
        $pdo = new ConnectDatabase();
        $conn=$pdo->getConnection();
        $sql = "SELECT * from classes";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>
