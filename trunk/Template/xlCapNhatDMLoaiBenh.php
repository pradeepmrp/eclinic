<html>
<head>
</head>
<body>

  <form action="xlCapNhatDMLoaiBenh.php" method="get">
  <table align="center">
      <tr>
          <td>Mã loại bệnh</td>
          <td><input id="txtMaLB" name="MaLB" readonly type="text" value="<?php echo $_REQUEST["MaLB"]; ?>"/></td>
      </tr>
      <tr>
          <td>Tên loại bệnh</td>
          <td><input id="txtTenLB" name="TenLB" type="text"  value="<?php echo $_REQUEST["TenLB"]; ?>"/></td>
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
              	    $malb = $_REQUEST["MaLB"];
                    $tenlb = $_REQUEST["TenLB"];
            	    $query = "Update LoaiBenh Set TenLoaiBenh = '$tenlb' WHERE MaLoaiBenh=$malb";

                	$result = mysql_query($query, $link);
                 	if(mysql_errno() != 0)
                	{
                		echo "mysql_error(): ".mysql_error()."<br/>";
                		echo "mysql_errno(): ".mysql_errno()."<br/>";

                	}
                	else
                    {
                  		echo "Cập nhật loại bệnh thành công.!<br/>";

                    }
                }
                if (isset($_REQUEST["btnDelete"]))
                {
                	$malb = $_REQUEST["MaLB"];

                	$query = "DELETE FROM LoaiBenh WHERE MaLoaiBenh=$malb";

                	$result = mysql_query($query, $link);

                	if(mysql_errno() != 0)
                	{
                	    echo "Loại bệnh này này đã đưa vào sử dụng. Không được xóa!.";
                	}
                	else
                		echo "Xóa thành công.!<br/>";
                }
                mysql_close( $link );

             ?>
          </td>
      </tr>
       <tr>
   	<td colspan="2"><a href="DMLoaiBenh.php"><b>Quay lại</b></a></td>
      </tr>
  </table>
  </form>
  </body>
</html>