<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Quản lý danh mục Quyền</title>
  <script type="text/javascript" src="jsDanhMuc.js"></script>
</head>
<body>
<div id="divDetailResult">
<?php
    include 'db.inc';
    $table = "Quyen";
    $query = "SELECT * FROM $table" ;
    $result = mysql_query($query, $link);

    if (!$result)
    {
    	print "failed to open the $table !";
    }
	else
	{
      echo "<form action='' method='GET' name='frmQuyen'>";
	  echo "<table border='1' align='center'>";
      echo "<tr>" ;
        echo "<th>Mã quyền</th>" ;
        echo "<th>Tên quyền</th>" ;
      echo "</tr>" ;
      while ($row = mysql_fetch_row($result))
		{
			$maquyen = $row[0];
			$tenquyen= $row[1];
			echo "<tr align='center'>";
    			echo "<td>$maquyen</td>";
    			echo "<td>$tenquyen</td>";
    			echo "<td>";
    		    	echo "<input type='hidden' id='ma_Quyen' value='$maquyen' />";
                    echo "<a href='xlXoaDMQuyen.php?MaQuyen=$maquyen' >Xóa</a>";
              	echo "</td>";
              echo"<td>";
                echo "<input type='hidden' id='ten_Quyen' value='$tenquyen' />";
                echo "<a href='xlCapNhatDMQuyen.php?MaQuyen=$maquyen&TenQuyen=$tenquyen ' >Sửa</a>";
             echo"</td>";
           echo "</tr>";
		}
         echo "<tr>";
     	    echo "<td></td>";
    	    echo "<td><input type='text' id='txtTenQuyen' size='25' /></td>";
       		echo "<td colspan='2'>";
            echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertQuyen();' />";
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
