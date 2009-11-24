<?php
    include 'db.inc';
    $table = "TrangThai";
    $ma_tt = $_REQUEST["MaTT"];
    $query_tt = "Delete From $table Where MaTT=$ma_tt";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	//print "failed to open the $table !";
        //echo $query_tt;
        print "Trạng thái này đã được đưa vào sử dụng trong hệ thống. Không được xóa!.";
    }
    else
    {
       echo "<table border='0' align='center' name='tblViewInfo'>";
       echo "<tr>";
          echo "<td> Đã xóa trạng thái có mã là $ma_tt </td>";
       echo "</tr>";
       echo "<tr>";
          echo "<td><a href='DMTrangThai.php'><b>Tiếp tục</b></a></td>";
       echo "</tr>";
       echo "</table>";
    }
      echo "<br/>";
      mysql_close( $link );
?>



