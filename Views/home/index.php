<style>
    .carousel-item {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .carousel-item img {
      max-height: 400px; /* Ajusta el tamaño máximo de las imágenes */
      width: auto;
    }
  </style>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= URLSYSIMG.$respuesta["url_imagen"][1] ?>" alt="Image 1">
    </div>
    <div class="carousel-item">
      <img src="<?= URLSYSIMG.$respuesta["url_imagen"][1] ?>" alt="Image 2">
    </div>
    <div class="carousel-item">
      <img src="<?= URLSYSIMG.$respuesta["url_imagen"][1] ?>" alt="Image 3">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<script>
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 5000 // Cambio de imagen automático después de 5 segundos
    });
  });
</script>
<br>
<br>
<br>
<br>
<br>

<?php foreach($respuesta["id_producto"] as $i=>$id_producto){
  if(($i == 0) || ($i%5==0)){
?>
<div class="">
  <div class="row">
<?php } ?>
    <div class="col">
      <table>
        <tr>
             <td><img src="<?= URLSYSIMG.$respuesta["url_imagen"][$i] ?>" width="40%" /></td>
        </tr>
        <tr>
             <td>Nombre: <?= $respuesta["nombre"][$i] ?><br />
            Descripción: <?= $respuesta["desc_corta"][$i] ?><br />
                 Precio: <?= $respuesta["precio"][$i] ?><br /></td>
        </tr> 
      </table>
      <a href="<?= URLSYS ?>productos/ver?producto=<?= $respuesta["id_producto"][$i] ?>">Ver más</a>
    </div>
  <?php 
    //if($i%5==0){
  ?>

<?php } 
//} ?> 
  </div>
</div> 