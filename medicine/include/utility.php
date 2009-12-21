<?php
	function ChangeFormatDate($vnDate)
	{
		$arr=split("/",$vnDate);
		//yyyy-mm-dd
		$result=$arr[2]."-".$arr[1]."-".$arr[0];
		return $result;
	}
?>