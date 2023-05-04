<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="./scripts/search.js"></script>
    <title>Contratacion en Software</title>
</head>
<body>
      <nav>

        <div class="wrapper">

          <div class="logo"><a href="#">Contratacion en Software</a></div>
         
            <input type="radio" name="slider" id="menu-btn">

            <input type="radio" name="slider" id="close-btn">

          <ul class="nav-links">

            <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>

              <li><a href="index.php">Home</a></li>

          </ul>

          <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>

        </div>

      </nav>

      <div id="container-form">

          <?php

      require "conexion.php";

      // Si se ha enviado el formulario
      if(isset($_POST['submit'])){

        // Obtener los datos del formulario
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];

        // Si el campo "id" está vacío, se trata de un INSERT
        if(empty($_POST['id'])){

          // Realizar la inserción en la base de datos
          $sql = "INSERT INTO negociacion (titulo, contenido) VALUES ('$titulo', '$contenido')";

          if ($conn->query($sql) === TRUE) {
              echo "Nuevo registro insertado correctamente";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

        } else{ // De lo contrario, se trata de un UPDATE

          // Obtener el valor del campo "id"
          $id = $_POST['id'];

          // Realizar la actualización en la base de datos
          $sql = "UPDATE negociacion SET titulo='$titulo', contenido='$contenido' WHERE id='$id'";

          if ($conn->query($sql) === TRUE) {
              echo "Registro actualizado correctamente";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }

        }

      }

      ?>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="ID">ID: </label>

        <input placeholder="Introduzca el ID que desea modificar" type="number" name="id" value="<?php if(isset($_GET['id'])) echo $_GET['id']; ?>">

        <label for="Titulo">Titulo: </label>

        <input id="titulo-input" placeholder="Introduzca el titulo que desea definir" type="text" name="titulo" value="<?php if(isset($_GET['titulo'])) echo $_GET['titulo']; ?>"><br>

        <label for="Contenido">Contenido: </label>

        <textarea required placeholder="Ingrese el contenido o la definicion del titulo que nos indica arriba" characters="" name="contenido" id="contenido-id" cols="60" rows="5" value="<?php if(isset($_GET['titulo'])) echo $_GET['titulo']; ?>"></textarea><br>

        <center><input type="submit" name="submit" value="Insertar o Actualizar"></center>

        <?php require "tabla.php"; ?>

        <?php mysqli_close($conn); ?>

      </form>
    </div>

    <footer>Pagina hecha por Jesus Daniel Cuadro Dita ficha ADSO 2449365</footer>
    
</body>

</html>