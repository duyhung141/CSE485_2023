<?php


use Models\Student;

class ConnectDatabase
{
    private $host = 'localhost';
    private $dbname = 'cse485';
    private $username = 'root';
    private $password = '';
    private $conn;
    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        } catch (Exception $e) {
            die("Could not connect to the database $this->dbname :" . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->conn;
    }

    public function executeQuery($sql){
        $dbConn = new ConnectDatabase();
        $conn = $dbConn->getConnection();
        $stmt = $conn->query($sql);

        $students = [];
        while ($row = $stmt->fetch()){
            $student = new Student($row['id'], $row['name'], $row['birth'], $row['contact'], $row['user_id']);
            array_push($students, $student);
        }
        return $students;
    }
}
?>

