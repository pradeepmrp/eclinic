<html>
<head>
</head>
<body>

	<form action="xlCapNhatDMLoaiThuoc.php" method="get">
    <table align="center">
      <tr>
          <td>Mã loại thuốc</td>
          <td><input id="txtMaLT" name="MaLT" readonly type="text" value="<?php echo $_REQUEST["MaLT"]; ?>"/></td>
      </tr>
      <tr>
          <td>Tên loại thuốc</td>
          <td><input id="txtTenLT" name="TenLT" type="text"  value="<?php echo $_REQUEST["TenLT"]; ?>"/></td>
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
                	$malt = $_REQUEST["MaLT"];
                    $tenlt = $_REQUEST["TenLT"];
            	    $query = "Update LoaiThuoc Set TenLoaiThuoc = '$tenlt' WHERE MaLoaiThuoc=$malt";

                	$result = mysql_query($query, $link);
                 	if(mysql_errno() != 0)
                	{
                		echo "mysql_error(): ".mysql_error()."<br/>";
                		echo "mysql_errno(): ".mysql_errno()."<br/>";

                	}
                	else
                    {
                  		echo "Cập nhật loại thuốc thành công.!<br/>";

                    }
                }
                if (isset($_REQUEST["btnDelete"]))
                {
                	$malt = $_REQUEST["MaLT"];

                	$query = "DELETE FROM LoaiThuoc WHERE MaLoaiThuoc=$malt";

                	$result = mysql_query($query, $link);

                	if(mysql_errno() != 0)
                	{
                	    echo "Loại thuốc này đã đưa vào sử dụng. Không được xóa!.";
                	}
                	else
                		echo "Xóa thành công.!<br/>";
                }
                mysql_close( $link );

             ?>
          </td>
      </tr>
       <tr>
   	<td colspan="2"><a href="DMLoaiThuoc.php"><b>Quay lại</b></a></td>
      </tr>
  </table>
  </form>
</body>
</html>