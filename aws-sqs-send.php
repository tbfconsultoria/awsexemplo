<?php
require 'vendor/autoload.php';

use Aws\Sqs\SqsClient;

echo "TESTE SQS ENVIO" . PHP_EOL;
$client = new SqsClient([
    'profile' => 'ideal',
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
        'MessageBody' => 'IDEAL TESTE I!',
        'DelaySeconds' => 1,
    ));

} catch (Exception $e) {
    echo PHP_EOL . "#ERRO " . $e->getMessage();
}
