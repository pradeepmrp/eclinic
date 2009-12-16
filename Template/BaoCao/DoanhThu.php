<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="../Js/epoch_classes.js">
</script>
<link rel="stylesheet" type="text/css" href="../Styles/epoch_styles.css">
<script type="text/javascript">
	var tuNgay,denNgay;
	window.onload = function () {
	denNgay  = new Epoch('epoch_popup','popup',document.getElementById('txtDenNgay'),false);
	tuNgay  = new Epoch('epoch_popup','popup',document.getElementById('txtTuNgay'),false);
	
};
</script>
<script src="../Js/jquery.min.js" type="text/javascript">
</script>
</head>
<body>
<h3 align="center">Báo Cáo Doanh Thu</h3>
	<table>
		<tr>
			<td>
				Từ Ngày:
			</td>
			<td>
				<input type="text" id="txtTuNgay" value="<?php echo date("d/m/Y") ?>" />
			</td>
			<td>
				Đến Ngày:
			</td>
			<td>
				<input type="text" id="txtDenNgay" value="<?php echo date("d/m/Y") ?>" />
				<input type="button" value="Xem" onclick="Xem()"  />
			</td>
		</tr>
	</table><br />
	<div id="dvKetQua"></div>
<script type="text/javascript">
	function Xem()
	{
		var tuNgay=$("#txtTuNgay").val();
		var denNgay=$("#txtDenNgay").val();
		var url="xkDoanhThu.php?tuNgay="+tuNgay+"&denNgay="+denNgay+"&ran="+Math.random();
		$.get(url,function(data){
			$("#dvKetQua").html(data);
		});
	}
</script>
</body>
</html>
