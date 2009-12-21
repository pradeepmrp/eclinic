<?php

	// page_load
	$tenThuoc=$_REQUEST['tenThuoc'];
	$loaiThuoc=$_REQUEST['loaiThuoc'];
	TimKiem($tenThuoc,$loaiThuoc);
	function TimKiem($tenThuoc,$loaiThuoc)
	{
		echo "<table width=\"100%\">";
		echo "<tr style=\"font-weight:bold;\">";
		echo "<td>Tên Thuốc</td>";
		echo "<td>Loại Thuốc</td>";
		echo "<td>Số Lượng</td>";
		echo "</tr>";
		include "../../db.inc";
		$maPhong=1;//--------------------
		$query="select th.TenThuoc,lt.TenLoaiThuoc,kh.SoLuong from Thuoc th,KhoThuoc kh,LoaiThuoc lt ".
			" where th.MaThuoc=kh.MaThuoc and lt.MaLoaiThuoc=th.MaLoaiThuoc and kh.MaPhong=$maPhong".
			" and th.TenThuoc like '%$tenThuoc%' and (lt.MaLoaiThuoc=$loaiThuoc or $loaiThuoc=0 )";
		$result=mysql_query($query,$link);
		while($row=mysql_fetch_array($result,MYSQL_BOTH))
		{
			echo "<tr>";
			echo "<td>".$row["TenThuoc"]."</td>";
			echo "<td>".$row["TenLoaiThuoc"]."</td>";
			echo "<td>".$row["SoLuong"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>