<?php
    include 'db.inc';
    $table = "Quyen";
    $ma_quyen = $_REQUEST["MaQuyen"];
    $query_tt = "Delete From $table Where MaQuyen=$ma_quyen";
    $result_tt = mysql_query($query_tt, $link);

    $query_sel = "Select * From $table";
    $result = mysql_query($query_sel, $link);

    if (!$result_tt)
    {
    	//print "failed to open the $table !";
        //echo $query_tt;
        print "Quyền này đã được đưa vào sử dụng trong hệ thống. Không được xóa!.";
    }
    else
    {
       echo "<table border='0' align='center' name='tblViewInfo'>";
       echo "<tr>";
          echo "<td> Đã xóa quyền có mã là $ma_quyen </td>";
       echo "</tr>";
       echo "<tr>";
          echo "<td><a href='DMQuyen.php'><b>Tiếp tục</b></a></td>";
       echo "</tr>";
       echo "</table>";
    }
      echo "<br/>";
      mysql_close( $link );
?>



