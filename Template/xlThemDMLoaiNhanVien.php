<?php
    include 'db.inc';
    $table = "LoaiNhanVien";
    $tenloainv = $_REQUEST["TenLoaiNV"];
    $query_tt = "Insert Into $table values (null,'$tenloainv')";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
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
    	    echo "<td><input type='text' id='txtTenLoaiNv' size='35' /></td>";
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


