<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Quản lý danh mục Loại Phòng Phát Thuốc</title>
  <script type="text/javascript" src="jsDanhMuc.js"></script>
</head>
<body>
<div id="divDetailResult">
<?php
    include 'db.inc';
    $table = "LoaiPhongPhatThuoc";
    $query = "SELECT * FROM $table" ;
    $result = mysql_query($query, $link);

    if (!$result)
    {
    	print "failed to open the $table !";
    }
	else
	{
      echo "<form action='' method='GET' name='frmLPPhatThuoc'>";
	  echo "<table border='1' align='center'>";
      echo "<tr>" ;
        echo "<th>Mã loại phòng</th>" ;
        echo "<th>Tên loại phòng phát thuốc</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
		{
			$malp = $row[0];
			$tenlp= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$malp</td>";
    			echo "<td>$tenlp</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_LoaiPhong' value='$malp' />";
                    echo "<a href='xlXoaDMLoaiPhongPhatThuoc.php?MaLP=$malp' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_LoaiPhong' value='$tenlp' />";
                echo "<a href='xlCapNhatDMLoaiPhongPhatThuoc.php?MaLP=$malp&TenLP=$tenlp ' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenLP' size='35' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertLoaiPhongPhatThuoc();' />";
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
