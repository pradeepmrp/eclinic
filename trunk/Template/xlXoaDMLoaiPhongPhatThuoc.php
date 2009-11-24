<?php
    include 'db.inc';
    $table = "LoaiPhongPhatThuoc";
    $ma_lp = $_REQUEST["MaLP"];
    $query_tt = "Delete From $table Where MaLoaiPhong=$ma_lp";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	//print "failed to open the $table !";
        //echo $query_tt;
        print "Loại phòng phát thuốc này đã được đưa vào sử dụng trong hệ thống.";
        echo "<br>";
        print "Không được xóa!.";
    }
    else
    {
       echo "<table border='0' align='center' name='tblViewInfo'>";
       echo "<tr>";
          echo "<td> Đã xóa loại phòng phát thuốc có mã là $ma_lp </td>";
       echo "</tr>";
       echo "<tr>";
          echo "<td><a href='DMLoaiPhongPhatThuoc.php'><b>Tiếp tục</b></a></td>";
       echo "</tr>";
       echo "</table>";
    }
      echo "<br/>";
      mysql_close( $link );
?>



