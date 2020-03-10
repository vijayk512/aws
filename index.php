<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style>
    .footer {
        bottom: 0;
        width: 100%;
        height: 60px;
        line-height: 60px;
        background-color: #f5f5f5;
        margin-top: 40px;
    }
    .footer > .container {
        padding-right: 15px;
        padding-left: 15px;
    }
    .text-muted {
        color: #636c72!important;
    }
</style>
<body>
<div class="body text-center">
    <h1>My First AWS</h1>
</div>
<nav class="navbar navbar-expand-sm bg-light">

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Link 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
        </li>
    </ul>

</nav>
<div class="container" style="padding-top: 20px;">
    <form enctype="multipart/form-data" method="post" action="form-data.php">
        <div class="row">
            <div class="col-sm-4">
                    <label>Add file</label>
            </div>
            <div class="col-sm-6">
                <input type="file" name="aws-file" accept="image/*" class="form-control-file border">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<hr>
    <h4>Recent pictures uploaded</h4>
    <hr>
    <div class="row">
    <?php
        include 's3.php';
        $count = 0;
        $result = $s3Client->listObjectsV2(array(
            'Bucket' => 'vijay-panwar',
            'Prefix' => 'project/'
        ));

        foreach ($result['Contents'] as $r) {
            if($r['Size'] != 0) {
                ?>
                <div class="col-4">
                        <img src="https://vijay-panwar.s3.us-east-2.amazonaws.com/<?php echo $r['Key'] ?>"  class="img-fluid">
                </div>
                <?php
                $count++;
                if ($count % 3 == 0) {
                    echo '</div><div class="row" style="padding-top: 20px;">';
                }
            }
            } ?>
    </div>
</div>

<footer class="footer">
    <div class="container" style="text-align: center;">
        <span class="text-muted">AWS-Vijay Copy rights reserved<?php date('Y') ?></span>
    </div>
</footer>
</body>
</html>