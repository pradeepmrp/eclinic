<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../../Js/jquery.min.js" type="text/javascript">
</script>
<script src="../../Js/eclinic.js" type="text/javascript">
</script>
</head>

<body>
<h3 align="center">Quản Lý Kho Thuốc</h3>
<table>
	<tr>
		<td>Tên Thuốc:</td>
		<td><input type="text" id="txtTenThuoc" style="width:400px;" /></td>
	</tr>
	<tr>
		<td>Loại Thuốc:</td>
		<td>
			<select name="cbLoaiThuoc" id="cbLoaiThuoc">
				<?php
					include "../../db.inc";
					$query="select * from loaithuoc";
					$result=mysql_query($query,$link);
					if($result)
					{
						echo"<option value='0' selected='selected'>-----------Tất Cả----------</option>";
						while ($row = mysql_fetch_row($result))
						{
							echo"<option value='".$row[0]."'>".$row[1]."</option>";
						} 
					}
				
				?>
			</select>
			<input type="button" value="Tìm Kiếm" onclick="TimKiem()" />
		</td>
	</tr>
</table>
<div id="dvDS"></div>

<script type="text/javascript">
	function TimKiem()
	{
		var tenThuoc=$("#txtTenThuoc").val();
		var loaiThuoc=$("#cbLoaiThuoc").val();
		var url="xlKhoThuoc.php?tenThuoc="+tenThuoc+"&loaiThuoc="+loaiThuoc+"&ran="+Math.random();
		$.get(url,function(data){
			$("#dvDS").html(data);
			calcHeight();
		});
	}
	
</script>
</body>
</html>
