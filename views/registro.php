<section id="form-registration" class="mt-5">
  <div class="container">
    <div class="row">
      <div class="page-header">
        <h1>Registro de usuarios <small class="tittles-pages-logo">MR JED TRADE</small></h1>
      </div>
      <div class="col-xs-12 col-sm-6 text-center">
        <p><i class="fa fa-users fa-5x"></i></p>
        <p class="lead">
          Al registrarse recibira notificaciones de nuestros productos y ofertas más recientes en nuestra tienda.
        </p>
        <img src="assets/img/mrjed.jpg" alt="electrodomesticos" class="img-responsive">
      </div>
      <div class="col-xs-12 col-sm-6">
        <div id="container-form">
          <p style="color:#fff;" class="text-center lead">
            Debera de llenar todos los campos para registrarse</p>

          <form method="post">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input class="form-control all-elements-tooltip" type="text" placeholder="Ingrese sus nombres"
                  name="nombres" data-toggle="tooltip" data-placement="top" title="Solamente letras"
                  pattern="[a-zA-Z ]{1,50}" maxlength="50" required>
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input class="form-control all-elements-tooltip" type="text" placeholder="Ingrese sus apellidos"
                  required name="apellidos" data-toggle="tooltip" data-placement="top"
                  title="Ingrese sus apellido(solamente letras)" pattern="[a-zA-Z ]{1,50}" maxlength="50">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-at"></i></span>
                </div>
                <input class="form-control all-elements-tooltip" type="email" placeholder="Ingrese su Email" required
                  name="email" data-toggle="tooltip" data-placement="top" title="Ingrese la dirección de su Email"
                  maxlength="50">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-lock"></i></span>
                </div>
                <input class="form-control all-elements-tooltip" type="password" placeholder="Introdusca una contraseña"
                  required name="password" data-toggle="tooltip" data-placement="top"
                  title="Defina una contraseña para iniciar sesión">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-home"></i></span>
                </div>
                <input class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su dirección" required
                  name="direccion" data-toggle="tooltip" data-placement="top"
                  title="Ingrese la direción en la reside actualmente" maxlength="100">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-phone"></i></span>
                </div>
                <input class="form-control all-elements-tooltip" type="tel" placeholder="Ingrese su número telefónico"
                  required name="telefono" maxlength="11" pattern="[0-9]{}" data-toggle="tooltip" data-placement="top"
                  title="Ingrese su número telefónico. Mínimo 8 digitos máximo 11">
              </div>
            </div>

            <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-pencil"></i>&nbsp;
              Registrarse
            </button>
            <?php
            $user = new UsuarioController();
            $user->registrar();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>