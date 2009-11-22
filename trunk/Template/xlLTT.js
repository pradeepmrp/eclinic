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
function Refresh()
{
    window.location = "index.php";
}
function ViewInfo()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showInfoResult;
	var a = document.getElementById("cmbphieukcb").value;
	var url = "xlXemTTBenhNhan.php?maPhieu="+a;
	url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}

function InsertProcess()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var mp = document.getElementById("cmbphieukcb").value;
  	var nk = document.getElementById("txtNgayKham").value;
	var ld = document.getElementById("txtLDCuaBS").value;
   	var lb = document.getElementById("cmbloaibenh").value;
   	var mt = document.getElementById("cmbthuoc").value;
   	var sl = document.getElementById("txtSoLuong").value;
   	var sg = document.getElementById("cmbSang").value;
    var tr = document.getElementById("cmbTrua").value;
   	var ch = document.getElementById("cmbChieu").value;
   	var to = document.getElementById("cmbToi").value;
   	var gc = document.getElementById("txtGhiChu").value;

    var url = "xlThemCTToaThuoc.php?MP="+mp+"&NK="+nk+"&LD="+ld+"&LB="+lb+"&MT="+mt+"&SL="+sl+"&SG="+sg+"&TR="+tr+"&CH="+ch+"&TO="+to+"&GC="+gc;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}

function UpdateProcess()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}
//	xmlhttp.onreadystatechange = showDetailResult;
    window.location = "frmHienThiCapNhatCTToaThuoc.php";
    var mp = document.getElementById("cmbphieukcb").value;
  	var nk = document.getElementById("txtNgayKham").value;
	var ld = document.getElementById("txtLDCuaBS").value;
   	var lb = document.getElementById("cmbloaibenh").value;
   	var mt = document.getElementById("cmbthuoc").value;
   	var sl = document.getElementById("txtSoLuong").value;
   	var sg = document.getElementById("cmbSang").value;
    var tr = document.getElementById("cmbTrua").value;
   	var ch = document.getElementById("cmbChieu").value;
   	var to = document.getElementById("cmbToi").value;
   	var gc = document.getElementById("txtGhiChu").value;

    var url = "frmHienThiCapNhatCTToaThuoc.php?MP="+mp+"&NK="+nk+"&LD="+ld+"&LB="+lb+"&MT="+mt+"&SL="+sl+"&SG="+sg+"&TR="+tr+"&CH="+ch+"&TO="+to+"&GC="+gc;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}
function DeleteProcess()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
   	var a = document.getElementById("maThuoc").value; // ma thuoc muon xoa
   	var b = document.getElementById("maTThuoc").value;// ma toa thuoc muon xoa
  	var mp = document.getElementById("cmbphieukcb").value;
  	var nk = document.getElementById("txtNgayKham").value;
	var ld = document.getElementById("txtLDCuaBS").value;
   	var lb = document.getElementById("cmbloaibenh").value;
   	var mt = document.getElementById("cmbthuoc").value;
   	var sl = document.getElementById("txtSoLuong").value;
   	var sg = document.getElementById("cmbSang").value;
    var tr = document.getElementById("cmbTrua").value;
   	var ch = document.getElementById("cmbChieu").value;
   	var to = document.getElementById("cmbToi").value;
   	var gc = document.getElementById("txtGhiChu").value;
    var url = "xlXoaCTToaThuoc.php?MTH="+a+"&MTT="+b+"&MP="+mp+"&NK="+nk+"&LD="+ld+"&LB="+lb+"&MT="+mt+"&SL="+sl+"&SG="+sg+"&TR="+tr+"&CH="+ch+"&TO="+to+"&GC="+gc;
	url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}

function InsToaThuoc()
{

  	xmlhttp=GetXmlHttpObject();
	if (xmlhttp==null)
	{
		alert ("Your browser does not support XML HTTP Request");
		return;
	}

	xmlhttp.onreadystatechange = showDetailResult;
	var mp = document.getElementById("cmbphieukcb").value;
  	var nk = document.getElementById("txtNgayKham").value;
	var ld = document.getElementById("txtLDCuaBS").value;


    var url = "xlThemToaThuoc.php?MP="+mp+"&NK="+nk+"&LD="+ld;
    url += "&t=" + Math.random();

	xmlhttp.open("GET", url, true);

	xmlhttp.send(null);
}

function showInfoResult()
{
	if (xmlhttp.readyState==4 && xmlhttp.status == 200)
	{
		document.getElementById("divInfoResult").innerHTML=xmlhttp.responseText;
	}
}

function showDetailResult()
{
	if (xmlhttp.readyState==4 && xmlhttp.status == 200)
	{
		document.getElementById("divDetailResult").innerHTML=xmlhttp.responseText;
	}
}

