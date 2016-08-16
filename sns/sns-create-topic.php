<?php
require '../vendor/autoload.php';

use Aws\Sns\SnsClient;

echo "TESTE SNS CRIA TÓPICO" . PHP_EOL;
$client = new SnsClient([
    'profile' => 'tbf',
    'region' => 'us-east-1',
    'version' => 'latest'
]);
try {
    $result = $client->createTopic(['Name' => 'Test']);
} catch (Exception $e) {
    echo PHP_EOL . "#ERRO " . $e->getMessage();
}
