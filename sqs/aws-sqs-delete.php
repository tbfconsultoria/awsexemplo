<?php
require '../vendor/autoload.php';

use Aws\Sqs\SqsClient;

echo "TESTE SQS DELETE" . PHP_EOL;
$client = new SqsClient([
    'profile' => 'acesso1',
    'region' => 'us-east-1',
    'version' => 'latest'
]);

$result = $client->createQueue(array('QueueName' => 'my-queue'));
$queueUrl = $result->get('QueueUrl');

$handle = 'AQEBtVmr72xHOBIxEBRnxLsO1yJKAwTSvgcmPbicdeHJPuk4zG4LMmzphLLUXSE7MpGwWai71Qrqk9bOVabUdIb+qc2MNYBxt8fVULhJo1QT6/dJK+KcPSl9hMosAtkW5V6AyUwtY0ZL4lwhE1RkQ34F5ew8XjizHqd++QLYigG7RHrPYiwoJrKYFDNHlIToKFb726+bihprBziGpvvwuU7S9qDuqCwtv5cQjJIgLc0mxDeSemNUfYa9kZPgMDGbYfSyWoH+h4VEBqPW2zeDwuqpxwfuP7ZE/gI5HEHQhGl7jXqwj//nflbzpaHWHiiOT2lkxxGI7Ynj1qcLYGcEdWH8qBXurQ4544nEVF/iNnC2LBSJQwaSRdxWBxm8XEQ39A8+';

$result = $client->deleteMessage(array(
    // QueueUrl is required
    'QueueUrl' => $queueUrl,
    // ReceiptHandle is required
    'ReceiptHandle' => $handle,
));

var_dump($result);