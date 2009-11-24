<html>
<head>
</head>
<body>

	<form action="xlCapNhatDMQuyen.php" method="get">
    <table align="center">
      <tr>
          <td>Mã quyền</td>
          <td><input id="txtMaQuyen" name="MaQuyen" readonly type="text" value="<?php echo $_REQUEST["MaQuyen"]; ?>"/></td>
      </tr>
      <tr>
          <td>Tên quyền</td>
          <td><input id="txtTenQuyen" name="TenQuyen" type="text"  value="<?php echo $_REQUEST["TenQuyen"]; ?>"/></td>
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
              	    $maquyen = $_REQUEST["MaQuyen"];
                    $tenquyen = $_REQUEST["TenQuyen"];
            	    $query = "Update Quyen Set TenQuyen = '$tenquyen' WHERE MaQuyen=$maquyen";

                	$result = mysql_query($query, $link);
                 	if(mysql_errno() != 0)
                	{
                		echo "mysql_error(): ".mysql_error()."<br/>";
                		echo "mysql_errno(): ".mysql_errno()."<br/>";

                	}
                	else
                    {
                  		echo "Cập nhật quyền thành công.!<br/>";

                    }
                }
                if (isset($_REQUEST["btnDelete"]))
                {
                	$maquyen = $_REQUEST["MaQuyen"];

                	$query = "DELETE FROM Quyen WHERE MaQuyen=$maquyen";

                	$result = mysql_query($query, $link);

                	if(mysql_errno() != 0)
                	{
                	    echo "Quyền này đã đưa vào sử dụng. Không được xóa!.";
                	}
                	else
                		echo "Xóa thành công.!<br/>";
                }
                mysql_close( $link );

             ?>
          </td>
      </tr>
       <tr>
   	<td colspan="2"><a href="DMQuyen.php"><b>Quay lại</b></a></td>
      </tr>
  </table>
  </form>
</body>
</html>