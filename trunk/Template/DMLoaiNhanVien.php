<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Quản lý danh mục Loại Nhân Viên</title>
  <script type="text/javascript" src="jsDanhMuc.js"></script>
</head>
<body>
<div id="divDetailResult">
<?php
    include 'db.inc';
    $table = "LoaiNhanVien";
    $query = "SELECT * FROM $table" ;
    $result = mysql_query($query, $link);

    if (!$result)
    {
    	print "failed to open the $table !";
    }
	else
	{
      echo "<form action='' method='GET' name='frmLoaiNV'>";
	  echo "<table border='1' align='center'>";
      echo "<tr>" ;
        echo "<th>Mã loại</th>" ;
        echo "<th>Tên loại nhân viên</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
		{
			$maloainv = $row[0];
			$tenloainv= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$maloainv</td>";
    			echo "<td>$tenloainv</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_LoaiNV' value='$maloainv' />";
                    echo "<a href='xlXoaDMLoaiNhanVien.php?MaLoaiNV=$maloainv' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_LoaiNV' value='$tenloainv' />";
                echo "<a href='xlCapNhatDMLoaiNhanVien.php?MaLoaiNV=$maloainv&TenLoaiNV=$tenloainv ' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenLoaiNV' size='35' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertLoaiNhanVien();' />";
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
