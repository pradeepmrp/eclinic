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
function InsertChuyenMon()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var ten = document.getElementById("txtTenCM").value;
    var url = "xlThemDMChuyenMon.php?TenCM="+ten;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}
function InsertKhoa()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var ten = document.getElementById("txtTenKhoa").value;
    var url = "xlThemDMKhoa.php?TenKhoa="+ten;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}
function InsertLoaiBenh()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var ten = document.getElementById("txtTenLB").value;
    var url = "xlThemDMLoaiBenh.php?TenLB="+ten;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}
function InsertLoaiNhanVien()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var ten = document.getElementById("txtTenLoaiNV").value;
    var url = "xlThemDMLoaiNhanVien.php?TenLoaiNV="+ten;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}
function InsertLoaiPhongPhatThuoc()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var ten = document.getElementById("txtTenLP").value;
    var url = "xlThemDMLoaiPhongPhatThuoc.php?TenLP="+ten;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}
function InsertLoaiThuoc()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var ten = document.getElementById("txtTenLT").value;
    var url = "xlThemDMLoaiThuoc.php?TenLT="+ten;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}
function InsertQuyen()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var ten = document.getElementById("txtTenQuyen").value;
    var url = "xlThemDMQuyen.php?TenQuyen="+ten;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}
function InsertTrangThai()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var ten = document.getElementById("txtTenTT").value;
    var url = "xlThemDMTrangThai.php?TenTT="+ten;
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

