<?php
include './library/configServer.php';
include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Productos</title>
  <?php include './inc/link.php'; ?>
</head>

<body id="container-page-product">
  <?php include './inc/navbar.php'; ?>
  <section id="store">
    <br>
    <div class="container">
      <div class="page-header">
        <h1> PRODUCTOS <small class="tittles-pages-logo">MR JED TRADE</small></h1>
      </div>
      <br><br>
      <div class="row">
        <div class="col-xs-12">
          <ul id="store-links" class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#all-product" role="tab" data-toggle="tab" aria-controls="all-product" aria-expanded="false">Todos los productos</a></li>
            <li role="presentation" class="dropdown active">
              <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Categorías <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                <!-- ==================== Lista categorias =============== -->
                <?php
                $categorias =  ejecutarSQL::consultar("select * from categoria");
                while ($cate = mysqli_fetch_array($categorias)) {
                  echo '
                                    <li>
                                        <a href="#' . $cate['CodigoCat'] . '" tabindex="-1" role="tab" id="' . $cate['CodigoCat'] . '-tab" data-toggle="tab" aria-controls="' . $cate['CodigoCat'] . '" aria-expanded="false">' . $cate['Nombre'] . '
                                        </a>
                                    </li>';
                }
                ?>
                <!-- ==================== Fin lista categorias =============== -->
              </ul>
            </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane fade" id="all-product" aria-labelledby="all-product-tab">
              <br><br>
              <div class="row">
                <?php
                $consulta =  ejecutarSQL::consultar("select * from producto where Stock > 0");
                $totalproductos = mysqli_num_rows($consulta);
                if ($totalproductos > 0) {
                  while ($fila = mysqli_fetch_array($consulta)) {
                    echo '
                    <div class="col-xs-12 col-sm-6 col-md-4">
                      <div class="thumbnail">
                         <img src="assets/img-products/' . $fila['Imagen'] . '">
                          <div class="caption">
                            <h3>' . $fila['Marca'] . ' ' . $fila['NombreProd'] . '</h3>
                            <p>$' . $fila['Precio'] . '</p>
                            <div class="py-3">
                              <input type="number" class="form-control cantidadProducto" value="1" min="1">
                              <div class="">
                                <button class="btn btn-primary aumentar font-20">+</button>
                                <button class="btn btn-danger restar font-20">-</button>
                              </div>
                            </div>
                            <p class="text-center">
                              <a href="infoProd.php?CodigoProd=' . $fila['CodigoProd'] . '" class="btn btn-primary btn-sm">
                              <i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;
                              <button value="' . $fila['CodigoProd'] . '" class="btn btn-success btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    ';
                  }
                } else {
                  echo '<h2>No hay productos en esta categoria</h2>';
                }
                ?>
              </div>

            </div><!-- Fin del contenedor de todos los productos -->
            <!-- ==================== Contenedores de categorias =============== -->
            <?php
            $consultar_categorias = ejecutarSQL::consultar("select * from categoria");
            while ($categ = mysqli_fetch_array($consultar_categorias)) {
              echo '<div role="tabpanel" class="tab-pane fade active in" id="' . $categ['CodigoCat'] . '" aria-labelledby="' . $categ['CodigoCat'] . '-tab"><br>';
              $consultar_productos = ejecutarSQL::consultar("select * from producto where CodigoCat='" . $categ['CodigoCat'] . "' and Stock > 0");
              $totalprod = mysqli_num_rows($consultar_productos);
              if ($totalprod > 0) {
                while ($prod = mysqli_fetch_array($consultar_productos)) {
                  echo '
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                             <div class="thumbnail">
                                               <img src="assets/img-products/' . $prod['Imagen'] . '">
                                               <div class="caption">
                                                 <h3>' . $prod['Marca'] . '</h3>
                                                 <p>' . $prod['NombreProd'] . '</p>
                                                 <p>$' . $prod['Precio'] . '</p>
                                                 <p class="text-center">
                                                     <a href="infoProd.php?CodigoProd=' . $prod['CodigoProd'] . '" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;
                                                     <button value="' . $prod['CodigoProd'] . '" class="btn btn-success btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>
                                                 </p>

                                               </div>
                                             </div>
                                         </div>     
                                         ';
                }
              } else {
                echo '<h2>No hay productos en esta categoría</h2>';
              }
              echo '</div>';
            }
            ?>
            <!-- ==================== Fin contenedores de categorias =============== -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="footer">
    <div class="footer-content">
      <h3>Nosotros</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, nulla assumenda? Odio praesentium dolor veritatis iure maiores officia minimat.</p>
      <ul class="socials">
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>copyright &copy;2022 codeOpacity. designed by <span>nethunt</span></p>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#store-links a:first').tab('show');

    });
    // Aumentar la cantidad del producto
    const aumentar = document.querySelectorAll(".aumentar"),
      restar = document.querySelectorAll(".restar");

    aumentar.addEventListener('click', (e) => {
      let cantidad = e.target.parentElement.previousElementSibling.value;
      cantidad = Number(cantidad) + 1;
      e.target.parentElement.previousElementSibling.value = cantidad;
    });

    restar.addEventListener('click', (e) => {
      let cantidad = e.target.parentElement.previousElementSibling.value;
      if (cantidad <= 1) {
        cantidad = 1;
      } else {
        cantidad = Number(cantidad) - 1;
      }
      e.target.parentElement.previousElementSibling.value = cantidad;
    });
  </script>
</body>

</html>