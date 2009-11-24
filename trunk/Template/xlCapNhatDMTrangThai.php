<html>
<head>
</head>
<body>

	<form action="xlCapNhatDMTrangThai.php" method="get">
    <table align="center">
      <tr>
          <td>Mã trạng thái</td>
          <td><input id="txtMaTT" name="MaTT" readonly type="text" value="<?php echo $_REQUEST["MaTT"]; ?>"/></td>
      </tr>
      <tr>
          <td>Tên trạng thái</td>
          <td><input id="txtTenTT" name="TenTT" type="text"  value="<?php echo $_REQUEST["TenTT"]; ?>"/></td>
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
              	    $matt = $_REQUEST["MaTT"];
                    $tentt = $_REQUEST["TenTT"];
            	    $query = "Update TrangThai Set TenTT = '$tentt' WHERE MaTT=$matt";

                	$result = mysql_query($query, $link);
                 	if(mysql_errno() != 0)
                	{
                		echo "mysql_error(): ".mysql_error()."<br/>";
                		echo "mysql_errno(): ".mysql_errno()."<br/>";

                	}
                	else
                    {
                  		echo "Cập nhật trạng thái thành công.!<br/>";

                    }
                }
                if (isset($_REQUEST["btnDelete"]))
                {
                	$matt = $_REQUEST["MaTT"];

                	$query = "DELETE FROM TrangThai WHERE MaTT=$matt";

                	$result = mysql_query($query, $link);

                	if(mysql_errno() != 0)
                	{
                	    echo "Trạng thái này đã đưa vào sử dụng. Không được xóa!.";
                	}
                	else
                		echo "Xóa thành công.!<br/>";
                }
                mysql_close( $link );

             ?>
          </td>
      </tr>
       <tr>
   	<td colspan="2"><a href="DMTrangThai.php"><b>Quay lại</b></a></td>
      </tr>
  </table>
  </form>
</body>
</html>