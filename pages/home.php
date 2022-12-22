<?php include('../index.php'); ?>
<body>
  <main>
      <div class="container p-4 px-2">
          <div class="row">
              <h1>Productos disponibles</h1>
              <div class="col-md-12">
                  <table class="table table-bordered">
                      <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Precio</th>
                          <th>Opciones</th>
                      </tr>
                      </thead>
    <?php
    $response = json_decode(file_get_contents('http://localhost/awayhub/api/producto/producto.read.php'), true);
    if($response['statuscode'] == 200){
      foreach($response['items'] as $item){
        include('../layout/producto/productos.php');
      }
    }
    ?>
                  </table>
              </div>
          </div>
      </div>
  </main>
</body>