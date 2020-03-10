<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;

$Access_Key_ID = "AKIAJIGPLOZOLVOBN36A";
$Secret_Access_Key = "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";


$s3Client = new S3Client([
    'region' => 'us-east-2',
    'version' => '2006-03-01',
    'credentials' => [
        'key'    => $Access_Key_ID,
        'secret' => $Secret_Access_Key,
    ]
]);