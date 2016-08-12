<?php
require 'vendor/autoload.php';

use Aws\Sqs\SqsClient;

echo "TESTE SQS LEITURA" . PHP_EOL;
$client = new SqsClient([
    'profile' => 'acesso1',
    'region' => 'us-east-1',
    'version' => 'latest'
]);

$result = $client->createQueue(array('QueueName' => 'dev-test'));
$queueUrl = $result->get('QueueUrl');

echo $queueUrl;

while (true) {
    echo "BUSCA ...";
    $result = $client->receiveMessage(array(
        'QueueUrl' => $queueUrl,
        'MaxNumberOfMessages' => 10
    ));
//    print_r($result->get('Messages'));
    if (is_array($result->get('Messages'))) {
        foreach ($result->get('Messages') as $message) {
            // Do something with the message
            echo PHP_EOL . $message['MessageId'] . "\t" . $message['Body'];
//            print_r($message);
        }
    } else {
        echo "sem mensagens...";
    }
    sleep(5);
    echo PHP_EOL;
}
