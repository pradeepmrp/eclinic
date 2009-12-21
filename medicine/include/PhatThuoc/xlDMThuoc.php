<?php
include "../utility.php";
//-----------------
function Them()
{
	include "../../db.inc";
	$loaiThuoc=$_POST['cbLoaiThuoc'];
	$cachDung=$_REQUEST['cbCachDung'];
	$ngaySX=ChangeFormatDate($_REQUEST['txtNgaySX']);
	$ngayHH=ChangeFormatDate($_REQUEST['txtNgayHetHan']);
	$tenThuoc=$_REQUEST["txtTenThuoc"];
	$gia=$_REQUEST["txtGia"];
	$query = "Insert into Thuoc(TenThuoc,NgaySX,NgayHetHan,MaCachSD,MaLoaiThuoc,Gia) ".
		" values('$tenThuoc','$ngaySX','$ngayHH',$cachDung,$loaiThuoc,$gia)";
	$result = mysql_query($query, $link);
	header( 'Location:DMThuoc_Them.php?act=insert&rs=suc' ) ;
}
function HienThiDanhSach()
{
	include "../../db.inc";
	$query="SELECT `MaThuoc` , `TenThuoc` , NgaySX , `NgayHetHan` , `Gia` , lt.TenLoaiThuoc, sd.TenCachSD ".
	"FROM thuoc th, cachsd sd, loaithuoc lt ".
	"WHERE th.`MaCachSD` = sd.`MaCachSD`  ".
	"AND lt.`MaLoaiThuoc` = th.`MaLoaiThuoc`  ";
	$result=mysql_query($query,$link);
	// 
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	echo "<table width=\"100%\">";
	echo "<tr style=\"font-weight:bold;text-align:left\">";
	echo "<td>Tên Thuốc</td>";
	echo "<td>Loại Thuốc</td>";
	echo "<td>Cách Sử Dụng</td>";
	echo "<td>Ngày Sản Xuất</td>";
	echo "<td>Ngày Hết Hạn</td>";
	echo "<td>Giá</td>";
	echo "</tr>";
//
	while ($row = mysql_fetch_array($result, MYSQL_BOTH))
	{
		echo "<tr>";
		echo "<td>".$row['TenThuoc']."</td>";
		echo "<td>".$row['TenLoaiThuoc']."</td>";
		echo "<td>".$row['TenCachSD']."</td>";
		echo "<td>".date("d/m/Y",strtotime($row['NgaySX']))."</td>";
		echo "<td>".date("d/m/Y",strtotime($row['NgayHetHan']))."</td>";
		echo "<td>".$row['Gia']."</td>";
		echo "<td><input type='button' value='Xoa' onclick=\"XoaThuoc(".$row["MaThuoc"].")\" >";
		echo "<input type='button' value='Sua' onclick=\"window.location='DMThuoc_CapNhat.php?id=".$row["MaThuoc"]."'\"></td>";
		echo "</tr>";
	}
	echo "</table>";
}
function Xoa($maThuoc)
{
	include "../../db.inc";
	$query="delete from Thuoc where MaThuoc=".$maThuoc;
	$result=mysql_query($query);
}
function HienThiThuoc($maThuoc)
{
	include "../../db.inc";
	$query="select * from Thuoc where MaThuoc=".$maThuoc;
	$result=mysql_query($query,$link);
	$row = mysql_fetch_array($result, MYSQL_BOTH);
//	mysql_close($link);
	return $row;
}
function CapNhat($maThuoc)
{
	include "../../db.inc";
	$loaiThuoc=$_POST['cbLoaiThuoc'];
	$cachDung=$_REQUEST['cbCachDung'];
	$ngaySX=ChangeFormatDate($_REQUEST['txtNgaySX']);
	$ngayHH=ChangeFormatDate($_REQUEST['txtNgayHetHan']);
	$tenThuoc=$_REQUEST["txtTenThuoc"];
	$gia=$_REQUEST["txtGia"];
	$query = "Update Thuoc set TenThuoc='$tenThuoc',MaLoaiThuoc=$loaiThuoc,MaCachSD=$cachDung,NgaySX='$ngaySX',NgayHetHan='$ngayHH',Gia=$gia ".
		"where MaThuoc=$maThuoc";
	$result = mysql_query($query, $link);
	header( 'Location:DMThuoc_CapNhat.php?id='.$maThuoc ) ;
}
// "page_load"
$act=$_REQUEST['act'];
if(isset($act))
{
	switch($act)
	{
		case "delete":
			$mathuoc=$_REQUEST['id'];
			Xoa($mathuoc);
		break;
		case "show":
			HienThiDanhSach();
		break;
		case "insert":
			Them();
			echo "<script>Them Thanh Cong</script>";
		break;
		case "update":
			CapNhat($_REQUEST['id']);
		break;
	}
	
}
?>
