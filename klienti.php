<!DOCTYPE html>
<html>
<head>
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


        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgba(0,0,0,.5);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0,0,0,.6);
            border-radius: 10px;
        }

            .login-box h2 {
                margin: 0 0 30px;
                padding: 0;
                color: #fff;
                text-align: center;
            }

            .login-box .user-box {
                position: relative;
            }

                .login-box .user-box input {
                    width: 100%;
                    padding: 10px 0;
                    font-size: 16px;
                    color: #fff;
                    margin-bottom: 30px;
                    border: none;
                    border-bottom: 1px solid #fff;
                    outline: none;
                    background: transparent;
                }

                .login-box .user-box label {
                    position: absolute;
                    top: 0;
                    left: 0;
                    padding: 10px 0;
                    font-size: 16px;
                    color: #fff;
                    pointer-events: none;
                    transition: .5s;
                }

                .login-box .user-box input:focus ~ label,
                .login-box .user-box input:valid ~ label {
                    top: -20px;
                    left: 0;
                    color: #daa520;
                    font-size: 12px;
                }
                input[type=file]::-webkit-file-upload-button {
  border: 1px solid #daa520;
  background:#daa520;
  border-radius: 4px;
  padding: 10px 20px;
  box-shadow: 0 2px 8px 1px #454545;
  cursor: pointer;
}
        h1 {
            font-family: Ubuntu, sans-serif;
        }
        .hidden {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #daa520;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
        }
            .hidden span {
                position: absolute;
                display: block;
            }

        .hidden span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #daa520);
            animation: btn-anim1 1s linear infinite;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,100% {
                left: 100%;
            }
        }

        .hidden span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #7CB9E8);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s
        }

        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }

            50%,100% {
                top: 100%;
            }
        }

        .hidden span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #daa520);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s
        }

        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }

            50%,100% {
                right: 100%;
            }
        }

        .hidden span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #daa520);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s
        }

        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }

            50%,100% {
                bottom: 100%;
            }
        }

        p {
            color: white;
            font-family: Ubuntu, sans-serif;
            font-size: 15px;
        }

        .login-box form #submit {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #daa520;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            
            letter-spacing: 4px
        }

        .login-box #submit:hover {
            background: #daa520;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #7CB9E8, 0 0 25px #daa520, 0 0 50px #daa520, 0 0 100px #daa520;
        }

            .login-box #submit span {
                position: absolute;
                display: block;
            }

                .login-box #submit span:nth-child(1) {
                    top: 0;
                    left: -100%;
                    width: 100%;
                    height: 2px;
                    background: linear-gradient(90deg, transparent, #daa520);
                    animation: btn-anim1 1s linear infinite;
                }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }

            50%,100% {
                left: 100%;
            }
        }

        .login-box #submit span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #daa520);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s
        }

        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }

            50%,100% {
                top: 100%;
            }
        }

        .login-box #submit span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #daa520);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s
        }

        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }

            50%,100% {
                right: 100%;
            }
        }

        .login-box #submit span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #daa520);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s
        }

        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }

            50%,100% {
                bottom: 100%;
            }
        }
        p {
            color: white;
        }

    </style>
</head>
<body>
<br/>
    <div class="login-box">
  <h2>Upload Your File</h2>
        <p>Please upload files only in '.doc', '.docx', '.xls' and '.xlsx' format.</p>
        <form action="ftp_upload.php" method="post" enctype="multipart/form-data">
    <div class="user-box">
      <input type="file" class="hidden" name="srcfile">
    </div>

    <input type="submit" name="submit" value="Upload File" class="btn btn-warning" id="submit"/>
  </form>

</body>
</html>
