<?php

/*
*
* Endeos, Working for You
* blog.endeos.com
*
*/

require_once('mail/PHPMailerAutoload.php');


$mail = new PHPMailer;

//$mail->SMTPDebug    = 3;

$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';   /*Servidor SMTP*/																		
$mail->SMTPSecure = 'SSL';   /*Protocolo SSL o TLS*/
$mail->Port = 25;   /*Puerto de conexión al servidor SMTP*/
$mail->SMTPAuth = true;   /*Para habilitar o deshabilitar la autenticación*/
$mail->Username = 'tomasuhiaotero@gmail.com';   /*Usuario, normalmente el correo electrónico*/
$mail->Password = 'root';   /*Tu contraseña*/
$mail->From = 'tomasuhiaotero@gmail.com';   /*Correo electrónico que estamos autenticando*/
$mail->FromName = 'tomas';   /*Puedes poner tu nombre, el de tu empresa, nombre de tu web, etc.*/
$mail->CharSet = 'UTF-8';   /*Codificación del mensaje*/

?>