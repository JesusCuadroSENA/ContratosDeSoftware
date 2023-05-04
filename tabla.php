<?php
      
      // Consulta SQL para seleccionar todos los datos de una tabla llamada "usuarios"
        $sql = "SELECT * FROM negociacion";
        $resultado = $conn -> query($sql); // Ejecuta la consulta SQL

        if ($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>id</th><th>Titulo</th><th>Contenido</th><th>Contexto</th></tr>";
            // Itera a través de los resultados y muestra los datos en la tabla
            while($fila = $resultado->fetch_assoc()) {
              echo "<tr><td>" . $fila["id"] . "</td><td>" . $fila["titulo"] . "</td><td>" . $fila["contenido"] . "</td><td>" . $fila["contexto"] . "</td></tr>";
            }
            echo "</table>";
          } else {
            echo "No se encontraron resultados.";
          }

    ?>