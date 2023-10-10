<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>LOGIN</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.css" rel="stylesheet">
		<style >
			body{
				background: url(https://www.sabeco.com.vn/Data/Sites/1/media/intro_bg/homebg.jpg);
				background-size: cover;
				height: 100%;
				width: 100%;
			}
			@import url(http://weloveiconfonts.com/api/?family=brandico|entypo|openwebicons|zocial);

			/* brandico */
			[class*="brandico-"]:before {
			  font-family: 'brandico', sans-serif;
			}

			/* entypo */
			[class*="entypo-"]:before {
			  font-family: 'entypo', sans-serif;
			}

			/* openwebicons */
			[class*="openwebicons-"]:before {
			  font-family: 'OpenWeb Icons', sans-serif;
			}

			/* zocial */
			[class*="zocial-"]:before {
			  font-family: 'zocial', sans-serif;
			}

			.form-signin{
			  max-width: 330px;
			  padding: 15px;
			  margin: 0 auto;
			}

			.login-input {
			  margin-bottom: -1px;
			  border-bottom-left-radius: 0;
			  border-bottom-right-radius: 0;
			}
			.login-input-pass {
			  margin-bottom: 10px;
			  border-top-left-radius: 0;
			  border-top-right-radius: 0;
			}

			.signup-input {
			  margin-bottom: -1px;
			  border-bottom-left-radius: 0;
			  border-bottom-right-radius: 0;
			}

			.signup-input-confirm {
			  margin-bottom: 10px;
			  border-top-left-radius: 0;
			  border-top-right-radius: 0;
			}

			.create-account {
			  text-align: center;
			  width: 100%;
			  display: block;
			}

			.form-signin .form-control {
			  position: relative;
			  font-size: 16px;
			  height: auto;
			  padding: 10px;
			  -webkit-box-sizing: border-box;
			  -moz-box-sizing: border-box;
			  box-sizing: border-box;
			}

			.btn-center{
			  width: 50%;
			  text-align: center;
			  margin: inherit;
			}

			.home{
				position: absolute;
				display: inline-block;
				padding: 12px 24px;
				background-color: #1fd1f9;
background-image: linear-gradient(315deg, #1fd1f9 0%, #b621fe 74%);
				font-weight: bold;
				border: none;
				outline: none;
				border-radius: 3px;
				cursor: pointer;
				font-size: large;
				top:0;
				right: 0;
				margin-top: 4%;
				margin-right: 5%;
				border: none;
  				transition: all 0.3s ease;
  				overflow: hidden;
				width: 100px;
				
			}
			.home a{
				color: white;
			}
			

			
		</style>
		
	</head>
	<body>
		<div class="container">
      
		      <script id="metamorph-1-start" type="text/x-placeholder"></script><script id="metamorph-21-start" type="text/x-placeholder"></script>

			<div class="container text-center">
		<button class="home btn-9"><a href="..">Web </a></button>

			    <form action="login.php" method="post" class="form-signin" data-ember-action="2">
			    	<h2 class="form-signin-heading">Sign in</h2>

					<br><br>
					    <small class="text-muted">Đăng nhập bằng tài khoản của bạn</small>
					    <br><br>
						<?php
						$message1 = '';
                        if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            // connect to database
                            $db_host = 'localhost';
                            $db_user = 'root';
                            $db_pass = '';
                            $db_name = 'webbanhang';
                            $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
							$is_loggin = true;
							$message1 = "1";
							if (preg_match('/[^\w\s]/', $username) || preg_match('/[^\w\s]/', $password)) {
								$message1 = 'SQL injection detected';
								$is_loggin = false;
							}else{
								$username1 = mysqli_real_escape_string($conn, $username);
								$password1 = mysqli_real_escape_string($conn, $password);
								$stmt = $conn->prepare("SELECT * FROM user where username = ? and password = ?");
								$stmt->bind_Param("ss", $username1,$password1);
								$stmt->execute();
                            	$result = mysqli_stmt_get_result($stmt);
                            	if (mysqli_num_rows($result) > 0) {
                                	session_start();
       								$_SESSION['username'] = $username;
									$_SESSION['password'] = $password;
                                	header('Location: sanpham.php');
									$csrf_token = bin2hex(random_bytes(32));
									$_SESSION['csrf_token'] = $csrf_token;
									setcookie("cookie_name", $csrf_token, time()+3600, "/", "", false, true);
									$form_html = '<form><input type="hidden" name="csrf_token" value="'.$csrf_token.'"></form>';
                            	} else {
                                	$message1 = 'Invalid username or password';
                            	}
							}							
                        }
                            ?>
                            <form action="" method="post">
                                <input id="ember360" name="username" class="ember-view ember-text-field form-control login-input" placeholder="UserName" type="text" required><br><br>
                                <input id="ember361" name="password" class="ember-view ember-text-field form-control login-input-pass" placeholder="Password" type="password" required ><br><br>
                                <input class="btn btn-lg btn-primary btn-block btn-center" name="login" value="Sign in" type="submit" data-bindattr-3="3"><br>

                			</form>
    					<p><?php echo '<span style="color:red; font-size:20px">'.$message1.'</span>'; ?></p>
				    	

				        <script id="metamorph-22-start" type="text/x-placeholder"></script><script id="metamorph-22-end" type="text/x-placeholder"></script>

				       
				        <small class="create-account text-muted" style="font-size: 15px; color:black;">Bạn không có tài khoản? <button id="ember363" class="ember-view btn btn-sm btn-default"><a href="../register/registerHTML.php"> Đăng ký </a></button> </small>
					</form>
		    </div>
		</div>
		<script>
		// Get the modal
		var modal = document.getElementById('id01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
		</script>
	        
        	
	</body>
</html>