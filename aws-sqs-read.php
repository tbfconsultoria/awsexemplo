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

while (true) {
    echo "BUSCA ...";
    $result = $client->receiveMessage(array(
        'QueueUrl' => $queueUrl,
        'MaxNumberOfMessages' => 10,
        'MessageAttributeNames' => [
            ".*"
        ]
    ));
//    print_r($result);
    if (is_array($result->get('Messages'))) {
        foreach ($result->get('Messages') as $message) {
            // Do something with the message
            echo PHP_EOL . $message['MessageId'];
            echo PHP_EOL . "" . $message['Body'];
            foreach ($message['MessageAttributes'] as $attribute => $value) {
                echo PHP_EOL . "\t" . $attribute . "\t=>" . $value['StringValue'];
            }
        }
    } else {
        echo "sem mensagens...";
    }
    sleep(5);
    echo PHP_EOL;
}
