<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="../../Js/epoch_classes.js">
</script>
<link rel="stylesheet" type="text/css" href="../../Styles/epoch_styles.css">
<script type="text/javascript">
	var dp_cal,expire;
	window.onload = function () {
	dp_cal  = new Epoch('epoch_popup','popup',document.getElementById('popup_container'),false);
	expire  = new Epoch('epoch_popup','popup',document.getElementById('txtExpire'),false);
	
};
</script>
<script src="../../../Js/jquery.min.js" type="text/javascript">
</script>

</head>
<body>
<form action="xlDMThuoc.php"  method="post">
<?php
	if($_REQUEST['act']=='insert' && $_REQUEST['rs']=='suc')
	{
		echo "<h3 align='center'>Thêm thành công</h3>";
	}
?>


<table width="100%" border="1">
	<tr>
	<td colspan="2">
		<input type="submit" value="Thêm" />
		<input type="button" value="Đóng" onclick="window.location='DMThuoc.php'" />
		<input type="hidden" name="act" value="<?php echo $_REQUEST['act']?>" />
	</td>
	</tr>	
	<tr>
		<td>
			Loại Thuốc:
		</td>
		<td>
			<select name="cbLoaiThuoc">
				<?php
					include "../../db.inc";
					$query="select * from loaithuoc";
					$result=mysql_query($query,$link);
					if($result)
					{
						while ($row = mysql_fetch_row($result))
						{
							echo"<option value='".$row[0]."'>".$row[1]."</option>";
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
					include "../../db.inc";
					$query="select * from cachsd";
					$result=mysql_query($query,$link);
					if($result)
					{
						while ($row = mysql_fetch_row($result))
						{
							echo"<option value='".$row[0]."'>".$row[1]."</option>";
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
			<input type="text" name="txtTenThuoc" style="width:400px;" />
		</td>
	</tr>	
	<tr>
		<td>
			Ngày sản xuất:
		</td>
		<td>
		  <input id="popup_container" name="txtNgaySX"  type="text" />
		</td>
	</tr>
	<tr>
		<td>
			Ngày hết hạn:
		</td>
		<td>
		  <input id="txtExpire" name="txtNgayHetHan" type="text" />
		</td>
	</tr>
	<tr>
		<td>
			Giá:
		</td>
		<td>
		  <input id="txtGia" name="txtGia" type="text" />
		</td>
	</tr>
</table>

</form>

</body>
</html>
