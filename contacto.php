<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto</title>
  <link rel="stylesheet" href="css/estilocontacto.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  
  <script>
    // Script JS para validar y redirigir solo si los datos son correctos
    function redireccion(event) {
        event.preventDefault(); // Evita el envío tradicional del formulario

        // Obtener los valores de los campos del formulario
        const nombre = document.querySelector('input[name="nombre"]').value.trim();
        const email = document.querySelector('input[name="email"]').value.trim();
        const mensaje = document.querySelector('textarea[name="mensaje"]').value.trim();

        // Validar que todos los campos estén completos
        if (!nombre || !email || !mensaje) {
            alert("Por favor, completa todos los campos antes de enviar."); // Muestra un mensaje de error
            return; // Salir del script, no redirige
        }

        // Validar el formato del correo electrónico usando una expresión regular
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Por favor, ingresa un correo electrónico válido.");
            return; // Salir del script, no redirige
        }

        // Si todo es válido, redirigir a la página de confirmación
        window.location.href = "confirmacion.php";
    }
</script>
</head>
<body>
  <div class="logo">
    <a href="index.php"><img src="images/logo.png" class="rotate" width="120px" height="80px"></a>
  </div>
  <div class="contenedor">
    <div class="caja-informacion">
      <h1>CONTÁCTANOS</h1>
      <div class="datos">
        <p><i class="fa-solid fa-phone"></i> 698 10 73 75</p>
        <p><i class="fa-solid fa-envelope"></i> tomasuhiaotero@gmail.com</p>
        <p><i class="fa-solid fa-location-dot"></i> Calle Arenal n18</p>
      </div>
      <div class="links">
        <a href="https://www.facebook.com/?locale=es_ES"><i class="fa-brands fa-facebook"></i></a>
        <a href="https://www.instagram.com/?hl=es"><i class="fa-brands fa-instagram"></i></a>
        <a href="https://x.com/?lang=es"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://es.linkedin.com/"><i class="fa-brands fa-linkedin"></i></a>
      </div>
    </div>
    <form method="POST" action="">
      <div class="input-box">
        <input type="text" name="nombre" placeholder="Nombre y apellido...">
        <i class="fa-solid fa-user"></i>
      </div>
      <div class="input-box">
        <input type="email" name="email" required placeholder="Correo electrónico...">
        <i class="fa-solid fa-envelope"></i>
      </div>
      <div class="input-box">
        <input type="text" name="asunto" placeholder="Asunto...">
        <i class="fa-solid fa-pen-to-square"></i>
      </div>
      <div class="input-box">
        <textarea name="mensaje" cols="30" rows="10" placeholder="Escribe tu mensaje..."></textarea>
        <button type="submit"onclick="redireccion(event)">Enviar mensaje</button>
      </div>
    </form>
  </div>
</body>

<?php

require_once('mail/config.php');
// Asegúrate de cargar automáticamente las clases de PHPMailer
require_once('vendor/autoload.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extraer los datos del formulario directamente como variables
    extract($_POST);

    // Validación
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        echo "<p>Por favor, completa todos los campos requeridos.</p>";
        exit;
    }

    // Validación del formato del correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Por favor, ingresa un correo electrónico válido.</p>";
        exit;
    }

    // Limpiar los datos para prevenir XSS
    $nombre = htmlspecialchars($nombre);
    $email = htmlspecialchars($email);
    $asunto = htmlspecialchars($asunto);
    $mensaje = htmlspecialchars($mensaje);

    try {
        // Crear una instancia de PHPMailer
        $mail = new PHPMailer(true);

        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
        $mail->SMTPAuth = true; // Habilitar autenticación SMTP
        $mail->Username = 'tomasuhiaotero@gmail.com'; // Usuario de correo (tu dirección de Gmail)
        $mail->Password = 'root'; // Contraseña del correo o contraseña de aplicación
        $mail->SMTPSecure = 'TLS'; // Protocolo TLS
        $mail->Port = 587; // Puerto SMTP

        // Configuración del correo
        $mail->setFrom('tomasuhiaotero@gmail.com', 'tomas'); // Remitente
        $mail->addAddress('tomasuhiaotero@gmail.com'); // Destinatario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = "Asunto: $asunto";
        $mail->Body = "
            <h1>Nuevo mensaje de contacto</h1>
            <p><strong>Nombre:</strong> $nombre</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Mensaje:</strong></p>
            <p>$mensaje</p>
        ";
        $mail->AltBody = "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje"; // Texto plano (opcional)

        // Intentar enviar el correo
        $mail->send();

        // Redirigir a la página de confirmación tras el envío exitoso
        header("Location: confirmacion.html");
        exit;
    } catch (Exception $e) {
        echo "<p>Error al enviar el mensaje: {$mail->ErrorInfo}</p>";
    }
}
?>