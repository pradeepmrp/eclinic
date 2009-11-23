 <?php

          include 'db.inc';
         //if(isset($_REQUEST["btnAdd"]))
          $mp = $_REQUEST["MP"];
          $nk = $_REQUEST["NK"];
          $ld = $_REQUEST["LD"];
          $lb = $_REQUEST["LB"];
          $mt = $_REQUEST["MT"];
          $sl = $_REQUEST["SL"];
          $sg = $_REQUEST["SG"];
          $tr = $_REQUEST["TR"];
          $ch = $_REQUEST["CH"];
          $to = $_REQUEST["TO"];
          $gc = $_REQUEST["GC"];
          $mt_del = $_REQUEST["MTH"];
          $mtt_del = $_REQUEST["MTT"];
          $count=0;
          $matt = mysql_query("Select matoathuoc From toathuoc Where maphieukcb=$mp");
          while ($row_tt = mysql_fetch_array($matt))
          {
            $query_ct = "Delete FROM chitiettoathuoc Where MaThuoc=$mt_del and MaToaThuoc=$mtt_del";
            $result_ct = mysql_query($query_ct, $link);
            $selquery = "SELECT t.TenThuoc, ct.SoLuong,ct.Sang,ct.Trua,ct.Chieu,ct.Toi,ct.GhiChu,ct.MaToaThuoc FROM chitiettoathuoc ct,thuoc t WHERE ct.MaThuoc=t.MaThuoc and ct.MaToaThuoc=$row_tt[0] " ;
            $selresult = mysql_query($selquery, $link);
          }
          if (!$result_ct)
          {
          	print "failed to open the table !";
            echo $result_ct;
          }
         else
      	 {
      	   echo "<form action='' method='GET' id='frmXXL'>";
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
            while ($row = mysql_fetch_row($selresult))
      		{
                $count = $count+1;
                $tenthuoc = $row[0];
      			$soluong = $row[1];
      			$sang = $row[2];
      			$trua = $row[3];
      			$chieu = $row[4];
      			$toi = $row[5];
      			$ghichu = $row[6];
                $matoathuoc = $row[7];
      			echo "<tr>";
          			echo "<td><input type='checkbox' name='chkMaThuocs[]' value='$mt'/></td>";
                    echo "<td align='center'>$count</td>";
          			echo "<td>$tenthuoc</td>";
          			echo "<td align='center'>$soluong</td>";
          			echo "<td align='center'>$sang</td>";
          			echo "<td align='center'>$trua</td>";
          			echo "<td align='center'>$chieu</td>";
          			echo "<td align='center'>$toi</td>";
          			echo "<td>$ghichu</td>";
          			echo "<td>";
            		   	echo "<input type='hidden' id='maThuoc' value='$mt' />";
            		   	echo "<input type='hidden' id='maTThuoc' value='$matoathuoc' />";
                       // echo "<a href='xlXoaCTToaThuoc.php'> Xóa</a>";
                        echo "<input type='button' value='Xóa' id='btnDel' onclick='DeleteProcess();' />";
          			echo "</td>";
                    echo"<td>";
                        echo "<input type='hidden' name='TenThuoc' value='$tenthuoc' />";
                        echo "<input type='hidden' name='SoLuong' value='$soluong' />";
                        echo "<input type='hidden' name='Sang' value='$sang' />";
                        echo "<input type='hidden' name='Trua' value='$trua' />";
                        echo "<input type='hidden' name='Chieu' value='$chieu' />";
                        echo "<input type='hidden' name='Toi' value='$toi' />";
                        echo "<input type='hidden' name='GhiChu' value='$ghichu' />";
                     //   echo "<a href='HienThiVaCapNhatTT.php' id='linkCapNhat' onclick='UpdateProcess();'>Sửa</a>";
                        echo "<input type='button' value='Sửa' id='btnUpd' onclick='UpdateProcess();' />";
                   echo"</td>";
                echo "</tr>";

      		}
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
                    echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertProcess();' />";
                    echo "</td>";
           		echo "</tr>";
              echo "</table>";
           }
           echo "<br/>";
           mysql_close( $link );
?>

