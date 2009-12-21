<?php
	include "../utility.php";
	//page_load
	
	function KhoangThoiGian($tuNgay,$denNgay)
	{
		include "../../db.inc";
		$tuNgay=ChangeFormatDate($tuNgay);
		$denNgay=ChangeFormatDate($denNgay);
		$query="SELECT count(*) as soluongbn,sum((ct.SoLuong * th.Gia)) AS DoanhThu ".
			" from ChiTietToaThuoc ct,ToaThuoc toa,Thuoc th,LoaiThuoc lt,phieukcb phieu,benhnhan bn ".
			" where ct.MaToaThuoc=toa.MaToaThuoc and th.MaThuoc=ct.MaThuoc and lt.MaLoaiThuoc=th.MaLoaiThuoc ".
			" and phieu.maphieukcb=toa.maphieukcb and bn.mabn=phieu.mabn ".
			" and toa.NgayLap>='$tuNgay' and toa.NgayLap<='$denNgay' ";
		$result=mysql_query($query,$link);
		$row=mysql_fetch_array($result,MYSQL_BOTH);
		echo "<table>";
		echo "<tr>";
		echo "<td>Số Lượng Bệnh Nhân</td>";
		echo "<td>Doanh Thu</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>".$row['soluongbn']."</td>";
		echo "<td>".$row['DoanhThu']."</td>";
		echo "</tr>";
		echo "</table>";
		
	}
?>