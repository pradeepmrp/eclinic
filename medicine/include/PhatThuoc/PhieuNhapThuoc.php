<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table>
	<tr>
		<td>
		<input type="button" value="Thêm Mới" onclick="window.location='PhieuNhapThuoc_Them.php'" />
		</td>
	</tr>
</table>
<h3 align="center">Quản Lý Phiếu Nhập Thuốc</h3>

<table width="90%">
	<tr style="font-weight:bold">
		<td>
			Mã Phiếu Nhập
		</td>
		<td>
			Ngày Nhập
		</td>
	</tr>
	<?php
		include "../db.inc";
		$maKho=1;// sua lai khi lam login
		$query="select DISTINCT  pn.MaPhieuNhap,pn.NgayNhap from PhieuNhapKho pn,ChiTietPhieuNhap ct ".
			" where pn.MaPhieuNhap=ct.MaPhieuNhap and ct.MaKho=$maKho";
		$result=mysql_query($query,$link);
		while($row=mysql_fetch_array($result,MYSQL_BOTH))
		{
			echo "<tr>";
			echo "<td><a href=\"PhieuNhapThuoc_ChiTiet.php?id=".$row["MaPhieuNhap"]."\" />".$row["MaPhieuNhap"]."</td>";
			echo "<td>".date("d/m/Y",strtotime($row["NgayNhap"]))."</td>";
			echo "</tr>";
		}
	?>
</table>
</body>
</html>
