<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;

$Access_Key_ID = "Yourkey";
$Secret_Access_Key = "youraccesskey";


$s3Client = new S3Client([
    'region' => 'us-east-2',
    'version' => '2006-03-01',
    'credentials' => [
        'key'    => $Access_Key_ID,
        'secret' => $Secret_Access_Key,
    ]
]);
