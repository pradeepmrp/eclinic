<?php 
include '../db.inc';
$u=$_REQUEST['user'];
$p=$_REQUEST['pass'];
echo $u."&nbsp;".$p;
if($u && $p)
{
	$sql="select * from taikhoan where TenDN='".$u."' and MatKhau='".$p."'";
	$result=mysql_query($sql,$link);
	if(mysql_num_rows($result)== 0)
	{	
		$tb="Username or password is not correct, please try again";
	}
	else
	{
		$row=mysql_fetch_array($result);
		
		session_start();
		
		session_register("userid");
		
		session_register("level");
		
		$_SESSION['userid'] = $row['MaTK'];
		
		$_SESSION['level'] = $row['MaQuyen'];
		
	}

} 
header("Location:../index.php");
?>

