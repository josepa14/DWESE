
<?php
echo 'hola';
$token = '5985274958:AAH2ozVrKmOS0XdDW_24H_mu4sn4MGuXziI';
//$url = '';
//$website = 'https://api.telegram.org/bot'.$token .'/setWebhook?url='.$url.'/index.php';
$website ='https://api.telegram.org/bot'.$token;
$input = file_get_contents('php://input');
$update = json_decode($input, TRUE);

$chatId = $update['message']['chat']['id'];
$message = $update['message']['text'];

switch($message) {
    case '/start':
        $response = 'Me has iniciado';
        sendMessage($chatId, $response);
        break;
    case '/info':
        $response = 'Hola! Soy @trecno_bot';
        sendMessage($chatId, $response);
        break;
    default:
        $response = 'No te he entendido';
        sendMessage($chatId, $response);
        break;
}

function sendMessage($chatId, $response) {
    $url = $GLOBALS['website'].'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($response);
    file_get_contents($url);
}
?>