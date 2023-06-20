<div class="container">
  <div class="row">
    <div class="col">
    <img src="<?= URLSYSIMG.$respuesta["url_imagen"] ?>" width="40%" />
    </div>
    <div class="col">
            Nombre: <?= $respuesta["nombre"] ?><br />
            Descripción: <?= $respuesta["desc_large"] ?><br />
            Precio: <?= $respuesta["precio"] ?><br />
            <?php if($_SESSION["id_rol"] == 1){ ?>
           <a href="<?= $respuesta["url_mercado"] ?>">Precio MercadoLibre</a></br>
           <a href="<?= $respuesta["url_sams"] ?>">Precio SamsClub</a>
            <?php } ?>
    </div>
  </div>
</div>