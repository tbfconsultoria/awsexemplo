<?php
require 'vendor/autoload.php';

use Aws\Ec2\Ec2Client;

echo "TESTE EC2" . PHP_EOL;
$client = new Ec2Client([
    'profile' => 'acesso1',
    'region' => 'us-east-1',
    'version' => 'latest'
]);
try {


//    $result = $client->startInstances([
//        'InstanceIds' => ['', ''], // REQUIRED
//    ]);
//    $result = $client->stopInstances([
//        'InstanceIds' => ['', ''], // REQUIRED
//    ]);
    $result = $client->describeInstances();
    $reservations = $result->get('Reservations');
    foreach ($reservations as $reservation) {
        echo PHP_EOL . "#id" . $reservation['ReservationId'];
        foreach ($reservation['Instances'] as $instance) {
            echo PHP_EOL . "\t#" . $instance['InstanceId'];
            echo PHP_EOL . "\t|" . $instance['KeyName'];
            echo PHP_EOL . "\t|" . $instance['State']['Name'];
//            print_r($instance);
            echo ' ' . $instance['PublicDnsName'];
            echo ' ' . $instance['InstanceType'];
        }
    }
} catch (Exception $e) {
    echo PHP_EOL . "#ERRO " . $e->getMessage();
}
