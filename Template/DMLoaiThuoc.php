<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Quản lý danh mục Loại Thuốc</title>
  <script type="text/javascript" src="jsDanhMuc.js"></script>
</head>
<body>
<div id="divDetailResult">
<?php
    include 'db.inc';
    $table = "LoaiThuoc";
    $query = "SELECT * FROM $table" ;
    $result = mysql_query($query, $link);

    if (!$result)
    {
    	print "failed to open the $table !";
    }
	else
	{
      echo "<form action='' method='GET' name='frmLoaiThuoc'>";
	  echo "<table border='1' align='center'>";
      echo "<tr>" ;
        echo "<th>Mã loại thuốc</th>" ;
        echo "<th>Tên loại thuốc</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
		{
			$malt = $row[0];
			$tenlt= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$malt</td>";
    			echo "<td>$tenlt</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_LoaiThuoc' value='$malt' />";
                    echo "<a href='xlXoaDMLoaiThuoc.php?MaLT=$malt' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_LoaiThuoc' value='$tenlt' />";
                echo "<a href='xlCapNhatDMLoaiThuoc.php?MaLT=$malt&TenLT=$tenlt ' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenLT' size='25' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertLoaiThuoc();' />";
            echo "</td>";
		echo "</tr>";
       echo "</table>";
        echo "</form>";
	}
    echo "<br/>";
  	mysql_close( $link );
 ?>
</div>
</body>

</html>
