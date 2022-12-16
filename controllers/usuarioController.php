<?php session_start();

class UsuarioController
{
  public function registrar()
  {
    if (
      isset($_POST['nombres']) && isset($_POST['apellidos']) &&
      isset($_POST['telefono']) && isset($_POST['email']) &&
      isset($_POST['password']) && isset($_POST['direccion'])
    ) {
      $data = [
        'nombres'   => $_POST['nombres'],
        'apellidos' => $_POST['apellidos'],
        'direccion'  => $_POST['direccion'],
        'telefono'  => $_POST['telefono'],
        'email'     => $_POST['email'],
        'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 10]),
        'tipo'      => 'usuario',
      ];

      $res = UsuarioModel::save($data);
      if ($res[0] == 'success') {
        echo '<div class="alert alert-danger">Éxito, usuario registrado</div>
        <script>window.location="inicio";</script>';
      } else {
        echo '<div class="alert alert-danger">Error, usuario no registrado</div>';
        var_dump($res[1]);
        var_dump($data);
      }
    }
  }

  public function login()
  {
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $res = UsuarioModel::getUserByEmail($_POST['email']);
      if ($res["email"] == $_POST["email"]) {
        if (password_verify($_POST["password"], $res["password"])) {
          $_SESSION["session"] = "initiated";
          $_SESSION["idUser"] = $res["idusuario"];
          $_SESSION["names"] = $res["nombres"];
          $_SESSION["lastname"] = $res["apellidos"];
          $_SESSION["email"] = $res["email"];
          $_SESSION["telefono"] = $res["telefono"];
          $_SESSION["tipoUser"] = $res["tipo"];

          echo "<script>window.location='inicio';</script>";
        } else {
          echo '<div class="alert alert-danger">La contraseña es Incorrecta</div>';
        }
      } else {
        echo '<div class="alert alert-danger">El Correo es Incorrecto</div>';
      }
    }
  }

  static public function show($id)
  {
    return UsuarioModel::get($id);
  }

  public function logout()
  {
    if (isset($_POST['pass']) && $_POST['pass'] != "") {
      $res = UsuarioModel::updatePassword($_SESSION['idUser'], $_POST['pass']);
      if ($res[0] == 'success') {
        echo "<script>
          iziToast.success({
            title: 'Éxito, ',
            message: 'Contraseña Actualizada',
            position: 'topCenter',
            displayMode: 2,
          });
          $('.item_edit_pass').addClass('d-none');
          setTimeout(() => {
            window.location='login'
          }, 1000);
        </script>";
        session_unset();
        session_destroy();
      } else {
        echo "<script>
          iziToast.error({
            title: 'Error, ',
            message: 'Algo Salio Mal',
            position: 'topCenter'
          });
          $('.item_edit_pass').addClass('d-none');
        </script>";
      }
    }
  }
}