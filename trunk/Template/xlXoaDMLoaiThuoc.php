<?php
    include 'db.inc';
    $table = "LoaiThuoc";
    $ma_lt = $_REQUEST["MaLT"];
    $query_tt = "Delete From $table Where MaLoaiThuoc=$ma_lt";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	//print "failed to open the $table !";
        //echo $query_tt;
        print "Loại thuốc này đã được đưa vào sử dụng trong hệ thống. Không được xóa!.";
    }
    else
    {
       echo "<table border='0' align='center' name='tblViewInfo'>";
       echo "<tr>";
          echo "<td> Đã xóa loại thuốc có mã là $ma_lt </td>";
       echo "</tr>";
       echo "<tr>";
          echo "<td><a href='DMLoaiThuoc.php'><b>Tiếp tục</b></a></td>";
       echo "</tr>";
       echo "</table>";
    }
      echo "<br/>";
      mysql_close( $link );
?>



