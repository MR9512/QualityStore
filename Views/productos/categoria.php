<table>
<?php foreach($respuesta["id_producto"] as $i=>$id_producto){
  if(($i == 0) || ($i%5==0)){
    echo $i%5;
    echo "</br></br></br></br>";
?>
  <tr>
 <?php } echo $i; ?>
  <td>
  <img src="<?= URLSYS.$respuesta["url_imagen"][$i] ?>" width="40%" /><br>
  Nombre: <?= $respuesta["nombre"][$i] ?><br />
  Descripción: <?= $respuesta["desc_corta"][$i] ?><br />
  Precio: <?= $respuesta["precio"][$i] ?><br />
  <a href="<?= URLSYS ?>productos/ver?producto=<?= $respuesta["id_producto"][$i] ?>">Ver más</a>
  </td>
 <?php 
 if($i%5==0){
   echo "</tr>";
 }
}
if($i%5!=0){
    echo "</tr>";
  }
?>
</table>