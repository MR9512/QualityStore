<table>
<?php foreach($respuesta["id_producto"] as $i=>$id_producto){
  if(($i == 0) || ($i%5==0)){
    echo "<tr>";
?>
  <tr>
 <?php } ?>
  <td>
  <img src="<?= URLSYS.$respuesta["url_imagen"][$i] ?>" width="40%" /><br>
  Nombre: <?= $respuesta["nombre"][$i] ?><br />
  Descripción: <?= $respuesta["desc_corta"][$i] ?><br />
  Precio: <?= $respuesta["precio"][$i] ?><br />
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