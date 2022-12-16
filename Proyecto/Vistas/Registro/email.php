<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';

use  PHPMailer\PHPMailer\PHPMailer;
use Dompdf\Dompdf;

function mandarEmail($user, $correonuevo)
{


    #Genero primero el pdf

    $html = '
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Confirmacion</title>
</head>
<body>
<h2>Registrado en la pagina</h2>
<p>Datos:</p>
<dl>
<dd>Usuario: ' . $user . ' correo: ' . $correonuevo . '</dd>

</body>
</html>';
    $mipdf = new Dompdf();
    $mipdf->set_paper("A4", "portrait");
    $mipdf->load_html($html); //aqui puede entrar un .html
    $mipdf->render();
    $pdf = $mipdf->output();
    $filename = "registro confirmado.pdf";
    file_put_contents($filename, $pdf);

    # ahora mando el correo

    $mail = new PHPMailer();
    $mail->IsSMTP();
    // cambiar a 0 para no ver mensajes de error
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "tls";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 587;
    // introducir usuario de google
    $mail->Username   = "metin2lahermandaz@gmail.com";
    // introducir clave
    $mail->Password   = "oyabpjybhlayhihd";
    $mail->SetFrom('metin2lahermandaz@gmail.com', 'Josepa');
    // asunto
    $mail->Subject    = "Registro en la pagina de concursos";
    // cuerpo
    $pata = '<h1>Bienvenido a la pagina de radio concursos</h1>

'; //con el cid te coge la imagen endebida y te la agrega al cuerpo del mensaje, si la dejas como embeded a secas te la adjunta como documento
    $mail->MsgHTML($pata);
    // adjuntos
    $mail->addAttachment($filename);
    // destinatario
    $correo="jcasper2112@g.educaand.es";

    //for ($i = 0; $i < sizeof($correos); $i++) {
        $mail->AddAddress($correo, "Persona");
    //}



    // enviar
    $resul = $mail->Send();

    if (!$resul) {
        echo "Error" . $mail->ErrorInfo;
    } else {
        echo "Enviado";
    }
}
