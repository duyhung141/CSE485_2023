<?php
if(isset($_POST['btnLogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $conn = new PDO("mysql:host=localhost; dbname=cse485", 'root', '');

        if(empty($email) || empty($password)){
            echo "<script>alert('Please enter your email and pasword');</script>";
            exit();
        }
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $password]);

        if ($stmt->rowCount()==1){
            $user = $stmt->fetch();
            header("location:dashboard.php");
        }
    } catch(Exception $e){
        echo 'Error: '.$e->getMessage();
    }
}



//include_once '../Models/ConnectDatabase.php';
//function login($email,$password)
//{
//    private
//    $host = 'localhost';
//    private
//    $dbname = 'cse485';
//    private
//    $username = 'root';
//    private
//    $password = '';
//    try {
//        $pdo = new ConnectDatabase();
//        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password); // Gọi phương thức getConnection() để nhận kết nối PDO
//
//        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
//        $stmt = $conn->prepare($sql);
//        $stmt->execute([$email, $password]);
//        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        echo "Số bản ghi: " . $stmt->rowCount();
//        return $data;
//
//    } catch (PDOException $e) {
//        // Xử lý ngoại lệ khi có lỗi xảy ra
//        echo "Lỗi: " . $e->getMessage();
//    }
//}
//if(isset($_GET['btnLogin'])) {
//    $email = $_GET['email'];
//    $password = $_GET['password'];
//
//    // Kiểm tra đã nhập đủ tên đăng nhập và mật khẩu chưa
//    if (empty($email) || empty($password)) {
//        echo "<script>alert('Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu');</script>";
//        exit();
//    }
//    $data=login($email, $password);
//    echo "<script>console.log($data);</script>";
//
//}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="modal modal-sheet d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog"
         id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Login</h1>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control rounded-3" id="floatingInput"
                                   placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword"
                                   placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="" name="btnLogin">Login</button>
                    </form>
                    <hr class="my-4">
                    <form action="">
                        <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                            Forgot Password
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
