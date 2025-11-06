<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/semantic.css" />
    <link rel="stylesheet" href="css/estilo.css" />
    <script src="js/jquery.js"></script>
    <script src="js/semantic.js"></script>
    <title>Insertar</title>
  </head>
  <body>
    <div class="ui container">
      <br />
      <h1 class="hh1">Formulario de insertar usuarios</h1>
      <form action="insertaru.php" class="ui form" method="POST">
        <div class="two fields">
          <div class="field">
            <div class="ui pointing below label">
              <label for="">Nombre(s)</label>
            </div>
            <div class="ui left icon input">
              <input
                type="text"
                name="nombre"
                id=""
                placeholder="ingresa su nombre"
              />
              <i class="user icon"></i>
            </div>
          </div>
          <div class="field">
            <div class="ui pointing below label">
              <label for="">Apellido(s)</label>
            </div>
            <div class="ui left icon input">
              <input
                type="text"
                name="apellido"
                id=""
                placeholder="ingresar su apellido"
              />
              <i class="user icon"></i>
            </div>
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <div class="ui pointing below label">
              <label for="">Edad</label>
            </div>
            <div class="ui left icon input">
              <input
                type="text"
                name="edad"
                id=""
                placeholder="ingresa su edad"
              />
              <i class="user icon"></i>
            </div>
          </div>
          <div class="field">
            <div class="ui pointing below label">
              <label for="">Direccion</label>
            </div>
            <div class="ui left icon input">
              <input
                type="text"
                name="direccion"
                id=""
                placeholder="ingresar su direccion"
              />
              <i class="home icon"></i>
            </div>
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <div class="ui pointing below label">
              <label for="">Telefono</label>
            </div>
            <div class="ui left icon input">
              <input
                type="text"
                name="telefono"
                id=""
                placeholder="ingresa su telefono"
              />
              <i class="phone icon"></i>
            </div>
          </div>
          <div class="field">
            <div class="ui pointing below label">
              <label for="">Correo</label>
            </div>
            <div class="ui left icon input">
              <input
                type="email"
                name="correo"
                id=""
                placeholder="ingresar su correo"
              />
              <i class="at icon"></i>
            </div>
          </div>
        </div>
        <input
          type="submit"
          name="btn_insertar"
          class="ui inverted green button boton"
          id=""
        />
      </form>
    </div>  
  </body>
</html>
