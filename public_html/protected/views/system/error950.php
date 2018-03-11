<style type="text/css">
<!--
.style1 {color: #FF0000}
body {
	background-image: url();
}
.style4 {
	font-size: 16px;
	font-style: italic;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.style5 {font-size: 16px; font-style: italic; font-family: Georgia, "Times New Roman", Times, serif; color: #666666; }
-->
</style>
<div class="grupo" style="margin:0px auto; font-size:100%;" align="center">
<table width="158" height="342" align="center" bordercolor="#CCCCCC" bgcolor="#EEEEEE">
  <tr>
    <td bgcolor="#EEEEEE"><div class="grupo" align="center">
      <h3 class="style1"><?php echo nl2br(CHtml::encode($data['message'])); ?></h3>
      <p align="justify"  class="style4">No se ha encontrado ningun documento relacionado con los datos indicados.</p>
      <p align="justify"  class="style4">Si introdujo los datos correctamente y esta viendo este mensaje, es posible que el documento haya expirado.</p>
      <p align="center"  class="style5">__________</p>
    </div></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="http://localhost/intranetPedroCamejo/index.php?r=site/validar">
      <label></label>
      <div align="center">
        <input name="Submit" type="submit" id="Submit" value="Listo" />
      </div>
    </form></td>
  </tr>
</table>
<p class="style1">&nbsp;</p>
