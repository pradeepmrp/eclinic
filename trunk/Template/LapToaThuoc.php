<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Hospital</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="xlLTT.js"></script>
</head>

<body>

  <form action="" method="GET" name="formXuLy">
    <table border="0" width="100%" name="tblMain">
   	  <tr>
        <table border="0" id="tblView">
        <td>Mã phi&#7871;u khám</td>
        <td colspan="6">
            <?php
                 include 'db.inc';
                 $ds_pk=mysql_query("select * from phieukcb where MaTrangThai=1");
                 echo "<select id='cmbphieukcb'>";
                 while ($row_ph = mysql_fetch_array($ds_pk))
                 {
                      echo "<option value=" .$row_ph["MaPhieuKCB"] . ">" . $row_ph["MaPhieuKCB"] . "</option>";
                 }
                 echo "</select>";

            ?>
            <input type="button" id="btnViewInfo" value="Xem thông tin" onclick="ViewInfo(); " />
        </td>
        </table>
      </tr>
      <tr>
        <td colspan="6">
             <div id="divInfoResult"></div>
        </td>
   	  </tr>
      <tr>
        <td colspan="6">
             <div id="divDetailResult"></div>
        </td>
   	  </tr>
      <tr>
        <td>
            <input type = "button" id = "idLapTTMoi" value = "Lập toa thuốc mới" onclick = "Refresh();" />
        </td>
      </tr>
    </table>
  </form>
</body>
</html>