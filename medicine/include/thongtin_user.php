<?php
include '../db.inc';
session_start();
$id=$_SESSION['userid'];
$lv=$_SESSION['level'];
if($lv=="6")
{
	$table="benhnhan";
}
else
	$table="nhanvien";	
$sql="select * from $table where MaTK='".$id."'";
$result=mysql_query($sql,$link);
$sodong=mysql_num_rows($result);
if($sodong!=0)
{
	$row=mysql_fetch_array($result);
	$HoTen=$row['HoTen'];
	$NgaySinh=$row['NgaySinh'];
	$DiaChi=$row['DiaChi'];
	$SoCMND=$row['SoCMND'];
	$DienThoai=$row['DienThoai'];
}



if (isset($_REQUEST["btnUpdate"]))
{
	$HoTen= $_REQUEST["HoTen"];
	$NgaySinh = $_REQUEST["NgaySinh"];
	$DiaChi = $_REQUEST["DiaChi"];
	$SoCMND=$_REQUEST["SoCMND"];
	$DienThoai = $_REQUEST["DienThoai"];
	
	$sql = "Update $table Set HoTen = '$HoTen', NgaySinh='$NgaySinh', DiaChi='$DiaChi', SoCMND=$SoCMND, DienThoai=$DienThoai WHERE MaTK=".$id;
	
	$result = mysql_query($sql,$link);	
	
	if(mysql_errno() != 0)
	{
		echo "mysql_error(): ".mysql_error()."<br/>";	
		echo "mysql_errno(): ".mysql_errno()."<br/>";
	}
	else
		echo "Cập nhật thông tin thành công!<br/>";
}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

			<title></title>
	</head>
	<body>

		<form action="thongtin_user.php" method="get">
		<table align="center">			
        	<tr>
                <td><input id="Text1" name="MaTK" type="hidden" style="width:100px;" value="<?php echo $id; ?>"/></td>
            </tr>
            <tr>
                <td>Họ và tên</td>
				<td>:</td>
                <td><input id="Text2" name="HoTen" type="text"  value="<?php echo $HoTen; ?>"/></td>                   
            </tr>
            <tr>
                <td>Ngày Sinh</td>
				<td>:</td>
                <td><input id="Text3" name="NgaySinh" type="text"  value="<?php echo $NgaySinh; ?>"/></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
				<td>:</td>
                <td><input id="Text4" name="DiaChi" type="text"  value="<?php echo $DiaChi; ?>"/></td>
            </tr>
			<tr>
                <td>Số CMND</td>
				<td>:</td>
                <td><input id="Text4" name="SoCMND" type="text"  value="<?php echo $SoCMND; ?>"/></td>
            </tr>
            <tr>
                <td>Điện thoại</td>
				<td>:</td>
                <td><input id="Text5" name="DienThoai" type="text"  value="<?php echo $DienThoai; ?>"/></td>
            </tr>           			     
			<tr><td colspan="3"><input id="Submit4" type="submit" name="btnUpdate" value="Update" />     
			<input id="Submit5" type="reset" name="btnReset" value="Reset" /><td></tr>
         </table>
		
		
		

<?php
mysql_close( $link );
?>
		</form>
	</body>
</html>