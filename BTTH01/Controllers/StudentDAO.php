<?php

namespace Controllers;

use http\Env\Request;
use Models\Student;

//include_once __DIR__ . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'Student.php';

class StudentDAO
{
    public function create(Request $request)
    {
        $name = $request->name;
        $age = $request->age;

        $student = new Student();
        $student->setName($name);
        $student->setName($age);
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

    public function update(Request $request, $id)
    {
        $file_path = "C:/xampp/htdocs/CSE485_2023/BTTH01/data.txt";
        $file = fopen($file_path, 'r+');
        if ($file) {
            while (($line = fgets($file)) != false) {
                $data = explode(',', $line);
                if ($data[0] == $id) {
                    $newData = $id . ', ' . $data[1] . ', ' . $data[2];
                    fseek($file, -strlen($line), SEEK_CUR);
                    fwrite($file, $newData);
                    break;
                }
            }
            fclose($file);
        }

    }

    public function delete($id)
    {
        $file_path = "C:/xampp/htdocs/CSE485_2023/BTTH01/data.txt";
        $file = fopen($file_path, 'r+');
        if ($file) {
            while (($line = fgets($file)) != false) {
                $data = explode(',', $line);
                if ($data[0] == $id) {
                    fseek($file, -strlen($line), SEEK_CUR);
                    ftruncate($file, ftell($file));
                    break;
                }
            }
            fclose($file);
        }

    }
}

