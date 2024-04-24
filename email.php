<?php
// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el contenido del mensaje del formulario
    $mensaje = $_POST['mensaje'];

    // Verificar si el mensaje no está vacío
    if (!empty($mensaje)) {
        // Direcciones de correo a las que se enviará el mensaje
        $destinatarios = array(
            'niqui.carena@gmail.com',
            'oscarwar50@gmail.com',
            'angelsteklein@gmail.com',
            'flavionramires@gmail.com'
        );

        // Configurar las cabeceras del correo
        $cabeceras = 'From: Tu Nombre <tucorreo@example.com>' . "\r\n";
        $cabeceras .= 'Reply-To: tucorreo@example.com' . "\r\n";
        $cabeceras .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";

        // Enviar correo a cada destinatario
        foreach ($destinatarios as $destinatario) {
            mail($destinatario, 'Nuevo mensaje desde el formulario', $mensaje, $cabeceras);
        }

        // Devolver una respuesta indicando éxito
        http_response_code(200); // Código de respuesta HTTP 200 (OK)
        echo 'Mensaje enviado correctamente.';
    } else {
        // Devolver un mensaje de error si el mensaje está vacío
        http_response_code(400); // Código de respuesta HTTP 400 (Bad Request)
        echo 'Error: El mensaje está vacío.';
    }
} else {
    // Si se accede directamente al archivo PHP sin enviar el formulario, devolver un mensaje de error
    http_response_code(403); // Código de respuesta HTTP 403 (Forbidden)
    echo 'Acceso no permitido.';
}
?>