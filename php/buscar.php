<?php 
require("conexion_ws.php");
if ($_SERVER['REQUEST_METHOD'] === 'GET'){ // SELECT
	$_GET = sanarDatos($conexion,$_GET);
	extract($_GET);
	if (count($_GET)==0) {
		$where=''; // Condición inicial inexistente, para devolver todos las canciones en caso de no recibir ningún dato por GET
	}
			// Búsqueda por txt introducido Dato enviado en el URL (método GET).
	elseif (count($_GET)==1 && isset($txt_buscar) && $txt_buscar!=null) {
	 $where= " where concat(canciones.Nombre,artistas.Nombre,albums.Nombre,albums.Fecha_Lanzamiento) like '%$txt_buscar%'";
	}
	
	else {
		die_por_fallo_en_sintaxis_peticion();
	}

	$consulta = "SELECT canciones.*, concat(artistas.Nombre,' ', artistas.Apellido) AS artista_nombre, 
    albums.Nombre AS album_nombre,
	albums.Fecha_Lanzamiento as fecha,
	multimedia.url as enlace,
    concat(canciones.Nombre, artistas.Nombre, albums.Nombre, albums.Fecha_Lanzamiento) as texto_busqueda 
FROM canciones
INNER JOIN artistas ON canciones.Artista = artistas.Id
INNER JOIN albums ON canciones.Album = albums.Id
LEFT JOIN multimedia ON multimedia.Cancion = canciones.Id AND multimedia.tipo_enlace = 'youtube'
$where
ORDER BY canciones.Puntuacion DESC";

	 $resultado_consulta = mysqli_query($conexion,$consulta);
	 

	 if (!$resultado_consulta) {
		 die_por_fallo_en_consulta($consulta,$conexion);
	 }
	 
	 $respuesta[STATUS]=SUCCESS;
	 if (mysqli_num_rows($resultado_consulta)>0) {
		 while ($fila = mysqli_fetch_array($resultado_consulta,MYSQLI_ASSOC)){
			 ajustaColumnasFormatoJSON($resultado_consulta,$fila);
			 $datos[] = $fila;
		 }
	
		 $respuesta[DATA]=$datos; 
	 }
	 else {
		 $respuesta[DATA]=SINDATOS; 
	 }
	 
	  header("Content-type: application/json");
	  echo json_encode($respuesta);
}

?>
