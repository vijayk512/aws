<?php

include 's3.php';




$buckets = $s3Client->listBuckets();
foreach ($buckets['Buckets'] as $bucket) {
//     print_r($bucket);
}


$file_name = $_FILES['aws-file']['name'];
$temp_file_location = $_FILES['aws-file']['tmp_name'];

try {
    $result = $s3Client->putObject([
        'Bucket' => 'vijay-panwar',
        'Key'    => 'project/'.$file_name,
        'SourceFile'   => $temp_file_location,
        'ACL'    => 'public-read'
    ]);

    header('Location: ' . 'index.php');

} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

