<?php require_once 'conexion.php';

class UsuarioModel
{
  static public function get($id)
  {
    $query = Conexion::connect()->query("SELECT * FROM usuarios WHERE idusuario = $id;");
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  static public function getAll()
  {
    $query = Conexion::connect()->query("SELECT * FROM usuarios;");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  static public function save($data)
  {
    $pdo = Conexion::connect();
    $query = $pdo->prepare("INSERT INTO usuarios (tipo, nombres, apellidos, direccion, telefono, email, password) VALUES 
    (:tipo, :nombres, :apellidos, :direccion, :telefono :email, :password);");

    $query->bindParam(':tipo',        $data['tipo'],       PDO::PARAM_STR);
    $query->bindParam(':nombres',     $data['nombres'],    PDO::PARAM_STR);
    $query->bindParam(':apellidos',   $data['apellidos'],  PDO::PARAM_STR);
    $query->bindParam(':direccion',   $data['direccion'],  PDO::PARAM_STR);
    $query->bindParam(':telefono',    $data['telefono'],   PDO::PARAM_STR);
    $query->bindParam(':email',       $data['email'],      PDO::PARAM_STR);
    $query->bindParam(':password',    $data['password'],   PDO::PARAM_STR);

    if ($query->execute()) return ["success"];
    return ["error", $query->errorInfo()];
  }

  static public function getUserByEmail($email)
  {
    $query = Conexion::connect()->query("SELECT * FROM usuarios WHERE email = '$email';");
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC) ?? false;
  }

  static public function update($data)
  {
    $query = Conexion::connect()->prepare("UPDATE usuarios SET tipo=:tipo, nombres=:nombres, apellidos=:apellidos, direccion=:direccion, telefono=:telefono, email=:email, password=:password WHERE idusuario=:idusuario;");

    $query->bindParam(':idusuario',   $data['idusuario'], PDO::PARAM_INT);
    $query->bindParam(':nombres',      $data['nombres'],    PDO::PARAM_STR);
    $query->bindParam(':apellidos',      $data['apellidos'],    PDO::PARAM_STR);
    $query->bindParam(':direccion',      $data['direccion'],    PDO::PARAM_STR);
    $query->bindParam(':telefono',      $data['telefono'],    PDO::PARAM_STR);
    $query->bindParam(':email',       $data['email'],     PDO::PARAM_STR);
    $query->bindParam(':password',    $data['password'],  PDO::PARAM_STR);
    $query->bindParam(':tipo',        $data['tipo'],      PDO::PARAM_STR);

    if ($query->execute()) return ["success"];
    return ["error", $query->errorInfo()];
  }

  static public function updatePassword($id, $pass)
  {
    $pass = password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
    $query = Conexion::connect()->prepare("UPDATE usuarios SET password='$pass' WHERE idusuario=$id;");
    if ($query->execute()) return ['success'];
    return ['error', $query->errorInfo()];
  }

  static public function delete($id)
  {
    $query = Conexion::connect()->query("DELETE FROM usuarios WHERE idusuario = $id;");
    if ($query->execute()) return ['success'];
    return ['error', $query->errorInfo()];
  }
}