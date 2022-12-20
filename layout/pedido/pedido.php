        <tbody>
<!--              --><?php //if($item['id_cliente'] == 1061807588){ ?>
              <tr>
                  <td><?php echo $item['nombre'] ?></td>
                  <td><?php echo $item['cantidad'] ?></td>
                  <td>$<?php echo $item['subtotal'] ?> COP</td>
                  <td class="d-flex">
                      <a href="/api/pedido/pedido.update.php?pedido=<?php echo $item['id_pedido'] ?>" class="btn btn-success me-2">
                          <i class="fa fa-marker"></i>
                      </a>
                      <a href="/models/item/item.delete.php <?php echo $row['id_producto'] ?>&cantidad=<?php echo $row['cantidad'] ?>" class="btn btn-danger">
                          <i class="fas fa-trash-alt"></i>
                      </a>
                      <form>
                          <input type="hidden" id="id" value="<?php echo $item['id_producto'] ?>">
                      </form>
                  </td>
              </tr>
<!--              --><?php //} ?>
        </tbody>