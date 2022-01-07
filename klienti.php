<!DOCTYPE html>
<html>
<head>
    <title>Upload Files to FTP Server in PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
</head>
<body>
<br/>
<div class="container">
    <div class="col-xs-8 col-xs-offset-2 well" style="background:none;">
    <form action="ftp_upload.php" method="post" enctype="multipart/form-data">
        <legend>Please Choose File to Upload</legend>
        <div class="form-group">
            <input type="file" name="srcfile" />
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Upload File to FTP Server" class="btn btn-warning"/>
        </div>
    </form>
    </div>
</div>
</body>
</html>