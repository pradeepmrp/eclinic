<html>
<head>
</head>
<body>

      	<form action="xlCapNhatDMCachSuDung.php" method="get">
		<table align="center">
            <tr>
                <td>Mã</td>
                <td><input id="txtMaCSD" name="MaCachSD" readonly type="text" value="<?php echo $_REQUEST["MaCachSD"]; ?>"/></td>
            </tr>
            <tr>
                <td>Tên cách sử dụng</td>
                <td><input id="txtTenCSD" name="TenCachSD" type="text"  value="<?php echo $_REQUEST["TenCachSD"]; ?>"/></td>
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
                        	$macachsd = $_REQUEST["MaCachSD"];
                          $tencachsd= $_REQUEST["TenCachSD"];
                      	$query = "Update CachSD Set TenCachSD = '$tencachsd' WHERE MaCachSD=$macachsd";

                      	$result = mysql_query($query, $link);
                       	if(mysql_errno() != 0)
                      	{
                      		echo "mysql_error(): ".mysql_error()."<br/>";
                      		echo "mysql_errno(): ".mysql_errno()."<br/>";

                      	}
                      	else
                          {
                        		echo "Cập nhật cách sử dụng thuốc thành công.!<br/>";

                          }
                      }
                      if (isset($_REQUEST["btnDelete"]))
                      {
                      	$macachsd = $_REQUEST["MaCachSD"];

                      	$query = "DELETE FROM CACHSD WHERE MaCachSD=$macachsd";

                      	$result = mysql_query($query, $link);

                      	if(mysql_errno() != 0)
                      	{
                      	    echo "Cách sử dụng này đã đưa vào sử dụng. Không được xóa!.";
                      	}
                      	else
                      		echo "Xóa thành công.!<br/>";
                      }
                      mysql_close( $link );

                   ?>
                </td>
            </tr>
             <tr>
	        	<td colspan="2"><a href="DMCachSuDung.php"><b>Quay lại</b></a></td>
            </tr>
        </table>
        </form>


</body>
</html>