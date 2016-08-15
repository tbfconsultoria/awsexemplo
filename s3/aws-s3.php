<?php
require '../vendor/autoload.php';

use Aws\S3\S3Client;

echo "TESTE S3 LISTA BUCKETS E OBJETOS" . PHP_EOL;
$client = new S3Client([
    'profile' => 'tbf',
    'region' => 'us-east-1',
    'version' => 'latest'
]);
try {

    $result = $client->listBuckets();
    foreach ($result->get('Buckets') as $bucket) {
        echo PHP_EOL . "#" . $bucket['Name'];

    }
    echo PHP_EOL;

    $bucket = 'bucket_name';
    $result = $client->listObjects([
        'Bucket' => $bucket,
        'MaxKeys' => 10,
    ]);
    foreach ($result->get('Contents') as $i => $item) {
        echo PHP_EOL . '#' . $i . ' >' . $item['Key'];
    }
} catch (Exception $e) {
    echo PHP_EOL . "#ERRO " . $e->getMessage();
}
