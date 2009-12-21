<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="../../Js/epoch_classes.js">
</script>
<script src="../../Js/eclinic.js" type="text/javascript">
</script>
<link rel="stylesheet" type="text/css" href="../../Styles/epoch_styles.css">
<script type="text/javascript">
	var NgayNhap;
	window.onload = function () {
	NgayNhap  = new Epoch('epoch_popup','popup',document.getElementById('txtNgayNhan'),false);
	
};
</script>
<script src="../../Js/jquery.min.js" type="text/javascript">
</script>
</head>

<body>

<table>
	<tr>
		<td>
			<input type="button" value="Lưu & Thêm Mới" onclick="LuuVaThemMoi()" />
			<input type="button" value="Đóng" onclick="window.location='PhieuNhapThuoc.php'" />
		</td>
	</tr>
</table>
<h3 align="center">Nhập Thuốc Vào Kho</h3>
	<fieldset>
		<legend>Thông tin phiếu nhập</legend>
		<table>
			<tr>
				<td>
					Số Phiếu:
				</td>
				<td>
					<input  type="text" name="txtSoPhieu" id="txtSoPhieu" readonly="true" />
					<input type="hidden" id="hdMaPhieuNhap" value="0" />
				</td>
			</tr>
			<tr>
				<td>
					Ngày Nhập:
				</td>
				<td>
					<input  type="text" name="txtNgayNhan" id="txtNgayNhan" value="<?php echo date('d/m/Y') ?>"/>
				</td>
			</tr>
		</table>
	</fieldset>
	<fieldset>
		<legend>Chi Tiết</legend>
		<table>
			<tr>
				<td>
					Thuốc:
				</td>
				<td>
					<select id="cbThuoc">
						<?php
							include "../../db.inc";
							$query="select MaThuoc,TenThuoc from thuoc order by TenThuoc asc";
							$result=mysql_query($query,$link);
							if($result)
							{
								while ($row = mysql_fetch_array($result,MYSQL_BOTH))
								{
									echo"<option value='".$row["MaThuoc"]."'>".$row["TenThuoc"]."</option>";
								} 
							}
						
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Số Lượng:
				</td>
				<td>
					<input type="text" name="txtAmount" id="txtAmount" />
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="button" value="Them" onclick="Them()" />
				</td>
			</tr>
		</table>
		<div id="dvDS"></div>
	</fieldset>
	<script type="text/javascript">
		function Them()
		{
			var ngayNhan=$("#txtNgayNhan").val();
			var maThuoc=$("#cbThuoc").val();
			var soLuong=$("#txtAmount").val();
			var maPhieu=$("#hdMaPhieuNhap").val();
			var url="xlPhieuNhapThuoc.php?act=insert&ngayNhan="+ngayNhan+"&maThuoc="+maThuoc+"&soLuong="+soLuong+"&maphieu="+maPhieu;
			$.get(url,function(data){
				$("#hdMaPhieuNhap").val(data);
				$("#txtSoPhieu").val(data);
				HienThiDS();
			});
			
		}
		function HienThiDS()
		{
			var maPhieu=$("#hdMaPhieuNhap").val();
			var url="xlPhieuNhapThuoc.php?act=show&maphieu="+maPhieu+"&ran"+Math.random();
			$.get(url,function(data){
				$("#dvDS").html(data);
				calcHeight();
			});
		}
		function LuuVaThemMoi()
		{
			$("#txtSoPhieu").val("");
			$("#hdMaPhieuNhap").val("0");
			$("#dvDS").html("");
			calcHeight();
		}
		function Xoa(id)
		{
			if(confirm("Ban Co Chac Muon Xoa Khong?"))
			{
				var url="xlPhieuNhapThuoc.php?act=delete&mact="+id;
				$.get(url,function(data){
					HienThiDS();
				});
			}
		}
	</script>
</body>
</html>
