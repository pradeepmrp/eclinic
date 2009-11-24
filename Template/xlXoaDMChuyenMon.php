<?php
    include 'db.inc';
    $table = "ChuyenMon";
    $ma_cm = $_REQUEST["MaCM"];
    $query_tt = "Delete From $table Where MaCM=$ma_cm";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	print "failed to open the $table !";
        echo $query_tt;
    }
    else
    {
       echo "<table border='0' align='center' name='tblViewInfo'>";
       echo "<tr>";
          echo "<td> Đã xóa chuyên môn có mã là $ma_cm </td>";
       echo "</tr>";
       echo "<tr>";
          echo "<td><a href='DMChuyenMon.php'><b>Tiếp tục</b></a></td>";
       echo "</tr>";
       echo "</table>";
    }
      echo "<br/>";
      mysql_close( $link );
?>



