<?php foreach($respuesta["id_producto"] as $i=>$id_producto){
  if(($i == 0) || ($i%5==0)){
?>
<div class="container">
  <div class="row">
<?php } ?>
    <div class="col">
      <table>
        <tr>
             <td><img src="<?= URLSYS.$respuesta["url_imagen"][$i] ?>" width="40%" /></td>
        </tr>
        <tr>
             <td>Nombre: <?= $respuesta["nombre"][$i] ?><br />
            Descripción: <?= $respuesta["desc_corta"][$i] ?><br />
                 Precio: <?= $respuesta["precio"][$i] ?><br /></td>
        </tr> 
      </table>
      <a href="<?= URLSYS ?>productos/ver?<?= $respuesta["id_producto"][$i] ?>">Ver más</a>
    </div>
  <?php 
    //if($i%5==0){
  ?>

<?php } 
//} ?> 
  </div>
</div> 