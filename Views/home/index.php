
<div id="carouselExampleCaptions" class="carousel slide" style="background-color:var(--bs-border-color)">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="text-center">
      <div class="row align-items-start">
        <div class="col-2">
        </div>
        <div class="col-6">
          <div class="carousel-item active">
            <img src="<?= URLSYSIMG.$respuesta["url_imagen"][8] ?>" class="d-block w-30" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?= URLSYSIMG.$respuesta["url_imagen"][8] ?>" class="d-block w-30" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?= URLSYSIMG.$respuesta["url_imagen"][8] ?>" class="d-block w-30" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
      <div class="col-2"></div>
    </div>
</div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


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