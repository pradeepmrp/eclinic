<?php
    include 'db.inc';
    $table = "LoaiNhanVien";
    $ma_loai = $_REQUEST["MaLoaiNV"];
    $query_tt = "Delete From $table Where MaLoaiNV=$ma_loai";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	//print "failed to open the $table !";
        //echo $query_tt;
        print "Loại nhân viên này đã được đưa vào sử dụng trong hệ thống. Không được xóa!.";
    }
    else
    {
       echo "<table border='0' align='center' name='tblViewInfo'>";
       echo "<tr>";
          echo "<td> Đã xóa loại nhân viên có mã là $ma_loai </td>";
       echo "</tr>";
       echo "<tr>";
          echo "<td><a href='DMLoaiNhanVien.php'><b>Tiếp tục</b></a></td>";
       echo "</tr>";
       echo "</table>";
    }
      echo "<br/>";
      mysql_close( $link );
?>



