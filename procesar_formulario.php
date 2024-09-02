<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Validación simple
    if (!empty($nombre) && !empty($correo) && !empty($mensaje) && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        // Obtener la fecha y hora actual
        $fecha = date('Y-m-d H:i:s');

        // Formato del mensaje con fecha y hora
        $mensaje_formateado = "[$fecha] $nombre <$correo>: $mensaje\n";

        // Enviar correo o guardar en archivo
        // mail($correo, "Nuevo mensaje de contacto", $mensaje);  // Para enviar correo (Requerido configurar un servidor de correo)
        file_put_contents('mensajes.txt', $mensaje_formateado, FILE_APPEND);  // Guardar en archivo de texto

        echo "Mensaje enviado correctamente.";
    } else {
        echo "Por favor, completa todos los campos correctamente.";
    }
}
?>
