<!DOCTYPE html>
<html>
<head>
    <title>Xóa bản ghi</title>
</head>
<body>
<?php
// Kiểm tra xem có tham số "id" trên URL hay không
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Kết nối tới cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "username", "password", "database_name");

    // Kiểm tra kết nối
    if(!$conn) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Xóa bản ghi trong cơ sở dữ liệu
    $sql = "DELETE FROM table_name WHERE id = $id";
    if(mysqli_query($conn, $sql)) {
        echo "Bản ghi đã được xóa thành công!";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    // Đóng kết nối
    mysqli_close($conn);
}
?>
<h1>Xác nhận xóa bản ghi</h1>
<p>Bạn có chắc chắn muốn xóa bản ghi này?</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <input type="submit" value="Xóa">
    <a href="index.php">Hủy bỏ</a>
</form>
</body>
</html>