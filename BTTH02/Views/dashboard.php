<?php
include_once '../Controllers/attendanceController.php';
$attendanceController = new AttendanceController();
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location:login.php');
}
else{
    $id=$_SESSION['user_id'];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css"/>

    <title>Dashboard</title>
</head>
<body>
    <?php include_once 'Components/header.php'; ?>
<div class="container">
    <div id="calendar"></div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
    $(document).ready(function () {
        var data = <?php echo json_encode($attendanceController->getAttendance($id)); ?>;
        console.log(data);
        function checkAttendance(date) {
            var targetDate = moment(date).format('YYYY-MM-DD');

            // Duyệt qua từng phần tử trong mảng data
            for (var i = 0; i < data.length; i++) {
                var attendanceDate = moment(data[i].date).format('YYYY-MM-DD');

                // So sánh ngày hiện tại với ngày trong mảngS
                if (targetDate === attendanceDate) {
                    return true;
                }
            }

            return false;
        }

        $('#calendar').fullCalendar({
            dayRender: function (date, cell) {
                var isAttendance = checkAttendance(date);

                if (isAttendance) {
                    cell.html('<div class="attendance"><span class="text-danger fw-bold">Đã điểm danh</span></div>');
                }
            }
        });
    });
</script>
</body>
</html>
