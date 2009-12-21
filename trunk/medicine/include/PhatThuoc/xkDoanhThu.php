<?php
	include "../utility.php";
	$tuNgay=ChangeFormatDate($_REQUEST['tuNgay']);
	$denNgay=ChangeFormatDate($_REQUEST['denNgay']);
	ThongKe($tuNgay,$denNgay);
	
	function ThongKe($tuNgay,$denNgay)
	{
		include "../../db.inc";
		$query="SELECT th.TenThuoc, lt.TenLoaiThuoc, ct.SoLuong, th.Gia, toa.NgayLap,(ct.SoLuong * th.Gia) AS Tong ".
			" from ChiTietToaThuoc ct,ToaThuoc toa,Thuoc th,LoaiThuoc lt ".
			" where ct.MaToaThuoc=toa.MaToaThuoc and th.MaThuoc=ct.MaThuoc and lt.MaLoaiThuoc=th.MaLoaiThuoc ".
			" and toa.NgayLap>='$tuNgay' and toa.NgayLap<='$denNgay' ".
			" order by toa.NgayLap asc ";
		$result=mysql_query($query,$link);
		echo "<table width=\"100%\" >";
		echo "<tr style=\"font-weight:bold;\" >";
		echo "<td>Tên Thuốc</td>";
		echo "<td>Loại Thuốc</td>";
		echo "<td>Số Lượng</td>";
		echo "<td>Ngày Bán</td>";		
		echo "<td align='right'>Giá</td>";
		echo "<td align='right'>Tổng</td>";
		echo "</tr>";
		$tong=0;
		while($row=mysql_fetch_array($result,MYSQL_BOTH))
		{
			echo "<tr>";
			echo "<td>".$row["TenThuoc"]."</td>";
			echo "<td>".$row["TenLoaiThuoc"]."</td>";
			echo "<td>".$row["SoLuong"]."</td>";
			echo "<td>".$row["NgayLap"]."</td>";
			echo "<td align='right'>".$row["Gia"]."</td>";
			echo "<td align='right'>".$row["Tong"]."</td>";
			$tong+=$row["Tong"];
			echo "</tr>";
			
		}
		echo "<tr style=\"font-weight:bold;\">";
		echo "<td colspan='5'></td>";
		echo "<td align='right'>Tổng: ".$tong."</td>";
		echo "</tr>";
		echo "</table>";
	}
?>