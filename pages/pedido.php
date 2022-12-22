<?php include('../index.php'); ?>
<body>
  <main>
      <div class="container p-4 px-2">
          <div class="row">
              <h1>Pedidos</h1>
              <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show col-md-6" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php session_unset(); } ?>
              <div class="col-md-12">
                  <table class="table table-bordered">
                      <thead>
                      <tr>
                          <th>Nombre</th>
                          <th>Cantidad</th>
                          <th>Subtotal</th>
                          <th>Opciones</th>
                      </tr>
                      </thead>
    <?php
    $cliente = 1;
    $response = json_decode(file_get_contents('http://localhost/awayhub/api/pedido/pedido.read.php?cliente='. $cliente), true);
    if($response['statuscode'] == 200){
        foreach($response['items'] as $item) {
            include('../layout/pedido/pedido.php');
        }
    }
    ?>
                  </table>
              </div>
          </div>
      </div>
  </main>
</body>