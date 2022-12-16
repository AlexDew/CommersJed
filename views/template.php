<!DOCTYPE html>
<html lang="es">

<head>
  <title>Inicio</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="assets/css/normalize.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/media.css">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
  </script>
</head>

<body id="container-page-index">
  <?php include 'ui/navbar.php';

  // if ($_SESSION['tipoUser'] == 1) {
  if (isset($_GET["ruta"])) {
    if (
      $_GET["ruta"] == "inicio" ||
      $_GET["ruta"] == "productos" ||
      $_GET["ruta"] == "registro" ||
      $_GET["ruta"] == "logout"
    ) {
      include $_GET["ruta"] . ".php";
    } else {
    }
  } else {
    include "inicio.php";
  }
  // } else {
  // if (isset($_GET["ruta"])) {
  //   if (

  //     $_GET["ruta"] == "logout"
  //   ) {
  //     include $_GET["ruta"] . ".php";
  //   } else {
  //     include "misalbums.php";
  //   }
  // } else {
  //   include "misalbums.php";
  // }
  // }
  ?>

  <?php include 'ui/footer.php'; ?>
</body>

</html>