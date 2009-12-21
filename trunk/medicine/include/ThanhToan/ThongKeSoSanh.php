<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="../../Js/epoch_classes.js">
</script>
<link rel="stylesheet" type="text/css" href="../../Styles/epoch_styles.css">
<script type="text/javascript">
	var tuNgay,denNgay;
	window.onload = function () {
	tuNgay  = new Epoch('epoch_popup','popup',document.getElementById('txtTuNgay'),false);
	denNgay  = new Epoch('epoch_popup','popup',document.getElementById('txtDenNgay'),false);
	
};
</script>
<script src="../../Js/jquery.min.js" type="text/javascript">
</script>
</head>

<body>
<h3 align="center">Thống Kê So Sánh</h3>
<table>
	<tr>
		<td>
			Điều Kiện:
		</td>
		<td>
			<select onchange="ShowCondition()" id="cbCondition">
				<option value="1" selected="selected">Các Ngày Trong Tuần Cụ Thể</option>
				<option value="2">4 Tuần Trong 1 Tháng Cụ Thể</option>
				<option value="3">12 Tháng Trong 1 Năm Cụ Thể</option>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<div id="dvCacNgay">
				Từ Ngày:<input type="text" id="txtTuNgay" value="<?php echo date('d/m/Y') ?>" />
				Đến Ngày:<input type="text" id="txtDenNgay" value="<?php echo date('d/m/Y') ?>" />
			</div>
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="button" value="Xem"  />
		</td>
	</tr>
</table>
<script type="text/javascript">
	function ShowCondition()
	{
		var condi=$("#cbCondition").val();
		switch(condi)
		{
			case "1":
				$("#dvCacNgay").css("display","block");
			break;
			case "2":
				$("#dvCacNgay").css("display","none");
			break;
			case "3":
				$("#dvCacNgay").css("display","none");
			break;
		}
	}
</script>
</body>
</html>
