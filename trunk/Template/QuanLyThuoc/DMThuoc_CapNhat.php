<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="../Js/epoch_classes.js">
</script>
<link rel="stylesheet" type="text/css" href="../Styles/epoch_styles.css">
<script type="text/javascript">
	var dp_cal,expire;
	window.onload = function () {
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container'),false);
	expire  = new Epoch('epoch_popup','popup',document.getElementById('txtExpire'),false);
	
};
</script>
<script src="../Js/jquery.min.js" type="text/javascript">
</script>

</head>
<body>
<form action="xlDMThuoc.php"  method="post">
<?php 
	include "xlDMThuoc.php";
	if(isset($_REQUEST['id']))
	{
		$thuoc=HienThiThuoc($_REQUEST['id']);
	}
?>
<table width="100%" border="1">
	<tr>
	<td colspan="2">
		<input type="submit" value="Lưu" />
		<input type="button" value="Đóng" onclick="window.location='DMThuoc.php'" />
		<input type="hidden"  id="act" name="act" value="update"/>
		<input type="hidden"  name="id" value="<?php echo $_REQUEST['id'] ?>"/>
	</td>
	</tr>	
	<tr>
		<td>
			Loại Thuốc:
		</td>
		<td>
			<select name="cbLoaiThuoc">
				<?php
					include "../db.inc";
					$query="select * from loaithuoc";
					$result=mysql_query($query,$link);
					if($result)
					{
						while ($row = mysql_fetch_array($result,MYSQL_BOTH))
						{
							if($row["MaLoaiThuoc"]==$thuoc["MaLoaiThuoc"])
								echo"<option value='".$row["MaLoaiThuoc"]."' selected='selected'>".$row["TenLoaiThuoc"]."</option>";
							else
								echo"<option value='".$row["MaLoaiThuoc"]."'>".$row["TenLoaiThuoc"]."</option>";
							
						} 
					}
					
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Cách sử dụng:
		</td>
		<td>
			<select name="cbCachDung" >
				<?php
					include "../db.inc";
					$query="select * from cachsd";
					$result=mysql_query($query,$link);
					if($result)
					{
						while ($row = mysql_fetch_array($result,MYSQL_BOTH))
						{
							if($row["MaCachSD"]==$thuoc["MaCachSD"])
								echo"<option value='".$row["MaCachSD"]."' selected='selected'>".$row["TenCachSD"]."</option>";
							else
								echo"<option value='".$row["MaCachSD"]."' >".$row["TenCachSD"]."</option>";
						} 
					}
				
				?>
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Tên Thuốc:
		</td>
		<td>
			<input type="text" name="txtTenThuoc" value='<?php echo $thuoc["TenThuoc"] ?>' style="width:400px;" />		
		</td>
	</tr>	
	<tr>
		<td>
			Ngày sản xuất:
		</td>
		<td>
		  <input id="popup_container" name="txtNgaySX" type="text" value="<?php echo date("d/m/Y",strtotime($thuoc["NgaySX"])) ?>" />
		</td>
	</tr>
	<tr>
		<td>
			Ngày hết hạn:
		</td>
		<td>
		  <input id="txtExpire" name="txtNgayHetHan" type="text" value="<?php echo date("d/m/Y",strtotime($thuoc["NgayHetHan"])) ?>" />
		</td>
	</tr>
	<tr>
		<td>
			Giá:
		</td>
		<td>
		  <input id="txtGia" name="txtGia" type="text" value="<?php echo $thuoc["Gia"] ?>" />
		</td>
	</tr>
</table>

</form>

</body>
</html>
