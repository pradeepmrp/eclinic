var xmlhttp;
function GetXmlHttpObject()
{
	if (window.XMLHttpRequest)
	{
		// code for IE7+, Firefox, Chrome, Opera, Safari
		return new XMLHttpRequest();
	}
	if (window.ActiveXObject)
	{
		// code for IE6, IE5
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}

function InsertCachSuDung()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var ten = document.getElementById("txtTenCachSD").value;
    var url = "xlThemDMCachSuDung.php?TenCSD="+ten;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}

function UpdateCachSuDung()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}
}
function DeleteCachSuDung()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}
   	xmlhttp.onreadystatechange = showDetailResult;
   	var a = document.getElementById("ma_CSD").value;
    var url = "xlXoaDMCachSuDung.php?MA="+a;
	url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);

}

function showDetailResult()
{
	if (xmlhttp.readyState==4 && xmlhttp.status == 200)
	{
		document.getElementById("divDetailResult").innerHTML=xmlhttp.responseText;
	}
}

