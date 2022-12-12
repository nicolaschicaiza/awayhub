<?php include('../db.php'); ?>
<?php include('../includes/header.php'); ?>
<?php include('../includes/navbar.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <div class="card card-body">
        <form action="guardar_tarea.php" method="POST">
          <div class="form-group">
            <input type="text" name="client" class="form-control" placeholder="Cédula del cliente" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="client" class="form-control" placeholder="Cédula del cliente" autofocus>
          </div>
          <div class="form-group mt-3">
            <textarea name="description" rows="2" class="form-control" placeholder="Descripción de la tarea"></textarea>
          </div>
          <input type="submit" class="btn btn-success btn-block mt-3" value="Guardar tarea" name="save_task">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Título</th>
            <th>Descripción</th>
            <th>Fecha Creación</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM  tarea";
          $result_tasks = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_array($result_tasks)) { ?>
            <tr>
              <td><?php echo $row['titulo'] ?></td>
              <td><?php echo $row['descripcion'] ?></td>
              <td><?php echo $row['fecha'] ?></td>
              <td class="d-flex">
                <a href="editar_tarea.php?id=<?php echo $row['id_tarea'] ?>" class="btn btn-secondary me-2">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="eliminar_tarea.php?id=<?php echo $row['id_tarea'] ?>" class="btn btn-danger">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="col">Column</div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>