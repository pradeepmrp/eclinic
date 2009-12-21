<?php
	include "../utility.php";
	// page load
	$act=$_REQUEST['act'];
	switch($act)
	{
		case "insert":
			$maPhieuNhap=ThemPhieuNhap();
			ThemChiTietPhieuNhap($maPhieuNhap);
			CapNhatKhoThuoc();
			echo $maPhieuNhap;
		break;
		case "show":
			$maPhieuNhap=$_REQUEST['maphieu'];
			HienThiDanhSach($maPhieuNhap);
		break;
		case "detail":
			$maPhieuNhap=$_REQUEST['maphieu'];
			XemChiTiet($maPhieuNhap);
		break;
		case "delete":
			$maPhieuNhap=$_REQUEST['mact'];
			Xoa($maPhieuNhap);
		break;
	}
	function ThemPhieuNhap()
	{
		include "../../db.inc";
		if($_REQUEST['maphieu']==0) // insert
		{
			$ngayNhan=$_REQUEST['ngayNhan'];
			$ngayNhan=ChangeFormatDate($ngayNhan);
			$query="insert into PhieuNhapKho(NgayNhap) values('$ngayNhan')";
			mysql_query($query,$link);
			// get current id
			$query="select MaPhieuNhap from PhieuNhapKho order by MaPhieuNhap desc limit 0,1";
			$result=mysql_query($query,$link);
			$row=mysql_fetch_row($result);
			$maPhieuNhap=$row[0];
			mysql_close($link);
		}
		else
			$maPhieuNhap=$_REQUEST['maphieu'];
		return $maPhieuNhap;
	}
	function ThemChiTietPhieuNhap($maPhieuNhap)
	{
		include "../../db.inc";
		$maKho=1; // chinh la ma phong cua taikhoan_phongphatthuoc
		$maThuoc=$_REQUEST['maThuoc'];
		$soLuong=$_REQUEST['soLuong'];
		$query="insert into ChiTietPhieuNhap(MaPhieuNhap,MaKho,Mathuoc,SoLuongNhap) ".
			" values($maPhieuNhap,$maKho,$maThuoc,$soLuong)";
		mysql_query($query,$link);
		mysql_close($link);
	}
	function CapNhatKhoThuoc()
	{
		include "../../db.inc";
		$maPhong=1; // chinh la ma phong cua taikhoan_phongphatthuoc
		$maThuoc=$_REQUEST['maThuoc'];
		$soLuong=$_REQUEST['soLuong'];
		// check exist
		$query="select MaPhong from KhoThuoc where MaPhong=$maPhong and MaThuoc=$maThuoc";
		$result=mysql_query($query);
		$row=mysql_fetch_row($result);
		if(isset($row[0])) // exist
		{
			$query="update KhoThuoc set SoLuong=SoLuong+$soLuong where MaPhong=$maPhong and MaThuoc=$maThuoc";
			mysql_query($query);
		}
		else // not exist
		{
			$query="insert into KhoThuoc(MaPhong,MaThuoc,SoLuong) values($maPhong,$maThuoc,$soLuong)";
			mysql_query($query,$link);
			
		}
	}
	function HienThiDanhSach($maPhieuNhap)
	{
		include "../../db.inc";
		$query="select ct.MaCTPhieuNhap,th.TenThuoc,ct.SoLuongNhap  from ChiTietPhieuNhap ct,Thuoc th ".
			" where ct.MaThuoc=th.MaThuoc and ct.MaPhieuNhap=$maPhieuNhap";
		$result=mysql_query($query,$link);
		echo "<table width=\"50%\" border='1'>";
		echo "<tr style=\"font-weight:bold;text-align:left\">";
		echo "<td>Tên Thuốc</td>";
		echo "<td style=\"text-align:right\">Số Lượng</td>";
		echo "</tr>";
		while($row=mysql_fetch_array($result,MYSQL_BOTH))
		{
			echo "<tr>";
			echo "<td>".$row["TenThuoc"]."</td>";
			echo "<td style=\"text-align:right\">".$row["SoLuongNhap"]."</td>";
			echo "<td><input type='button' value='Xóa' onclick=\"Xoa('".$row["MaCTPhieuNhap"]."')\" /></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	function XemChiTiet($maPhieuNhap)
	{
		include "../../db.inc";
		$query="select ct.MaCTPhieuNhap,th.TenThuoc,ct.SoLuongNhap  from ChiTietPhieuNhap ct,Thuoc th ".
			" where ct.MaThuoc=th.MaThuoc and ct.MaPhieuNhap=$maPhieuNhap";
		$result=mysql_query($query,$link);
		echo "<table width=\"50%\">";
		echo "<tr style=\"font-weight:bold;text-align:left\">";
		echo "<td>Tên Thuốc</td>";
		echo "<td style=\"text-align:right\">Số Lượng</td>";
		echo "</tr>";
		while($row=mysql_fetch_array($result,MYSQL_BOTH))
		{
			echo "<tr>";
			echo "<td>".$row["TenThuoc"]."</td>";
			echo "<td style=\"text-align:right\">".$row["SoLuongNhap"]."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	function Xoa($maCTPhieuNhap)
	{
		include "../../db.inc";
		$query="select MaKho,MaThuoc,SoLuongNhap from ChiTietPhieuNhap where MaCTPhieuNhap=$maCTPhieuNhap";
		$result=mysql_query($query);
		$row=mysql_fetch_row($result);
		// update kho
		$query="update KhoThuoc set SoLuong=SoLuong-$row[2] where MaPhong=$row[0] and MaThuoc=$row[1]";
		mysql_query($query);
		// delete chi tiet
		$query="delete from ChiTietPhieuNhap where MaCTPhieuNhap=$maCTPhieuNhap";
		echo $query;
		mysql_query($query);
	}
	function HienThiPhieuNhap($maPhieu)
	{
		include "../../db.inc";
		$query="select * from PhieuNhapKho where MaPhieuNhap=$maPhieu";
		$result=mysql_query($query,$link);
		$row=mysql_fetch_array($result,MYSQL_BOTH);
		return $row;
	}
?>