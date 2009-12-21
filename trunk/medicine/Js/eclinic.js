function calcHeight()
{    
    var dodai_trang = parent.window.document.getElementById('noidung').contentWindow.document.body.scrollHeight;
    parent.window.document.getElementById('noidung').height=(dodai_trang+100);
}