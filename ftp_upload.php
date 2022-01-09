<!DOCTYPE html>
<html>
<head><body>
    <title>Upload Files to FTP Server in PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu|Lora">
    <style>
        html {
  height: 100%;
}
body {
 
    font-family: sans-serif;
    background: linear-gradient(#141e30, #243b55);
    background-image: url("diamond.jpg");
    background-size: 100%;

}
p {
            color: white;
            font-family: Ubuntu, sans-serif;
            font-size: 25px;
	    text-align: center;
			
        }
div {

	border: solid, 2px, yellow; 

}

</style>
</head>
</body>
</html>
<?php
// Connect to FTP server
$ftp_server = "127.0.0.1";

// Use ftp username
$ftp_username="spiderman";

// Use ftp password corresponding to the ftp username
$ftp_userpass="spiderman123";

// File name or path to upload to ftp server
$file = $_FILES['srcfile']['name'];
$path_file = $_FILES['srcfile']['tmp_name'];
$fileExt = explode('.', $file);
$fileActualExt = strtolower(end($fileExt));

// Specifying which type of files are compatible 
$allowed = array('doc', 'docx','xls','xlsx');
if(in_array($fileActualExt, $allowed)){
// Establishing ftp connection
$ftp_connection = ftp_connect($ftp_server)
	or die("<p>Could not connect to $ftp_server </p>");

if( $ftp_connection ) {
	echo "<p style=\"margin-top: 180px\">Successfully connected to the FTP Server!</p>";
	
	// Logging in to established connection with
	// ftp username password
	$login = ftp_login($ftp_connection, $ftp_username, $ftp_userpass);
	
	// Checking whether logged in successfully or not
	if($login) {
		echo "<br><p>Logged in successfully!<p/>";
		
		if (ftp_put($ftp_connection,$file, $path_file, FTP_BINARY))
		{
		echo "<br><p>$file uploaded successfully!</p>";
		}
		else {
		echo "<br><p>Error while uploading $file.</p>";
		}
		
	}
	else {
		echo "<br><p>Login failed!</p>";
	}

	// Closing the connection
	if(ftp_close($ftp_connection)) {
		echo "<br><p>Connection closed successfully!</p>";
	}
}

}
else {
  	echo "<p style=\"margin-top: 180px\">The type of file you have chosen is not compatible with our system.</p>";
	echo "<br>";
	echo "<p>Please select only .doc, .docx, .xls or .xlsx files!</p>";
   }

?>
