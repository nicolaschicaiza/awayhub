
        <tbody>        
          <tr>
            <td><?php echo $item['nombre']; ?></td>
            <td>$<?php echo $item['precio']; ?> COP</td>
            <td class="d-flex">
              <a href="../api/pedido/pedido.create.php?producto=<?php echo $item['id_producto'] ?>&precio=<?php echo $item['precio']?>&cliente=<?php echo '1061807588' ?>" class="btn btn-success me-2">
                <i class="fa fa-cart-shopping"></i>
              </a>              

              <a href="../../pages/domicilio.php" class="btn btn-warning d-flex justify-content-center align-items-center">
                  Comprar
              </a>
            </td>
          </tr>
        </tbody>