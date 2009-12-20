<script language="javascript">
function CheckInput()
{
	if(document.login.user.value=="")
	{
		alert("Vui lòng nhập Username");
		document.login.user.focus();
		return false;
	}
	if(document.login.pass.value=="")
	{
		alert("Vui lòng nhập password");
		document.login.pass.focus();
		return false;
	}
}
</script>
<form name="login" method="get" action="include/login.php" onsubmit="return CheckInput();">
<b>&nbsp;User :</b>
<input type="text" class="input_text" name="user"/>
<br/>
<b>&nbsp;Pass :</b>
<input type="password" class="input_text" name="pass"/>
<br />
<input type="submit" value="log in" class="button_login" onmouseover="this.style.backgroundColor='#99FFFF'" onmouseout="this.style.backgroundColor='#808080'"/>
</form>