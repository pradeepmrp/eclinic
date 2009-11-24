<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Quản lý danh mục Trạng Thái</title>
  <script type="text/javascript" src="jsDanhMuc.js"></script>
</head>
<body>
<div id="divDetailResult">
<?php
    include 'db.inc';
    $table = "TrangThai";
    $query = "SELECT * FROM $table" ;
    $result = mysql_query($query, $link);

    if (!$result)
    {
    	print "failed to open the $table !";
    }
	else
	{
      echo "<form action='' method='GET' name='frmTrangThai'>";
	  echo "<table border='1' align='center'>";
      echo "<tr>" ;
        echo "<th>Mã trạng thái</th>" ;
        echo "<th>Tên trạng thái</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
		{
			$matt = $row[0];
			$tentt= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$matt</td>";
    			echo "<td>$tentt</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_TrangThai' value='$matt' />";
                    echo "<a href='xlXoaDMTrangThai.php?MaTT=$matt' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_TrangThai' value='$tentt' />";
                echo "<a href='xlCapNhatDMTrangThai.php?MaTT=$matt&TenTT=$tentt ' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenTT' size='25' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertTrangThai();' />";
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
