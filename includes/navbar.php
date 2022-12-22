<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1); ?>
  <div class="container">
    <a class="navbar-brand" href="./home.php">AwayHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= $page == 'home.php' ? 'active':'' ?>" aria-current="page" href="./home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'pedido.php' ? 'active':'' ?>" href="./pedido.php">Pedido</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $page == 'domicilio.php' ? 'active':'' ?>" href="./domicilio.php">Domicilio</a>
        </li>
      </ul>
    </div>
  </div>
</nav>