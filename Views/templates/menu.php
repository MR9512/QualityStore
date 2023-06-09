<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">¡Bienvenido!</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php 
        if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == 1){ ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administrador
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= URLSYS.'usuarios/listado' ?>">Listado de usuarios</a></li>
            <li><a class="dropdown-item" href="<?= URLSYS.'productos/listado' ?>">Listado de productos</a></li>
            <li><a class="dropdown-item" href="<?= URLSYS.'administrador/misProductosVendidos' ?>">Mis productos vendidos</a></li>
          </ul>
        </li>
        <?php } ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
    
            foreach($this->categoria['id_categoria'] as $i=>$categoria){
    
            ?>
            <li><a class="dropdown-item" href="../productos/categoria?categoria=<?= $categoria ?>"><?= $this->categoria['nombre'][$i] ?></a></li>
            <?php } ?>
          </ul>
        </li>

      </ul>
      <form class="d-flex" action="../productos/searchProducto" method="GET">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="buscarProducto">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>
