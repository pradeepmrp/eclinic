<?php
    include 'db.inc';
    $ma_csd = $_REQUEST["MaCachSD"];

    $query_tt = "Delete From CachSD Where MaCachSD=$ma_csd";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From CachSD";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	print "failed to open the table !";
        echo $query_tt;
    }
    else
    {
       echo "<table border='0' align='center' name='tblViewInfo'>";
       echo "<tr>";
          echo "<td> Đã xóa cách sử dụng thuốc có mã là $ma_csd </td>";
       echo "</tr>";
       echo "<tr>";
          echo "<td><a href='DMCachSuDung.php'><b>Tiếp tục</b></a></td>";
       echo "</tr>";
       echo "</table>";
       //echo "Đã xóa cách sử dụng thuốc có mã là $ma_csd";
       //echo "<br><a href='DMCachSuDung.php?'><b>Tiếp tục</b></a>";
     /* echo "<form action='' method='GET' name='frmXXX'>";
	  echo "<table border='1'>";
      echo "<tr>" ;
        echo "<th>Mã</th>" ;
        echo "<th>Tên cách sử dụng</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
      {
			$macsd = $row[0];
			$tencsd= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$macsd</td>";
    			echo "<td>$tencsd</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_CSD' value='$macsd' />";
                    echo "<a href='xlXoaDMCachSuDung.php?MaCachSD=$macsd' >Xóa</a>";
                 //echo "<input type='button' value='Xóa' id='btnDel' onclick='DeleteCachSuDung();' />";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' name='TenCachSD' value='$tencsd' />";
                //echo "<input type='button' value='Sửa' id='btnUpd' onclick='UpdateCachSuDung();' />";
               echo "<a href='xlCapNhatDMCachSuDung.php?MaCachSD=$macsd&TenCachSD='$tencsd' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenCachSD' size='16' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertCachSuDung();' />";
            echo "</td>";
		echo "</tr>";
       echo "</table>";
        echo "</form>";    */
      }
      echo "<br/>";
      mysql_close( $link );
?>



