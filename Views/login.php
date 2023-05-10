<div class="container-fluid row">
    <form class="col-3 p-2">
        <h2 class="text-left text-secondary">Crear nuevo usuario</h2>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control nombre" id="nombre" placeholder="Nombre">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control apellidos" id="apellidos" placeholder="Apellidos">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="correo" name="correo" class="form-control correo" id="correo" placeholder="Correo">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control password" id="password" placeholder="Password">
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" name="telefono" class="form-control telefono" id="telefono" placeholder="Telefono">
        </div>
        <div class="mb-3">
            <label for="id_rol" class="form-label">Rol</label>
            <select name="id_rol" class="form-control id_rol">
                <?php foreach($resp['id_rol'] as $i=>$id_rol){ ?>
			<option value="<?= $id_rol ?>"><?= $resp['rol'][$i] ?></option>
            <?php } ?>
		     </select>
        </div>
        <button type="submit" class="btn btn-primary registrar">Registrar</button>
    </form>
    <div class="col-2 p-6">
        <h2 class="text-left text-secondary">Login</h2>
         <form class="col-10 p-100" action="ingresar" method="post">
         <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Correo: </label>
         <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     </div>
         <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Contraseña: </label>
          <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1">
         </div>
         <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
<?php
if (isset($resp['error_usuario'])) {
?>
  <div class="alert alert-danger" role="alert">
    <?= $resp['error_usuario']; ?>
  </div>
<?php } ?> 
    </div>
</div>
