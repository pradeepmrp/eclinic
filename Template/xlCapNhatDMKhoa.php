<html>
<head>
</head>
<body>

	<form action="xlCapNhatDMKhoa.php" method="get">
    <table align="center">
      <tr>
          <td>Mã khoa</td>
          <td><input id="txtMaKhoa" name="MaKhoa" readonly type="text" value="<?php echo $_REQUEST["MaKhoa"]; ?>"/></td>
      </tr>
      <tr>
          <td>Tên khoa</td>
          <td><input id="txtTenKhoa" name="TenKhoa" type="text"  value="<?php echo $_REQUEST["TenKhoa"]; ?>"/></td>
      </tr>
      <tr>
    <td colspan="2"><input id="smUpdate" type="submit" name="btnUpdate" value="Cập nhật" />
        <input id="smDelete" type="submit" name="btnDelete" value="Xóa" />
          </td>
      </tr>

      <tr>
          <td colspan="2">
              <?php
                include 'db.inc';
                if (isset($_REQUEST["btnUpdate"]))
                {
              	$makhoa = $_REQUEST["MaKhoa"];
                  $tenkhoa = $_REQUEST["TenKhoa"];
            	    $query = "Update Khoa Set TenKhoa = '$tenkhoa' WHERE MaKhoa=$makhoa";

                	$result = mysql_query($query, $link);
                 	if(mysql_errno() != 0)
                	{
                		echo "mysql_error(): ".mysql_error()."<br/>";
                		echo "mysql_errno(): ".mysql_errno()."<br/>";

                	}
                	else
                    {
                  		echo "Cập nhật khoa thành công.!<br/>";

                    }
                }
                if (isset($_REQUEST["btnDelete"]))
                {
                	$makhoa = $_REQUEST["MaKhoa"];

                	$query = "DELETE FROM Khoa WHERE MaKhoa=$makhoa";

                	$result = mysql_query($query, $link);

                	if(mysql_errno() != 0)
                	{
                	    echo "Khoa này đã đưa vào sử dụng. Không được xóa!.";
                	}
                	else
                		echo "Xóa thành công.!<br/>";
                }
                mysql_close( $link );

             ?>
          </td>
      </tr>
       <tr>
   	<td colspan="2"><a href="DMKhoa.php"><b>Quay lại</b></a></td>
      </tr>
  </table>
  </form>
</body>
</html>