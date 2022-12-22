        <tbody>
              <?php $cantidad = $item['cantidad'] ?>
              <tr>
                    <td><?php echo $item['nombre'] ?></td>
                    <td><?php echo $item['cantidad'] ?></td>
                    <td>$<?php echo $item['subtotal'] ?> COP</td>
                    <td class="d-flex">
                          <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $item['id'] ?>">
                                <i class="fa fa-marker"></i>
                          </button>
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $item['id'] ?>">
                                <i class="fa fa-trash-alt"></i>
                          </button>
                          <form>
                                <input type="hidden" id="id" value="<?php echo $item['id_producto'] ?>">
                          </form>
                    </td>
              </tr>
        </tbody>

        <!-- editModal -->
        <div class="modal fade" id="editModal<?php echo $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar cantidad</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="../../api/pedido/pedido.update.php">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <div class="modal-body d-flex justify-content-center align-items-center">
                                      <div class="form-group">
                                            <label for="cantidad" class="col-form-label">Cantidad:</label>
                                            <input name="cantidad" type="number" min="1" max="50" step="1" class="form-control" value="<?php echo $item['cantidad']; ?>" required="true">
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
                                ¿Está seguro de borrar el pedido?
                          </div>
                          <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <a href="../../api/pedido/pedido.delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger">Aceptar</a>
                          </div>
                    </div>
              </div>
        </div>