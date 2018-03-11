<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {font-size: 14px}
body {
	background-image: url();
}
-->
</style>
<div class="grupo" style="margin:0px auto; font-size:100%;" align="center">
<table width="302" border="0">
  <tr>
    <td><div class="grupo" align="center">
      <h3 class="style1"><?php echo nl2br(CHtml::encode($data['message'])); ?></h3>
      <p  class="style2">No se ha encontrado ningun documento relacionado con los datos indicados.</p>
      <p  class="style2">Si introdujo los datos correctamente y esta viendo este mensaje, es posible que el documento haya expirado.</p>
    </div></td>
  </tr>
  <tr>
    <td><div align="center"><?php echo CHtml::Button('Listo', array ('submit' => "http://localhost/intranetPedroCamejo/index.php?r=site/validar"));  ?></div></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="post" action="http://localhost/intranetPedroCamejo/index.php?r=site/validar">
      <label></label>
      <div align="center">
        <input type="submit" name="Submit" value="Submit" />
      </div>
    </form>    </td>
  </tr>
  <tr>
    <td><div align="center"><a href="http://localhost/intranetPedroCamejo/index.php?r=site/validar">Listo</a></div></td>
  </tr>
</table>
