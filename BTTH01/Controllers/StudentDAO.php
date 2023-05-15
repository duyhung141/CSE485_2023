<?php

namespace Controllers;

use http\Env\Request;
use Models\Student;

//include_once __DIR__ . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Student.php';

class StudentDAO
{
    public function create(array $request)
    {
        $file_path = "C:/xampp/htdocs/CSE485_2023/BTTH01/data.txt";
        $file = fopen($file_path, 'a+');

        $lines = file($file_path);
        $last_line = $lines[count($lines) - 1];
        $row = explode(",", $last_line);

        $id = $row[0] + 1;
        $name = $request['name'];
        $age = $request['age'];

        $data = "$id,$name,$age\n";
        fwrite($file, $data);
        fclose($file);
    }

    public function read()
    {
        $file_path = "C:/xampp/htdocs/CSE485_2023/BTTH01/data.txt";
        $file = fopen($file_path, 'r');
        if ($file) {
            while (($line = fgets($file)) != false) {
                echo $line . "</br>";
            }
        }
        fclose($file);
    }

    public function getAll()
    {
        $file_path = "C:/xampp/htdocs/CSE485_2023/BTTH01/data.txt";
        $file = fopen($file_path, 'r');
        $students = [];
        if ($file) {
            fgets($file);
            while (($line = fgets($file)) != false) {
                $data = explode(',', $line);
                $id = $data[0];
                $name = $data[1];
                $age = $data[2];
                $student = new Student();
                $student->setId($id);
                $student->setName($name);
                $student->setAge($age);
                array_push($students, $student);
            }
            return $students;
        }
        fclose($file);
    }

    public function update($request)
    {
        $id = $request->getId();
        $file_path = "C:/xampp/htdocs/CSE485_2023/BTTH01/data.txt";
        $file = fopen($file_path, 'r+');
        if (!$file) {
            die("Failed to open file!");
        }
        $lines = [];
        while (($line = fgets($file)) != false) {
            $lines[] = $line;
        }
        for ($i = 0; $i < count($lines); $i++) {
            $data = explode(',', $lines[$i]);
            if ($data[0] == $id) {
                $lines[$i] = $id . ',' . $request->getName() . ',' . $request->getAge() . "\n";
                break;
            }
        }

        rewind($file);
        foreach ($lines as $line) {
            fwrite($file, $line);
        }
        fclose($file);
    }


    public function delete($id)
    {
        $file_path = "C:/xampp/htdocs/CSE485_2023/BTTH01/data.txt";
        $file = fopen($file_path, 'r+');
        if ($file) {
            $data = array();
            while (($line = fgets($file)) != false) {
                $line = trim($line);
                $row = explode(',', $line);
                if ($row[0] != $id) {
                    $data[] = $line;
                }
            }
            ftruncate($file, 0); // Xóa toàn bộ nội dung của file
            rewind($file); // Đặt con trỏ file ở đầu file
            foreach ($data as $line) {
                fwrite($file, $line . PHP_EOL);
            }
            fclose($file);
        }
    }

    public function findById($id)
    {
        $students = $this->getAll();
        foreach ($students as $student) {
            if ($student->getId() == $id) {
                return $student;
                break;
            }
        }
    }

}

