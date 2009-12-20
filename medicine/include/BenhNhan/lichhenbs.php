<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

			<title></title>
	</head>
	<body>
<table class="table1" cellpadding="5" cellspacing="5">
<tr><td colspan="3"><h1>LỊCH KHÁM CHỮA BỆNH</h1></td></tr>
<?php
include '../connection.php';
session_start();
$id=$_SESSION['userid'];
$sql="select * from BENHNHAN where MaTK=".$id;
$result=mysql_query($sql,$link);
$row=mysql_fetch_array($result);
$sql="select * from LICHHENKCB where MaBN=".$row['MaBN'];
$result=mysql_query($sql,$link);
if($row=mysql_fetch_array($result))
{
 echo "<tr><td><b>Ngày hẹn khám</b></td><td>:</td><td>".$row['NgayHenKham']."</td></tr>";
echo "<tr><td><b>Phòng khám</b></td><td>:</td><td>".$row['PhongKham']."</td></tr>";

echo "<tr><td><b>Giờ khám</b></td><td>:</td><td>".$row['GioKham']."</td></tr>";

echo "<tr><td><b>Ghi chú</b></td><td>:</td><td>".$row['GhiChu']."</td></tr>";
}
else	echo "<tr><td>Không có lịch hẹn với bác sĩ</td></tr>";
?>

</table>
</body>
</html>
