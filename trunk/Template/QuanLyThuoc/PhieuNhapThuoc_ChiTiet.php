<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../Js/jquery.min.js" type="text/javascript">
</script>
</head>

<body>
<input type="hidden" id="hdMaPhieuNhap" value="<?php echo $_REQUEST['id'] ?>"/>
<?php
	include "xlPhieuNhapThuoc.php";
	$phieuNhap=HienThiPhieuNhap($_REQUEST['id']);
?>
<input type="button" value="Đóng" onclick="window.location='PhieuNhapThuoc.php'" />
<h3 align="center">Chi Tiết Phiếu Nhập</h3>
<fieldset>
	<legend>Thông Tin Chung</legend>
	<table>
		<tr>
			<td>Mã Phiếu Nhập: </td>
			<td><?php echo $phieuNhap["MaPhieuNhap"]?></td>
		</tr>
		<tr>
			<td>Ngày Nhập</td>
			<td><?php echo date("d/m/Y",strtotime($phieuNhap["NgayNhap"]))?></td>
		</tr>
	</table>
</fieldset><br />
<fieldset>
	<legend>Chi Tiết Phiếu Nhập
	</legend>
	<div id="dvDS"></div>
</fieldset>

<script type="text/javascript">
	HienThiDS();
	function HienThiDS()
	{
		var maPhieu=$("#hdMaPhieuNhap").val();
		var url="xlPhieuNhapThuoc.php?act=detail&maphieu="+maPhieu+"&ran"+Math.random();
		$.get(url,function(data){
			$("#dvDS").html(data);
		});
	}
</script>

</body>
</html>
