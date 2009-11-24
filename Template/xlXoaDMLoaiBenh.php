<?php
    include 'db.inc';
    $table = "LoaiBenh";
    $ma_lb = $_REQUEST["MaLB"];
    $query_tt = "Delete From $table Where MaLoaiBenh=$ma_lb";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	//print "failed to open the $table !";
        //echo $query_tt;
        print "Loại bệnh này đã được đưa vào sử dụng trong hệ thống. Không được xóa!.";
    }
    else
    {
       echo "<table border='0' align='center' name='tblViewInfo'>";
       echo "<tr>";
          echo "<td> Đã xóa loại bệnh có mã là $ma_lb </td>";
       echo "</tr>";
       echo "<tr>";
          echo "<td><a href='DMLoaiBenh.php'><b>Tiếp tục</b></a></td>";
       echo "</tr>";
       echo "</table>";
    }
      echo "<br/>";
      mysql_close( $link );
?>



