<!DOCTYPE html>
<html>
<head>
    <title>Upload Files to FTP Server in PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu|Lora">
     <style>
body {
  animation: mymove 5s infinite;
}

@keyframes mymove {
  from {background-color: rgba(76, 175, 80, 0.1);}
  to {background-color: rgba(76, 175, 80, 0.6);}
}
h1 {
  font-family: Ubuntu, sans-serif;
  font-size: 46px;  
}
legend {
    font-family: Ubuntu, sans-serif;
    font-size: 20px;
}
.form-group {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
body {
    text-align: center;
    background: rgba(0, 128, 0, 0.1);
}
form {
    display: inline-block;
    border:thick;
}
input {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
input.btn.btn-warning {
    background-color: #4CAF50;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    transition-duration: 0.4s;
}
    </style>
</head>
<body>
<br/>
<div class="container">
    <div class="col-xs-8 col-xs-offset-2 well" style="background:none;">
    <form action="ftp_upload.php" method="post" enctype="multipart/form-data">
        <h1>Welcome to our File Uploader &#x1F603</h1>
        <legend>Please upload files only in '.doc', '.docx', '.xls', '.xlsx' format.</legend><br /><br />
        <div class="form-group" id="element">
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
