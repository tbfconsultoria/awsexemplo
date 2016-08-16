<?php
require '../vendor/autoload.php';

use Aws\Sns\SnsClient;

echo "TESTE SNS ENVIA MENSAGEM" . PHP_EOL;
$client = new SnsClient([
    'profile' => 'tbf',
    'region' => 'us-east-1',
    'version' => 'latest'
]);
try {
    $result = $client->publish([
        'TopicArn' => 'arn:aws:sns:us-east-1:722951072251:Test',
        'Message' => 'Inicia a MASTER CLINICAS!', // REQUIRED
        'MessageAttributes' => [
            'Observacao' => [
                'DataType' => 'String', // REQUIRED
                'StringValue' => 'Teste com o Hugo!',
            ]
        ]
    ]);
    print_r($result);
} catch (Exception $e) {
    echo PHP_EOL . "#ERRO " . $e->getMessage();
}
