<?php
require '../vendor/autoload.php';
use Aws\S3\S3Client;

$bucket = 'bucket_name';
$keyname = 'file_name';
// $filepath should be absolute path to a file on disk
$filepath = 'path_to_upload';

// Instantiate the client.
echo "TESTE S3 - ENVIA UM OBJETO" . PHP_EOL;
$client = new S3Client([
    'profile' => 'tbf',
    'region' => 'us-east-1',
    'version' => 'latest'
]);

// Upload a file.
$result = $client->putObject(array(
    'Bucket' => $bucket,
    'Key' => $keyname,
    'SourceFile' => $filepath,
    //'ContentType' => 'text/plain',
    'ACL' => 'public-read',
    'StorageClass' => 'REDUCED_REDUNDANCY',
//    'Metadata' => array(
//        'param1' => 'value 1',
//        'param2' => 'value 2'
//    )
));

echo $result['ObjectURL'];