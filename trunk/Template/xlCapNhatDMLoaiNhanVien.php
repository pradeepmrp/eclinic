<html>
<head>
</head>
<body>

      	<form action="xlCapNhatDMLoaiNhanVien.php" method="get">
		<table align="center">
            <tr>
                <td>Mã loại nhân viên</td>
                <td><input id="txtMaLoaiNV" name="MaLoaiNV" readonly type="text" value="<?php echo $_REQUEST["MaLoaiNV"]; ?>"/></td>
            </tr>
            <tr>
                <td>Tên loại nhân viên</td>
                <td><input id="txtTenLoaiNV" name="TenLoaiNV" type="text"  value="<?php echo $_REQUEST["TenLoaiNV"]; ?>"/></td>
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
                    	$maloainv = $_REQUEST["MaLoaiNV"];
                        $tenloainv = $_REQUEST["TenLoaiNV"];
                  	    $query = "Update LoaiNhanVien Set TenLoaiNV = '$tenloainv' WHERE MaLoaiNV=$maloainv";

                      	$result = mysql_query($query, $link);
                       	if(mysql_errno() != 0)
                      	{
                      		echo "mysql_error(): ".mysql_error()."<br/>";
                      		echo "mysql_errno(): ".mysql_errno()."<br/>";

                      	}
                      	else
                          {
                        		echo "Cập nhật loại nhân viên thành công.!<br/>";

                          }
                      }
                      if (isset($_REQUEST["btnDelete"]))
                      {
                      	$maloainv = $_REQUEST["MaLoaiNV"];

                      	$query = "DELETE FROM LoaiNhanVien WHERE MaLoaiNV=$maloainv";

                      	$result = mysql_query($query, $link);

                      	if(mysql_errno() != 0)
                      	{
                      	    echo "Loại nhân viên này này đã đưa vào sử dụng. Không được xóa!.";
                      	}
                      	else
                      		echo "Xóa thành công.!<br/>";
                      }
                      mysql_close( $link );

                   ?>
                </td>
            </tr>
             <tr>
	        	<td colspan="2"><a href="DMLoaiNhanVien.php"><b>Quay lại</b></a></td>
            </tr>
        </table>
        </form>
</body>
</html>