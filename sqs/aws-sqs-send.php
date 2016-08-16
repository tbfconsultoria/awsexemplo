<?php
require '../vendor/autoload.php';

use Aws\Sqs\SqsClient;

echo "TESTE SQS ENVIO" . PHP_EOL;
$client = new SqsClient([
    'profile' => 'acesso1',
    'region' => 'us-east-1',
    'version' => 'latest'
]);
try {

    $result = $client->createQueue(array('QueueName' => 'dev-test'));
    $queueUrl = $result->get('QueueUrl');

    echo $queueUrl;
    echo PHP_EOL;
//
    $client->sendMessage(array(
        'QueueUrl' => $queueUrl,
        'MessageBody' => 'Música',
        'DelaySeconds' => 1,
        'MessageAttributes' => [
            'banda' => [
                'DataType' => 'String',
                'StringValue' => 'The Beatles',
            ],
            'musica' => [
                'DataType' => 'String',
                'StringValue' => 'She Loves You'
            ],
            'tempo' => [
                'DataType' => 'Number',
                'StringValue'=> 2.9
            ]
        ]
    ));

} catch (Exception $e) {
    echo PHP_EOL . "#ERRO " . $e->getMessage();
}
