<html>
<head>
</head>
<body>

      	<form action="xlCapNhatDMChuyenMon.php" method="get">
		<table align="center">
            <tr>
                <td>Mã chuyên môn</td>
                <td><input id="txtMaCM" name="MaCM" readonly type="text" value="<?php echo $_REQUEST["MaCM"]; ?>"/></td>
            </tr>
            <tr>
                <td>Tên chuyên môn</td>
                <td><input id="txtTenCM" name="TenCM" type="text"  value="<?php echo $_REQUEST["TenCM"]; ?>"/></td>
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
                    	$macm = $_REQUEST["MaCM"];
                        $tencm = $_REQUEST["TenCM"];
                  	    $query = "Update ChuyenMon Set TenCM = '$tencm' WHERE MaCM=$macm";

                      	$result = mysql_query($query, $link);
                       	if(mysql_errno() != 0)
                      	{
                      		echo "mysql_error(): ".mysql_error()."<br/>";
                      		echo "mysql_errno(): ".mysql_errno()."<br/>";

                      	}
                      	else
                          {
                        		echo "Cập nhật chuyên môn thành công.!<br/>";

                          }
                      }
                      if (isset($_REQUEST["btnDelete"]))
                      {
                      	$macm = $_REQUEST["MaCM"];

                      	$query = "DELETE FROM ChuyenMon WHERE MaCM=$macm";

                      	$result = mysql_query($query, $link);

                      	if(mysql_errno() != 0)
                      	{
                      	    echo "Chuyên môn này đã đưa vào sử dụng. Không được xóa!.";
                      	}
                      	else
                      		echo "Xóa thành công.!<br/>";
                      }
                      mysql_close( $link );

                   ?>
                </td>
            </tr>
             <tr>
	        	<td colspan="2"><a href="DMChuyenMon.php"><b>Quay lại</b></a></td>
            </tr>
        </table>
        </form>


</body>
</html>