<?php include("includes/header.php") ?>
<?php include("includes/footer.php") ?>

<body>
    <div class="container p-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card card-body p-5">
                    <form action="index.php" method="POST">
                        <?php

                        if (isset($errorLogin)) {
                            echo $errorLogin;
                        }

                        ?>
                        <h2>Iniciar sesión</h2>
                        <div class="form-group my-3">
                            <input class="form-control" type="text" name="username" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-group my-3">
                            <input class="form-control" type="password" name="password" placeholder="Contraseña">
                        </div>
                        <p class="center"><input class="btn btn-primary" type="submit" value="Iniciar Sesión"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>