<?php include('db.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
          </svg>
          <?= $_SESSION['message'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php session_unset();
      } ?>
      <div class="card card-body">
        <form action="guardar_tarea.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Título de la tarea" autofocus>
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
<?php include('includes/footer.php'); ?>