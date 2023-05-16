<?php
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
        function checkAttendance(date) {
            // Chuyển đổi ngày sang định dạng cần so sánh
            var targetDate = moment(date).format('YYYY/MM/DD');

            // Kiểm tra nếu ngày là 16/05/2023 thì trả về true
            if (targetDate === '2023/05/16') {
                return true;
            }

            // Ngược lại, trả về false
            return false;
        }
        $('#calendar').fullCalendar({
            // Cấu hình và tùy chọn cho lịch
            dayRender: function (date, cell) {
                // Kiểm tra trạng thái đã điểm danh
                var isAttendance = checkAttendance(date);

                // Nếu đã điểm danh, thay đổi nội dung trong ô ngày
                if (isAttendance) {
                    cell.html('<div class="attendance"><span class="text-danger fw-bold">Đã điểm danh</span></div>');
                }
            }
        });


    });
</script>
</body>
</html>
