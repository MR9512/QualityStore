<?php if(isset($respuesta['mensajeProducto'])){ ?>
      <div><b><?= $respuesta['mensajeProducto'] ?></b></div>
<?php } else { ?>    
<table>
<?php 
foreach($respuesta["id_producto"] as $i=>$id_producto){
  if(($i == 0) || ($i%5==0)){
?>
  <tr>
 <?php } ?>
  <td>
  <img src="<?= URLSYS.$respuesta["url_imagen"][$i] ?>" width="40%" /><br>
  <b> <?= $respuesta["nombre"][$i] ?></b><br />
  <b>Descripción:</b> <?= $respuesta["desc_corta"][$i] ?><br />
  <b>Precio Anterior:</b> $<?= $respuesta["precio_anterior"][$i] ?><br/>
  <b>Ahorro:</b> $<?= $respuesta["precio_anterior"][$i]-$respuesta["precio"][$i]?><br />
  <b>Precio:</b> $<?= $respuesta["precio"][$i] ?><br />
  <a href="<?= URLSYS ?>productos/ver?producto=<?= $respuesta["id_producto"][$i] ?>">Ver más</a>
  </td>
 <?php 
 if($i!=0){
  if($i%5==0){
    echo "</tr>";
  }
 }
 $incremento = $i;
}
if($incremento%5!=0){
    echo "</tr>";
  }
?>
</table>
<?php } ?>