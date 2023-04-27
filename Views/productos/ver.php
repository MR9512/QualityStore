<div class="container">
  <div class="row">
    <div class="col">
    <img src="<?= URLSYS.$respuesta["url_imagen"] ?>" width="40%" />
    </div>
    <div class="col">
            Nombre: <?= $respuesta["nombre"] ?><br />
            Descripción: <?= $respuesta["desc_large"] ?><br />
            Precio: <?= $respuesta["precio"] ?><br />
           <a href="<?= $respuesta["url_mercado"] ?>">Precio MercadoLibre</a></br>
           <a href="<?= $respuesta["url_sams"] ?>">Precio SamsClub</a>
    </div>
  </div>
</div>