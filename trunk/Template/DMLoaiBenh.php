<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Quản lý danh mục Loại Bệnh</title>
  <script type="text/javascript" src="jsDanhMuc.js"></script>
</head>
<body>
<div id="divDetailResult">
<?php
    include 'db.inc';
    $table = "LoaiBenh";
    $query = "SELECT * FROM $table" ;
    $result = mysql_query($query, $link);

    if (!$result)
    {
    	print "failed to open the $table !";
    }
	else
	{
      echo "<form action='' method='GET' name='frmLB'>";
	  echo "<table border='1' align='center'>";
      echo "<tr>" ;
        echo "<th>Mã loại bệnh</th>" ;
        echo "<th>Tên loại bệnh</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
	  {
			$malb = $row[0];
			$tenlb= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$malb</td>";
    			echo "<td>$tenlb</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_LB' value='$malb' />";
                    echo "<a href='xlXoaDMLoaiBenh.php?MaLB=$malb' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_LB' value='$tenlb' />";
                echo "<a href='xlCapNhatDMLoaiBenh.php?MaLB=$malb&TenLB=$tenlb ' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenLB' size='30' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertLoaiBenh();' />";
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
