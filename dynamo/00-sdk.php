<?php
//http://docs.aws.amazon.com/amazondynamodb/latest/gettingstartedguide/GettingStarted.PHP.html
return new Aws\Sdk([
    'endpoint' => 'http://localhost:8000',
    'profile' => 'tbf',
    'region' => 'us-east-1',
    'version' => 'latest'
]);