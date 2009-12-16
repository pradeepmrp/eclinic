<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h3 align="center">Quản Lý Kho Thuốc</h3>
<table width="100%">
<tr style="font-weight:bold;">
	<td>Tên Thuốc</td>
	<td>Loại Thuốc</td>
	<td>Số Lượng</td>
</tr>
<?php
	include "../db.inc";
	$maPhong=1;//--------------------
	$query="select th.TenThuoc,lt.TenLoaiThuoc,kh.SoLuong from Thuoc th,KhoThuoc kh,LoaiThuoc lt ".
		" where th.MaThuoc=kh.MaThuoc and lt.MaLoaiThuoc=th.MaLoaiThuoc and kh.MaPhong=$maPhong";
	$result=mysql_query($query,$link);
	while($row=mysql_fetch_array($result,MYSQL_BOTH))
	{
		echo "<tr>";
		echo "<td>".$row["TenThuoc"]."</td>";
		echo "<td>".$row["TenLoaiThuoc"]."</td>";
		echo "<td>".$row["SoLuong"]."</td>";
		echo "</tr>";
	}
?>
</table>
</body>
</html>
