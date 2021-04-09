<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

try {
    $client = new \GuzzleHttp\Client();
    $res = $client->post('https://api.flexcontact.com.br/Messaging/Login', ['login' =>'xx', 'password' =>'fedfdfd']);
    
    if ($res->getStatusCode() == 200) {
        $credentials = $res->json();
        // $credentials['token']
    }

    if (!empty($credentials['token'])) {
        $res = $client->post('https://api.flexcontact.com.br/Messaging/Send', [
            "token" => $credentials['token'],
            "codCampaign" => "1",
            "Telephone" => "5511980125654",
            "Message" => "Envio Teste"
        ]);
    
        if ($res->getStatusCode() == 200) {
            $credentials = $res->json();
        }
    }
    
    var_dump($apiResult);
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
