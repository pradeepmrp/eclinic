<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

			<title></title>
	</head>
	<body>
<?php
if(!isset($_SESSION['userid']))
{
	echo "Vui lòng đăng nhập thực hiện các chức năng";
}
else
{
	$lv=$_SESSION['level'];
	switch ($lv)
	{
		case 1://giam doc
			?>
			<ul>
				<li><a href="">Quản lý tài khoản nhân sự</a></li>
				<li><a href="">Quản lý doanh thu</a></li>
				<li><a href="">Quản lý và phân thuốc</a></li>
			</ul>
			<?php
			break;
		case 2://tiep nhan
			?>
			<ul>
				<li><a href="">Tạo tài khoản bệnh nhân</a></li>
				<li><a href="">Cập nhật thông tin bệnh nhân</a></li>
				<li><a href="">Lập lịch khám trong ngày</a></li>
				<li><a href="">Chuyển bệnh nhân vào lịch hẹn ngày hôm sau</a></li>
			</ul>
			<?php
			break;
		case 3://thanh toan
			?>
			<ul>
				<li><a href="">Thanh toán cho bệnh nhân</a></li>
				<li><a href="">Tra cứu doanh thu phòng khám</a></li>
				<li><a href="">Thống kê so sánh</a></li>
			</ul>
			<?php
			break;
		case 4://phat thuoc
			?>
			<ul>
				<li><a href="">Phát thuốc cho bệnh nhân</a></li>
				<li><a href="">Tra cứu tình hình thuốc trong kho</a></li>
				<li><a href="">Nhập thuốc m?i</a></li>
				<li><a href="">Cập nhật thuốc</a></li>
			</ul>
			<?php
			break;
		case 5://bac si
			?>
			<ul>
				<li><a href=''>Chọn bệnh nhân khám bệnh</a></li>
				<li><a href="">Ghi nhận tình hình khám bệnh của bệnh nhân</a></li>
				<li><a href="include/eClinic/LapToaThuoc.php" target="noidung">Kê toa thuốc và liều lượng sử dụng</a></li>
				<li><a href="">Chuyển bệnh nhân vào hàng đợi thanh toán</a></li>
			</ul>
			<?php
			break;
		default://benh nhan
			?>
			<ul>
				<li><a href="include/lichhenbs.php" target="noidung">Thông tin lịch hẹn</a></li>
				<li><a href="">Quá trình chữa bệnh</a></li>
				<li><a href="">Gửi yêu cầu đề nghị với bác sĩ</a></li>
			</ul>
			<?php
			break;
	}
}
?>
</body>
</html>
