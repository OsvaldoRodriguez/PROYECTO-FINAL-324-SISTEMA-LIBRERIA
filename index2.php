<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
  </head>

  <body>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-2" align="center">Bienvenido 👋</h4> 
              <form class="mb-3" action="indexcontrol.php" method="GET">
                <div class="mb-3">
                  <label class="form-label">Usuario</label>
                  <input type="text" class="form-control" placeholder="Ingrese su usuario" name='usuario' autofocus />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Contraseña</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" class="form-control" name="contrasenia" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i> </span>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit" value="Aceptar" name = "Aceptar">Ingresar</button>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>
