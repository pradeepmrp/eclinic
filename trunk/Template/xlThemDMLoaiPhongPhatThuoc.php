<?php
    include 'db.inc';
    $table = "LoaiPhongPhatThuoc";
    $tenlp = $_REQUEST["TenLP"];
    $query_tt = "Insert Into $table values (null,'$tenlp')";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
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


