<html>
<head>
</head>
<body>
  	<form action="xlCapNhatDMLoaiPhongPhatThuoc.php" method="get">
    <table align="center">
        <tr>
            <td>Mã loại phòng</td>
            <td><input id="txtMaLP" name="MaLP" readonly type="text" value="<?php echo $_REQUEST["MaLP"]; ?>"/></td>
        </tr>
        <tr>
            <td>Tên loại phòng phát thuốc</td>
            <td><input id="txtTenLP" name="TenLP" type="text"  value="<?php echo $_REQUEST["TenLP"]; ?>"/></td>
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
                	$malp = $_REQUEST["MaLP"];
                    $tenlp = $_REQUEST["TenLP"];
              	    $query = "Update LoaiPhongPhatThuoc Set TenLoaiPhong = '$tenlp' WHERE MaLoaiPhong=$malp";

                  	$result = mysql_query($query, $link);
                   	if(mysql_errno() != 0)
                  	{
                  		echo "mysql_error(): ".mysql_error()."<br/>";
                  		echo "mysql_errno(): ".mysql_errno()."<br/>";

                  	}
                  	else
                      {
                    		echo "Cập nhật loại phòng phát thuốc thành công.!<br/>";

                      }
                  }
                  if (isset($_REQUEST["btnDelete"]))
                  {
                  	$malp = $_REQUEST["MaLP"];

                  	$query = "DELETE FROM LoaiPhongPhatThuoc WHERE MaLoaiPhong=$malp";

                  	$result = mysql_query($query, $link);

                  	if(mysql_errno() != 0)
                  	{
                  	    echo "Loại phòng phát thuốc này đã đưa vào sử dụng. Không được xóa!.";
                  	}
                  	else
                  		echo "Xóa thành công.!<br/>";
                  }
                  mysql_close( $link );

               ?>
            </td>
        </tr>
         <tr>
     	<td colspan="2"><a href="DMLoaiPhongPhatThuoc.php"><b>Quay lại</b></a></td>
        </tr>
    </table>
    </form>
</body>
</html>