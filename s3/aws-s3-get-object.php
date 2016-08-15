<?php
require '../vendor/autoload.php';

use Aws\S3\S3Client;

echo "TESTE S3 - BAIXA UM OBJETO" . PHP_EOL;
$client = new S3Client([
    'profile' => 'tbf',
    'region' => 'us-east-1',
    'version' => 'latest'
]);
try {

    $bucket = 'bucket_name';
    $keyname = 'objet_to_get';
    $filepath = 'path_to_download';
    $client = new S3Client([
        'profile' => 'tbf',
        'region' => 'us-east-1',
        'version' => 'latest'
    ]);

    // Get an object.
    $result = $client->getObject(array(
        'Bucket' => $bucket,
        'Key' => $keyname
    ));
    // Save object to a file.
    $result = $client->getObject(array(
        'Bucket' => $bucket,
        'Key' => $keyname,
        'SaveAs' => $filepath
    ));

    print_r($result);
} catch (Exception $e) {
    echo PHP_EOL . "#ERRO " . $e->getMessage();
}
