<?php
    include 'db.inc';
    $table = "Quyen";
    $tenquyen = $_REQUEST["TenQuyen"];
    $query_tt = "Insert Into $table values (null,'$tenquyen')";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	print "failed to open the $table !";
    }
    else
    {
      echo "<form action='' method='GET' name='frmQuyen'>";
	  echo "<table border='1' align='center'>";
      echo "<tr>" ;
        echo "<th>Mã quyền</th>" ;
        echo "<th>Tên quyền</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
		{
			$maquyen = $row[0];
			$tenquyen= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$maquyen</td>";
    			echo "<td>$tenquyen</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_Quyen' value='$maquyen' />";
                    echo "<a href='xlXoaDMQuyen.php?MaQuyen=$maquyen' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_Quyen' value='$tenquyen' />";
                echo "<a href='xlCapNhatDMQuyen.php?MaQuyen=$maquyen&TenQuyen=$tenquyen ' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenQuyen' size='25' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertQuyen();' />";
            echo "</td>";
		echo "</tr>";
       echo "</table>";
       echo "</form>";
      }
      echo "<br/>";
      mysql_close( $link );
?>


