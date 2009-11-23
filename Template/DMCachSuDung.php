<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Hello!</title>
  <script type="text/javascript" src="jsDanhMuc.js"></script>
</head>
<body>
<div id="divDetailResult">
<?php
    include 'db.inc';
    $table = "CachSD";
    $query = "SELECT * FROM $table" ;
    $result = mysql_query($query, $link);

    if (!$result)
    {
    	print "failed to open the $table !";
    }
	else
	{
      echo "<form action='' method='GET' name='frmXXX'>";
	  echo "<table border='1' align='center'>";
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
                    //echo "<input type='button' value='Xóa' id='btnDel' onclick='DeleteCachSuDung();' />";
                    echo "<a href='xlXoaDMCachSuDung.php?MaCachSD=$macsd' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_CSD' value='$tencsd' />";
               // echo "<input type='button' value='Sửa' id='btnUpd' onclick='UpdateCachSuDung();' />";
                echo "<a href='xlCapNhatDMCachSuDung.php?MaCachSD=$macsd&TenCachSD=$tencsd ' >Sửa</a>";
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
        echo "</form>";
	}
    echo "<br/>";
  	mysql_close( $link );
 ?>
</div>
</body>

</html>
