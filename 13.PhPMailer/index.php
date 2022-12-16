<?php
require "./vendor/autoload.php";

use  PHPMailer\PHPMailer\PHPMailer;
use Dompdf\Dompdf;

#Genero primero el pdf

$html='
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Pedazo de PDF</title>
</head>
<body>
<h2>Claves para aprobar</h2>
<p>Pautas:</p>
<dl>
<dd>Perseverancia</dd>
<dd>Constancia</dd>
<dd>Optimismo</dd>
<dd>Autoestima aunque no me quede</dd>
<dd>Trabajo en Equipo</dd>
<dd>Jamón Pata Negra</dd>
</body>
</html>';
$mipdf = new Dompdf();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html($html); //aqui puede entrar un .html
$mipdf ->render();
$pdf = $mipdf->output();
$filename = "claves.pdf";
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
$mail->Subject    = "Josepa de pruebas";
// cuerpo
$mail->addEmbeddedImage('jamon.png', 'jamon'); 
$pata = '<h1>Hola wapo te has ganado este Jamon por lo bien que has hecho la practica</h1>

'; //con el cid te coge la imagen endebida y te la agrega al cuerpo del mensaje, si la dejas como embeded a secas te la adjunta como documento
$mail->MsgHTML($pata);
// adjuntos
$mail->addAttachment($filename);
// destinatario
$correos ="jcasper2112@g.educaand.es";

//for ($i = 0; $i< sizeof($correos);$i++){
    $mail->AddAddress($correos,"Josepa");
//}


   
// enviar
$resul = $mail->Send();

if (!$resul) {
    echo "Error" . $mail->ErrorInfo;
} else {
    echo "Enviado";
}
