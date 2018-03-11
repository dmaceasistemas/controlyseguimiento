<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>
<?php echo CHtml::encode($data['type']); ?>
</title>
<style type="text/css">
/*<![CDATA[*/
body {font-family:"Verdana";font-weight:normal;color:black;background-color:white;}
h1 { font-family:"Verdana";font-weight:normal;font-size:18pt;color:red }
h2 { font-family:"Verdana";font-weight:normal;font-size:14pt;color:maroon }
h3 {font-family:"Verdana";font-weight:bold;font-size:11pt}
p {font-family:"Verdana";font-size:9pt;}
pre {font-family:"Lucida Console";font-size:10pt;}
.version {color: gray;font-size:8pt;border-top:1px solid #aaaaaa;}
.message {color: maroon;}
.source {font-family:"Lucida Console";font-weight:normal;background-color:#ffffee;}
.error {background-color: #ffeeee;}
/*]]>*/
</style>
</head>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%" height="175" border="0" align="center">
  <tr>
    <td><div align="center">
	<h1>Acceso Denegado</h1>
      <?php //echo $data['type']; ?>
    <?php //print("Acceso Denegado: "); ?> </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><h2>La base de datos manda a decir</h2><?php //print("La base de datos manda a decir->"); ?></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><?php echo nl2br(CHtml::encode($data['message'])); ?></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<h1>&nbsp;</h1>
<h2>&nbsp;</h2>
<h3>&nbsp;</h3>
</body>
</html>