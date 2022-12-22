
<?php include('../index.php'); ?>

<body>
  <main>
    <div class="container p-4 px-2">
      <div class="row">
        
          <div class="col-md-11">
            <h1>Productos disponibles</h1>
          </div>
          <div class="col-md-1">
            <a class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editModal">
              <i class="fa-solid fa-plus"></i>
            </a>
          </div>
        
        <br> <br>
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
    if ($response['statuscode'] == 200) {
      foreach ($response['items'] as $item) {
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

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agrega un producto</h5>
                                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="../api/producto/producto.create.php">
                                <input type="hidden" name="id" >
                                <div class="modal-body d-flex justify-content-center align-items-center">
                                      <div class="form-group">
                                            <label for="cantidad" class="col-form-label">Nombre del producto:</label>
                                            <input type="text" name="nombre" value="<?php $item['nombre']; ?>" class="form-control">
                                      </div> <br>
                                       &nbsp;
                                      <div class="form-group">
                                            <label for="cantidad" class="col-form-label">Precio:</label>
                                            <input type="number" name="precio" value="<?php $item['precio']; ?>" class="form-control">
                                      </div>

                                </div>
                                <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                      <button type="submit" class="btn btn-primary">Crear</button>
                                </div>
                          </form>
                         
                    </div>
              </div>
</div>

