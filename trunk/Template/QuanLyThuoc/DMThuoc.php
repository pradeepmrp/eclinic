<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../Js/jquery.min.js" type="text/javascript">
</script>
</head>
<body>
<table>
	<tr>
		<td>
			<input type="button" value="Thêm Mới" onclick="window.location='DMThuoc_Them.php?act=insert'" />
		</td>
	</tr>
</table>
<h3 align="center">Quản Lý Danh Mục Thuốc</h3>
<div id="dvDanhSach"></div>
<script type="text/javascript">
HienThiDuLieu();
function HienThiDuLieu()
{
	$.get("xlDMThuoc.php?act=show",function(data){
	$('#dvDanhSach').html(data);
	});
}
function XoaThuoc(id)
{
	var rs=confirm("Ban Co Chac Muon Xoa Khong ?");
	if(rs==true)
	{
		$.ajax({
		   type: "POST",
		   dataType:"text",
		   url: "xlDMThuoc.php",
		   data: "id="+id+"&act=delete",
		   success: function(msg){
			 alert( "Xoa Thanh Cong" );
		   }
		 });
		 HienThiDuLieu();
	 }
}
</script>
</body>
</html>
