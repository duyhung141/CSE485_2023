<?php
include_once '../Models/ConnectDatabase.php';
class StudentController
{
    public function getAll()
    {
        $pdo = new ConnectDatabase();
        $conn = $pdo->getConnection();
        $sql = "SELECT * FROM students";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    public function createStudent($data)
    {
        $pdo = new ConnectDatabase();
        $conn = $pdo->getConnection();
        $sql = "INSERT INTO students ('name','birth','contact','user_id') VALUES ('?,?,?,?')";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$data['name'], $data['birth'], $data['contact'], $data['user_id']]);
    }

    public function updateStudent($id)
    {

    }

    public function deleteStudent($id)
    {

    }

    public function getStudent($id)
    {
        $pdo = new ConnectDatabase();
        $conn = $pdo->getConnection();
        $sql = "SELECT * FROM students WHERE id=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$id]);
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}

?>