        <tbody>
          <tr>
            <td><?php echo $item['nombre']; ?></td>
            <td>$<?php echo $item['precio']; ?> COP</td>
            <td class="d-flex">
              <a href="../api/pedido/pedido.create.php?producto=<?php echo $item['id'] ?>&precio=<?php echo $item['precio']?>&cliente=<?php echo '1061807588' ?>" class="btn btn-primary me-2">
                <i class="fa fa-cart-shopping"></i>
              </a>
              <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $item['id'] ?>">
                    <i class="fa fa-marker"></i>
              </button>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $item['id'] ?>">
                    <i class="fa fa-trash-alt"></i>
              </button>
            </td>
          </tr>
        </tbody>


        <!-- editModal -->
        <div class="modal fade" id="editModal<?php echo $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar producto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="../../api/producto/producto.update.php">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <div class="modal-body d-flex justify-content-center align-items-center">
                                      <div class="form-group me-3">
                                            <label for="nombre" class="col-form-label">Nombre:</label>
                                            <input type="text" name="nombre" class="form-control" value="<?php echo $item['nombre']; ?>" required="true">
                                      </div>
                                      <div class="form-group">
                                            <label for="precio" class="col-form-label">Precio:</label>
                                            <input name="precio" type="number" min="500" max="50000" step="500" class="form-control" value="<?php echo $item['precio']; ?>" required="true">
                                      </div>
                                </div>
                                <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                          </form>
                    </div>
              </div>
        </div>
        </div>

        <!-- deleteModal -->
        <div class="modal fade" id="deleteModal<?php echo $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body d-flex justify-content-center">
                                ¿Está seguro de borrar el producto?
                          </div>
                          <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a href="../../api/producto/producto.delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger">Aceptar</a>
                          </div>
                    </div>
              </div>
        </div>