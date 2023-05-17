<?php


class ConnectDatabase
{
    private $host = 'localhost';
    private $dbname = 'cse485';
    private $username = 'root';
    private $password = '';

    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        } catch (Exception $e) {
            die("Could not connect to the database $this->dbname :" . $e->getMessage());
        }
    }
}
?>

