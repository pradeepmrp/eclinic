<?php
    include 'db.inc';
    $table = "TrangThai";
    $tentt = $_REQUEST["TenTT"];
    $query_tt = "Insert Into $table values (null,'$tentt')";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
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


