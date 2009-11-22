<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Hospital</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="Styles/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="xlLTT.js"></script>
</head>

<body>
	<!--Master container for the page begins here-->
	<div id="mast_container">
		<div id="masthead">
		
		</div>
		<!--Top Container begins here-->
		<div class="top_container">
			<div id="top_left_col">
				<hr />
				<div id="links">
				<ul>
					<li><a name="home" href="">HOME</a></li>
					<li><a name="about" href="">ABOUT US</a></li>
					<li><a name="patient" href="">PATIENT CARE</a></li>
					<li><a name="child" href="">CHILD CARE</a></li>
					<li><a name="services" href="">SERVICES</a></li>
					<li><a name="career" href="">CAREER</a></li>
					<li><a name="contact" href="">CONTACT US</a></li>
				</ul>
			</div>

			</div>
			<div id="top_page_content">
				<hr id="redhr" />
				<div id="img1"><img src="Images/image1.JPG" alt="" width="100%" height="100%"/></div>
			</div>
		</div>

		<div class="bot_container">
			<div id="bot_left_col">
				<hr/>
				<div id="login_form">
				
				<b>Username:</b>
				<input type="text" class="input_text"/>
				<br/>
				<b>Password:</b>
				<input type="text" class="input_text"/>
				<br />
			   <input type="submit" value="LOG IN" class="button"/>
				</div>
				<hr/>
				<div id="categories">
				<ul>
						<li><a name="pead" href="">PEADEATRICS</a></li>
						<li><a name="gyna" href="">GYNAECOLOGY</a></li>
						<li><a name="dent" href="">DENTAL CARE</a></li>
						<li><a name="ortho" href="">ORTHOPEDICS</a></li>
						<li><a name="cardio" href="">CARDIOLOGY</a></li>
						<li><a name="mater" href="">MATERNITY</a></li>
						<li><a name="pead" href="">PEADEATRICS</a></li>
						<li><a name="gyna" href="">GYNAECOLOGY</a></li>
						<li><a name="dent" href="">DENTAL CARE</a></li>
						<li><a name="ortho" href="">ORTHOPEDICS</a></li>
						<li><a name="cardio" href="">CARDIOLOGY</a></li>
						<li><a name="mater" href="">MATERNITY</a></li>

				</ul>
				</div>
			</div>
			<div id="bot_page_content">
				<hr id="bluehr"/>
			 <div id="desc">
			 <div id="th2">LẬP TOA THUỐC CHO BỆNH NHÂN</div>
			 <br />
				<form action="" method="POST" name="formXuLy">
					<table border="0" width="100%" name="tblMain">
						<tr>
							<td>Mã phi&#7871;u khám</td>
							<td>
								<?php
									 include 'db.inc';
									 $ds_pk=mysql_query("select * from phieukcb");
									 echo "<select id='cmbphieukcb'>";
									 while ($row_ph = mysql_fetch_array($ds_pk))
									 {
										  echo "<option value=" .$row_ph["MaPhieuKCB"] . ">" . $row_ph["MaPhieuKCB"] . "</option>";
									 }
									 echo "</select>";

								?>
								<input type="button" id="btnViewInfo" value="Xem thông tin" onclick="ViewInfo(); " />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div id="divInfoResult">
								<?php
											include 'db.inc';
											$maph =1;// $_REQUEST("cmbphieukcb");
											$matt = "Select MaToaThuoc From ToaThuoc Where MaPhieuKCB=$maph";
											$query = "SELECT t.TenThuoc, ct.SoLuong,ct.Sang,ct.Trua,ct.Chieu,ct.Toi,ct.GhiChu FROM chitiettoathuoc ct,thuoc t WHERE ct.MaThuoc=t.MaThuoc and MaToaThuoc=$matt " ;
											$result = mysql_query($query, $link);

											if (!$result)
											{
												print "failed to open the table !";
											}
											else
											{

											  echo "<table border='1'>";
											  echo "<tr>" ;
												  echo "<th><input type='checkbox' name='chkAll' onclick='checkAll(document.form1.chkMaNVs);' /></th>" ;
												  echo "<th>STT</th>" ;
												  echo "<th>Tên thuốc</th>" ;
												  echo "<th>Số lượng</th>" ;
												  echo "<th>Sáng</th>" ;
												  echo "<th>Trưa</th>" ;
												  echo "<th>Chiều </th>" ;
												  echo "<th>Tối</th>" ;
												  echo "<th colspan='2'>Ghi chú</th>" ;
											  echo "</tr>" ;
											  while ($row = mysql_fetch_row($result))
												{
													$tenthuoc = $row[0];
													$soluong= $row[1];
													$sang = $row[2];
													$trua = $row[3];
													$chieu = $row[4];
													$toi = $row[5];
													$ghichu = $row[6];
													echo "<tr>";
														echo "<td><input type='checkbox' name='chkMaTTs[]' value='$matt'/></td>";
														echo "<td>$tenthuoc</td>";
														echo "<td>$soluong</td>";
														echo "<td>$sang</td>";
														echo "<td>$trua</td>";
														echo "<td>$chieu</td>";
														echo "<td>$toi</td>";
														echo "<td>$ghichu</td>";
														echo "<td>";
															echo "<input type='hidden' id='MaToaThuoc' value='$matt' />";
															echo "<a href='xlXoaToaThuoc.php?MaToaThuoc=$matt'> Xóa</a>";
														echo "</td>";
														echo"<td>";
															echo "<a href='xlCapNhatToaThuoc.php' id='linkCapNhat' onclick='UpdateProcess();'> Cập nhật</a>";
														echo"</td>";
													echo "</tr>";


												}
												echo "<tr>";
												  echo "<td><input type='checkbox' name='chkMaNVs[]' value='$matt'/></td>";
												  echo "<td></td>";
												  echo "<td>";
														 echo "<input type='text' id='txtSoLuong' size='8' />";
												  echo "</td>";
												  echo "<td  align='center'>";
												  echo "<select id='cmbSang'>";
													echo "<option id='sg0'>00</option>";
													echo "<option id='sg1'>01</option>";
													echo "<option id='sg2'>02</option>";
													echo "<option id='sg3'>03</option>";
													echo "<option id='sg4'>04</option>";
													echo "<option id='sg5'>05</option>";
												  echo "</select></td>";
												   echo "<td  align='center'>";
														echo"<select id='cmbTrua'>";
														echo "<option id='tr0'>00</option>";
														echo "<option id='tr1'>01</option>";
														echo "<option id='tr2'>02</option>";
														echo "<option id='tr3'>03</option>";
														echo "<option id='tr4'>04</option>";
														echo "<option id='tr5'>05</option>";
														echo "</select></td>";
													echo "<td  align='center'>";
													   echo "<select id='cmbChieu'>";
														echo "<option id='ch0'>00</option>";
														echo "<option id='ch1'>01</option>";
														echo "<option id='ch2'>02</option>";
														echo "<option id='ch3'>03</option>";
														echo "<option id='ch4'>04</option>";
														echo "<option id='ch5'>05</option>";
													echo "</select></td>";
													echo "<td  align='center'>";
														echo "<select id='cmbToi'>";
														echo "<option id='to0'>00</option>";
														echo "<option id='to1'>01</option>";
														echo "<option id='to2'>02</option>";
														echo "<option id='to3'>03</option>";
														echo "<option id='to4'>04</option>";
														echo "<option id='to5'>05</option>";
													echo "</select></td>";
													echo "<td align='center'><input type='text' id='txtGhiChu' size='15' ></td>";
													echo "<td colspan='2'>";
														echo "<input type='button' value='Thêm mới' id='btnAdd' onclick='InsertProcess();' />";
													echo "</td>";
												echo "</tr>";
											  echo "</table>";
														 //  echo "</form>";
											}

										   echo "<br/>";
											mysql_close( $link );
										 ?>
								   </div>
							</td>

						</tr>
					   </table>
					</form>
				</div>
			</div>
		</div>


		<div id="footer">
			<hr/>
			<div id="footer_links">
				<a name="home" href="">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a name="about" href="">ABOUT US</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a name="patient" href="">PATIENT CARE</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a name="child" href="">CHILD CARE</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a name="services" href="">SERVICES</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a name="career" href="">CAREER</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a name="contact" href="">CONTACT US</a>
			</div>
			<hr id="bluehr"/>
			<div id="credit">
				Created by Saffron Stroke (2009)
			</div>
		</div>
		<!--Footer ends here-->
	</div>
	<!--Master container for the page ends here-->
</body>

</html>
