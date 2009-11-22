<?php
          include 'db.inc';
         // if(isset($_REQUEST["btnViewInfo"]))
         // $ma = $_REQUEST["maPhieu"];
          $maPK = $_REQUEST["maPhieu"];

          $query = "Select bn.HoTen,bn.NgaySinh,pk.NgayKham, bn.DiaChi,bn.SoDienThoai,bn.SoCMND From BenhNhan bn,PhieuKCB pk Where bn.MaBN=pk.MaBN and pk.MaPhieuKCB=$maPK ";
          $result = mysql_query($query, $link);
          if (!$result)
          {
          	print "failed to open the table !";
          }
      	else
      	{
      		echo "<form action='' method='GET'>";

      		echo "<table border='0'>";
            while ($row = mysql_fetch_row($result))
      		{
      			$hoten = $row[0];
      			$ngaysinh= $row[1];
      			$ngaykham = $row[2];
      			$diachi = $row[3];
      			$dienthoai= $row[4];
      			$cmnd= $row[5];
      		}
            echo "<tr>";
              echo "<td>Họ tên</td>";
              echo "<td><input type='text' id='txtHoTen' size='28' readonly='true' value='$hoten'></td>";
        	  echo "<td>Ngày sinh</td>";
              echo "<td><input type='text' id='txtNgaySinh' size='16' readonly='true' value='$ngaysinh'></td>";
              echo "<td>Ngày khám</td>";
  		      echo "<td><input type='text' id='txtNgayKham' size='16' readonly='true' value='$ngaykham'></td>";
           echo "</tr>";
           echo "<tr>";
              echo "<td>Địa chỉ</td>";
              echo "<td><input type='text' id='txtDiaChi' size='28' readonly='true' value='$diachi'></td>";
        	  echo "<td>Điện thoại</td>";
              echo "<td><input type='text' id='txtDienThoai' size='16' readonly='true' value='$dienthoai'></td>";
              echo "<td>Số CMND</td>";
  		      echo "<td><input type='text' id='txtSoCMND' size='16' readonly='true' value='$cmnd'></td>";
           echo "</tr>";
           echo "<tr>";
              echo "<td>Chuẩn đoán</td>";
              include 'db.inc';
                 $ds_lb=mysql_query("select * from loaibenh");
                  echo "<select id='cmbloaibenh'>";
                  while ($row_lb = mysql_fetch_array($ds_lb))
                  {
                      echo "<option value=" .$row_lb["MaLoaiBenh"] . ">" . $row_lb["TenLoaiBenh"] . "</option>";
                  }
                  echo "</select>";
              echo "<td>Lời dặn của BS</td>";
              echo "<td colspan='2'>";
                  echo "<input type='text' id='txtLDCuaBS' size='30' >";
              echo "</td>";
              echo "<td>";
                echo "<input type='button' value='Lập toa thuốc' id='btnLapTT' onclick='InsToaThuoc();' />";
              echo "</td>";
           echo "</tr>";
           echo "<br/>";
        	mysql_close( $link );
    }
  ?>