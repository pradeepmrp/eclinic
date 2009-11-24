<?php
    include 'db.inc';
    $tencm = $_REQUEST["TenCM"];
    $query_tt = "Insert Into ChuyenMon values (null,'$tencm')";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From ChuyenMon";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	print "failed to open the table !";
    }
    else
    {
      echo "<form action='' method='GET' name='frmKhoa'>";
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
                echo "<input type='hidden' id='ten_CSD' value='$tencm' />";
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


