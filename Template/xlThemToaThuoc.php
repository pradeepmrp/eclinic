<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Hospital</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="xlLTT.js"></script>
</head>

<body>
<?php
    include 'db.inc';
    $mp = $_REQUEST["MP"];
    $nk = $_REQUEST["NK"];
    $ld = $_REQUEST["LD"];
    //Thêm vào bảng toathuoc
    $query_tt = "Insert Into toathuoc values (null,$mp, '$nk', '$ld')";
    $result_tt = mysql_query($query_tt, $link);
    $query_pk = "Update phieukcb set MaTrangThai=2 Where MaPhieuKCB=$mp";
    $result_pk = mysql_query($query_pk, $link);

    if (!$result_tt)
    {
    	print "failed to open the table !";
    }
   else
   {
           echo "<table border='1'>";
              echo "<tr>" ;
                echo "<th><input type='checkbox' name='chkAll' /></th>" ;
                echo "<th>STT</th>" ;
                echo "<th>Tên thuốc</th>" ;
                echo "<th>Số lượng</th>" ;
                echo "<th>Sáng</th>" ;
                echo "<th>Trưa</th>" ;
                echo "<th>Chiều</th>" ;
                echo "<th>Tối</th>" ;
                echo "<th>Ghi chú</th>" ;
                echo "<th colspan='2'></th>" ;
              echo "</tr>" ;
                echo "<tr>";
                    echo "<td><input type='checkbox' name='chkMaTTs[]' value=''/></td>";
            	    echo "<td></td>";
            	    echo "<td>";
                       include 'db.inc';
                       $ds_tt=mysql_query("select * from thuoc");
                       echo "<select id='cmbthuoc'>";
                       while ($row_tt = mysql_fetch_array($ds_tt))
                       {
                            echo "<option value=" .$row_tt["MaThuoc"] . ">" . $row_tt["TenThuoc"] . "</option>";
                       }
                       echo "</select>";
                    echo "</td>";
                    echo "<td>";
                       echo "<input type='text' id='txtSoLuong' size='8' />";
                    echo "</td>";
              		echo "<td>";
                       echo "<select id='cmbSang'>";
        			        echo "<option id='sg0'>00</option>";
                			echo "<option id='sg1'>01</option>";
                			echo "<option id='sg2'>02</option>";
                			echo "<option id='sg3'>03</option>";
                            echo "<option id='sg4'>04</option>";
                			echo "<option id='sg5'>05</option>";
			            echo "</select>";
                    echo "</td>";
                    echo "<td>";
                       echo "<select id='cmbTrua'>";
        			        echo "<option id='tr0'>00</option>";
                			echo "<option id='tr1'>01</option>";
                			echo "<option id='tr2'>02</option>";
                			echo "<option id='tr3'>03</option>";
                            echo "<option id='tr4'>04</option>";
                			echo "<option id='tr5'>05</option>";
			            echo "</select>";
                    echo "</td>";
                    echo "<td>";
                       echo "<select id='cmbChieu'>";
        			        echo "<option id='ch0'>00</option>";
                			echo "<option id='ch1'>01</option>";
                			echo "<option id='ch2'>02</option>";
                			echo "<option id='ch3'>03</option>";
                            echo "<option id='ch4'>04</option>";
                			echo "<option id='ch5'>05</option>";
			            echo "</select>";
                    echo "</td>";
                    echo "<td>";
                       echo "<select id='cmbToi'>";
        			        echo "<option id='to0'>00</option>";
                			echo "<option id='to1'>01</option>";
                			echo "<option id='to2'>02</option>";
                			echo "<option id='to3'>03</option>";
                            echo "<option id='to4'>04</option>";
                			echo "<option id='to5'>05</option>";
			            echo "</select>";
                    echo "</td>";
              		echo "<td>";
                    echo "<input type='text' id='txtGhiChu' size='15' >";
                    echo "</td>";
               		echo "<td colspan='2'>";
                    echo "<input type='button' value='Thêm mới' id='btnAdd' name='btnAdd' onclick='InsertProcess();' />";
                    echo "</td>";
           		echo "</tr>";
                echo "</table>";
            echo "<br/>";
              mysql_close( $link );
        }
?>
</body>
</html>