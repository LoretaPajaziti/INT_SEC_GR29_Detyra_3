<?php
//check if form is submitted
// if (isset($_POST['submit']))
// {
//     // ftp settings
//     $ftp_hostname = '127.0.0.1'; // change this
//     $ftp_username = 'spiderman'; // change this
//     $ftp_password = 'spiderman123'; // change this
//     $remote_dir = 'C:\xampp\htdocs\test'; // change this
//     $src_file = $_FILES['srcfile']['name'];


//     //upload file
//     if ($src_file != '')
//     {
       
//         // remote file path
//         $dst_file = $remote_dir . $src_file;
//         echo $dst_file;
//         // connect ftp
//         $ftpcon = ftp_connect($ftp_hostname) or die('Error connecting to ftp server...');
//         // ftp login
//         $ftplogin = ftp_login($ftpcon, $ftp_username, $ftp_password);
//         ftp_pasv($ftpcon, true);
//         // ftp upload
//         if (ftp_put($ftpcon, $dst_file, $src_file, FTP_ASCII))
//             echo 'File uploaded successfully to FTP server!';
//         else
//             echo 'Error uploading file! Please try again later.';
        
//         // close ftp stream
//         ftp_close($ftpcon);
//     }
//     else
//         // header('Location: index.php');
//         echo 'Woohoo';
// }
?>




<?php

// Connect to FTP server
$ftp_server = "127.0.0.1";

// Use correct ftp username
$ftp_username="spiderman";

// Use correct ftp password corresponding
// to the ftp username
$ftp_userpass="spiderman123";

// File name or path to upload to ftp server
// $file = "C:\Users\loret\Desktop\\test.docx";
$file = $_FILES['srcfile']['name'];
$fileExt = explode('.', $file);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('doc', 'docx');

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
				"uploadedfile_name.docx", $file, FTP_BINARY))
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
