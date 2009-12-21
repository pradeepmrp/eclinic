<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>eclinic</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link href="Styles/index.css" rel="stylesheet" type="text/css" />
 <script language="JavaScript">
function calcHeight()
{    
    var dodai_trang = document.getElementById('noidung').contentWindow.document.body.scrollHeight;
    document.getElementById('noidung').height=(dodai_trang+100);
}
</script>
</head> 


<body > 

	<!--Master container for the page begins here-->
	<div id="mast_container">
		<?php include 'include/header.php';?>
				<!--Top Container begins here-->
		<div class="top_container">
			<div id="top_left_col">
			<hr/>
				<div id="links">
		<?php include 'include/HomeMenu.php';?>
				</div>
			</div>
		</div>
		<!--Top Container ends here-->
		
		<!--Bottom Container begins here-->
		<div class="bot_container">
			<div id="bot_left_col">
				<hr id='redhr'/>
				<div id="login_form">
				<?php 
					if(isset($_SESSION['userid']))
					{
						include 'include/logged.php';
					}
					else
						include 'include/login_form.php';
					?>
				</div>
				<hr id="redhr"/>
				<div id="categories">
				<?php include 'include/chucnang_user.php';?>
				</div>
			</div>
			<div id="bot_page_content">
				<hr id="bluehr"/>
				<div id="desc">
				<!-------------content------------->
				
				<iframe frameborder="0" id="noidung" style="background-color:#CCCCFF;" name="noidung" scrolling="no" allowtransparency="true" onload="calcHeight();"></iframe>
				<!-------------/content------------->
				</div>
			</div>
		</div>
		<!--Bottom Container ends here-->

		<!--Footer begins here-->
		<div id="footer">
			<hr/>
			<div id="footer_links">
				<?php include 'include/HomeMenu.php';?>
			</div>
			
			
		</div>
		<!--Footer ends here-->
	</div>
	<!--Master container for the page ends here-->
</body>

</html>
