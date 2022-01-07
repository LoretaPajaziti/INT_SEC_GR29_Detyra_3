<?php

// Connect to FTP server
$ftp_server = "127.0.0.1";

// Use correct ftp username
$ftp_username="altini";

// Use correct ftp password corresponding
// to the ftp username
$ftp_userpass="altin1";

// File name or path to upload to ftp server
$file = $_FILES['srcfile']['name'];
$fileExt = explode('.', $file);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('doc', 'docx','xls','xlsx');
$path_file = "C:\Users\GJKK\Desktop\siguria3\altini\\";
if(in_array($fileActualExt, $allowed)){

// Establishing ftp connection
$ftp_connection = ftp_connect($ftp_server)
	or die("Could not connect to $ftp_server");

if( $ftp_connection ) {
	echo "Successfully connected to the ftp server!";
	
	// Logging in to established connection with
	// ftp username password
	$login = ftp_login($ftp_connection, $ftp_username, $ftp_userpass);
	
	// Checking whether logged in successfully or not
	if($login) {
		echo "<br>logged in successfully!";
		
		if (ftp_put($ftp_connection,
				"uploadedfile_name_".$file, $path_file.$file, FTP_BINARY))
		{
		echo "<br>Uploaded successful $file.";
		}
		else {
		echo "<br>Error while uploading $file.";
		}
		
	}
	else {
		echo "<br>login failed!";
	}

	// Closing the connection
	if(ftp_close($ftp_connection)) {
		echo "<br>Connection closed Successfully!";
	}
}

}
else {
    echo 'Lloji i file-it qe keni zgjedhur nuk pershtatet!';
   }
?>
