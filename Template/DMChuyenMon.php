<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Quản lý danh mục chuyên môn</title>
  <script type="text/javascript" src="jsDanhMuc.js"></script>
</head>
<body>
<div id="divDetailResult">
<?php
    include 'db.inc';
    $table = "ChuyenMon";
    $query = "SELECT * FROM $table" ;
    $result = mysql_query($query, $link);

    if (!$result)
    {
    	print "failed to open the $table !";
    }
	else
	{
      echo "<form action='' method='GET' name='frmCM'>";
	  echo "<table border='1' align='center'>";
      echo "<tr>" ;
        echo "<th>Mã</th>" ;
        echo "<th>Tên chuyên môn</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
		{
			$macm = $row[0];
			$tencm= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$macm</td>";
    			echo "<td>$tencm</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_CM' value='$macm' />";
                    echo "<a href='xlXoaDMChuyenMon.php?MaCM=$macm' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_CM' value='$tencm' />";
                echo "<a href='xlCapNhatDMChuyenMon.php?MaCM=$macm&TenCM=$tencm ' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenCM' size='16' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertChuyenMon();' />";
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
