<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>讀書空間借閱系統-登入</title>

<!--基本樣式-->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<style type="text/css">
  .container{
	width: 900px;
	height: 600px;
  }
</style>
<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body onload="MM_preloadImages('background/menu_2.png')">
<div class="container clearfix">
<div class="content clearfix"> <!--內容-->
   <div class="clearfix" style="float: left; margin-right: 20px;padding:50px 0 0 150px;">
      <img src="background/banner.png" width=600 height=250 border="0" >
    </div>
  </div> 
  
  <div style="text-align:center">
    <div style="margin:0 auto; margin-top:50px; width:300px; height:300px">
  
      <form name="form" method="post" action="connect.php">
        帳號：<input type="text" name="id" /> <br>
        密碼：<input type="password" name="pw" /> <br>
        <input type="submit" name="button" value="登入" />
      </form>
    </div>
  </div>
</div> <!-- end .container -->
</body>
</html>
