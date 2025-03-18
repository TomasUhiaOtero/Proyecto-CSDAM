

<?php
require "conexion.php" ;

$consulta_select  = "SELECT canciones.Nombre AS Nombre_Cancion, 
    CONCAT(artistas.Nombre, ' ', IFNULL(artistas.Apellido, '')) AS Nombre_Artista, 
    albums.Nombre AS Nombre_Album, 
    albums.Fecha_Lanzamiento AS Fecha_Lanzamiento, 
    canciones.Puntuacion AS Puntuacion,
    multimedia.url AS URL
FROM 
    canciones
INNER JOIN 
    artistas ON canciones.Artista = artistas.Id
INNER JOIN 
    albums ON canciones.Album = albums.Id
LEFT JOIN 
    multimedia ON multimedia.Cancion = canciones.Id AND multimedia.tipo_enlace = 'youtube'
ORDER BY 
    canciones.Puntuacion DESC;";

$resultado=mysqli_query($conexion,$consulta_select);

if ($resultado){
  echo "<table>
  <tr>  <td>CANCIÓN</td> <td><b><u>ARTISTA</u></b> <td><b><u>ÁLBUM</u></b></td> <td><b><u>FECHA DE LANZAMIENTO</u></b></td>  <td><b><u>PUNTUACIÓN</u></b></td>  <td><b><u>ENLACE</u></b></td>
  </tr>";
  while($fila = mysqli_fetch_array($resultado)) {
    $youtube_link = $fila['URL'] ? "<a href='" . $fila['URL'] . "' target='_blank'>
        <img class='link_yt' src='images/youtube.png' alt='YouTube' style='width:24px; height:24px;'>
        </a>" : "No disponible"; //Imagen con el link(URL) sacada de la base de datos 

    echo "<tr>  <td>" . $fila['Nombre_Cancion'] . "</td>  <td>" . $fila['Nombre_Artista'] . "</td>  <td>" . $fila['Nombre_Album'] . "</td>  <td>" . $fila['Fecha_Lanzamiento'] . "</td> <td>" . $fila['Puntuacion'] . "</td>  <td>" . $youtube_link . "</td> </tr>";
}
 echo "</table>";

 $num_filas = mysqli_num_rows($resultado);
 echo "<p class='texto_inferior'><b>TOP $num_filas CANCIONES DE LA SEMANA</b></p>";
}
else {
 echo "Error al lanzar la consulta: $consulta_select : " . mysqli_error($conexion);
}
?>

<style>
    /* Estilo para tabla de datos que se crea mediante listar_canciones.php */
table {
  width: 80%;
  max-width: 100%; /* La tabla no excederá el ancho de su contenedor */
  margin: 30px auto;
  border-collapse: collapse;
  border: 3px solid #ffffff;
  background-color: #1D3557;
  box-shadow: 0 14px 10px rgba(0, 0, 0, 0.8);
  border-radius: 8px;
  overflow: hidden;
  color: #ffffff;
  font-family: 'Arial', sans-serif;
  table-layout: auto; /* La tabla ajustará el tamaño según su contenido */
}

/* Filas normales */
td {
  padding: 15px 20px; /* Reducido padding */
  text-align: center;
  border: 1px solid rgba(255, 255, 255, 0.1);
  background-color: #1e1e1e;
  transition: all 0.3s ease-in-out;
}

/* Enlace de YouTube (Escala al pasar el mouse) */
.link_yt {
  transition: all 0.3s ease-in-out;
}
.link_yt:hover {
  transform: scale(1.4);
  transition: all 0.3s ease-in-out;
}

/* Estilo alternado para filas */
tr:nth-child(even) td {
  background-color: #292929;
}

/* Animación al pasar sobre una fila */
tr:hover td {
  background-color: #1D3557;
  color: #ffffff;
  transform: scale(1.02);
}

/* Animación para los encabezados */
th:hover {
  background: linear-gradient(135deg, #0077ff, #0047ab);
  cursor: pointer;
  transform: translateY(-2px);
}

/* Estilo para celdas específicas */
td:first-child {
  border: 1px solid #1D3557;
  text-decoration: underline;
  font-weight: bold;
  color: #335e9b;
}

/* Animación de entrada para la tabla */
@keyframes tableLoad {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
table {
  animation: tableLoad 0.8s ease-out;
}

/* Estilo para texto inferior */
.texto_inferior {
  color: white;
  transition: all 0.3s ease-in-out;
  width: 20rem;
  margin: 0 auto;
}
.texto_inferior:hover {
  transform: scale(1.5);
  text-decoration: underline;
}

/* Media Query para pantallas pequeñas (Móviles) */
@media screen and (max-width: 768px) {
  table {
    width: 80%; /* Ajusta el ancho de la tabla en pantallas pequeñas */
    margin: 5px auto; /* Menor espacio alrededor de la tabla */
  }

  td {
    padding: 5px 8px; /* Reducir padding de las celdas */
    font-size: 8px; /* Reducir tamaño de fuente */
  }

  th {
    font-size: 8px; /* Reducir tamaño de fuente para encabezados */
  }

  /* Ajustar la primera columna para que se vea más clara */
  td:first-child {
    font-size: 8px;
    font-weight: bold;
  }

  /* Asegura que el texto largo en las celdas no desborde */
  td {
    word-wrap: break-word;
  }
}

/* Media Query para pantallas más grandes (Tablets y PCs) */
@media screen and (min-width: 769px) {
  table {
    width: 80%; /* Tabla con mayor ancho en pantallas más grandes */
  }

  td {
    padding: 15px 20px; /* Padding normal en pantallas más grandes */
    font-size: 16px; /* Tamaño de fuente estándar */
  }
}
</style>

