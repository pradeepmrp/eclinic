<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

			<title></title>
	</head>
	<body>
<?php
include 'db.inc';
echo "Xin chào,";
$id=$_SESSION['userid'];
$lv=$_SESSION['level'];

if($lv=="6")
{
	$table="benhnhan";
}
else
	$table="nhanvien";
$sql="select * from $table where MaTK='".$id."'";
$result=mysql_query($sql,$link);
$row=mysql_fetch_array($result);	
echo $row['HoTen'];
echo "<br/>";
echo "[<a href='include/thongtin_user.php?userid=$id&lv=$lv' target='noidung'>Thông tin cá nhân</a>]";
echo "[<a href='include/logout.php'>Thoát</a>]";
//session_destroy();
?> 
</body>
</html>
