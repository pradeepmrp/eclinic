<?php
    include 'db.inc';
    $table = "Khoa";
    $tenkhoa = $_REQUEST["TenKhoa"];
    $query_tt = "Insert Into $table values (null,'$tenkhoa')";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	print "failed to open the $table !";
    }
    else
    {
      echo "<form action='' method='GET' name='frmKhoa'>";
	  echo "<table border='1' align='center'>";
      echo "<tr>" ;
        echo "<th>Mã khoa</th>" ;
        echo "<th>Tên khoa</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
		{
			$makhoa = $row[0];
			$tenkhoa= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$makhoa</td>";
    			echo "<td>$tenkhoa</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_Khoa' value='$makhoa' />";
                    echo "<a href='xlXoaDMKhoa.php?MaKhoa=$makhoa' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_Khoa' value='$tenkhoa' />";
                echo "<a href='xlCapNhatDMKhoa.php?MaKhoa=$makhoa&TenKhoa=$tenkhoa ' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenKhoa' size='16' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertKhoa();' />";
            echo "</td>";
		echo "</tr>";
        echo "</table>";
        echo "</form>";
      }
      echo "<br/>";
      mysql_close( $link );
?>


