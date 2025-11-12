<?php
  include 'conexio.php';

  $categorias = [];
  try {
      $stmt = $connect->query("SELECT id_categoria, nombre FROM categorias ORDER BY nombre ASC");
      $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
      $categorias = [];
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/semantic.css" />
    <link rel="stylesheet" href="css/estilo.css" />
    <script src="js/jquery.js"></script>
    <script src="js/semantic.js"></script>
    <title>Registrar producto</title>
  </head>
  <body>
    <div class="ui container">
      <br />
      <h1 class="hh1">Formulario de registro de productos</h1>
      <form action="insertaru.php" class="ui form" method="POST">
        <div class="two fields">
          <div class="field">
            <div class="ui pointing below label">
              <label for="nombre_producto">Nombre del producto</label>
            </div>
            <div class="ui left icon input">
              <input
                type="text"
                name="nombre_producto"
                id="nombre_producto"
                placeholder="Ingresa el nombre"
                required
              />
              <i class="box icon"></i>
            </div>
          </div>
          <div class="field">
            <div class="ui pointing below label">
              <label for="proveedor">Proveedor</label>
            </div>
            <div class="ui left icon input">
              <input
                type="text"
                name="proveedor"
                id="proveedor"
                placeholder="Nombre del proveedor"
                required
              />
              <i class="truck icon"></i>
            </div>
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <div class="ui pointing below label">
              <label for="cantidad">Cantidad</label>
            </div>
            <div class="ui left icon input">
              <input
                type="number"
                name="cantidad"
                id="cantidad"
                min="0"
                step="1"
                placeholder="Ej. 25"
                required
              />
              <i class="hashtag icon"></i>
            </div>
          </div>
          <div class="field">
            <div class="ui pointing below label">
              <label for="unidad_medida">Unidad de medida</label>
            </div>
            <div class="ui left icon input">
              <input
                type="text"
                name="unidad_medida"
                id="unidad_medida"
                placeholder="Ej. piezas, kg, cajas"
                required
              />
              <i class="balance scale icon"></i>
            </div>
          </div>
        </div>
        <div class="two fields">
          <div class="field">
            <div class="ui pointing below label">
              <label for="precio_unitario">Precio unitario</label>
            </div>
            <div class="ui left icon input">
              <input
                type="number"
                name="precio_unitario"
                id="precio_unitario"
                min="0"
                step="0.01"
                placeholder="Ej. 120.50"
                required
              />
              <i class="dollar sign icon"></i>
            </div>
          </div>
          <div class="field">
            <div class="ui pointing below label">
              <label for="categoria">Categoria</label>
            </div>
            <select class="ui dropdown" name="categoria" id="categoria" required>
              <option value="">Selecciona una categoria</option>
              <?php if (!empty($categorias)) { ?>
                <?php foreach ($categorias as $categoria) { ?>
                  <option value="<?php echo htmlspecialchars($categoria['nombre']); ?>">
                    <?php echo htmlspecialchars($categoria['nombre']); ?>
                  </option>
                <?php } ?>
              <?php } else { ?>
                <option value="" disabled>No hay categorias disponibles</option>
              <?php } ?>
            </select>
          </div>
        </div>
        <input
          type="submit"
          name="btn_insertar"
          class="ui inverted green button boton"
          value="Registrar producto"
        />
      </form>
    </div>
    <script>
      $('.ui.dropdown').dropdown();
    </script>
  </body>
</html>
