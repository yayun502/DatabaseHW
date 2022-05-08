<?php
    session_start();
    $_SESSION['Authenticated']=false;
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Minimal and Clean Sign up / Login and Forgot Form by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<script>
		function check_name_composition(uname){
			if(uname!=""){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					var message;
					if(this.readyState==4 && this.status==200){
						swith(this.responseText){
							case 'YES':
								message = '';
								break;
							case 'NO':
								message = '只能包含大小寫英文與數字';
								break;
							default:
								message = 'Oops. There is something wrong.';
								break;
						}
						document.getElementById("msg0").innerHTML = message;
					}
					
				};
			}
			xhttp.open("POST", "check_composition.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("string="+uname);
			else{
				document.getElementById("msg0").innerHTML = '';
			}
		}
		function check_phonenumber(uphone){
			if(uphone!=""){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					var message;
					if(this.readyState==4 && this.status==200){
						swith(this.responseText){
							case 'YES':
								message = '';
								break;
							case 'NO':
								message = 'The length of phone number is not correct.';
								break;
							default:
								message = 'Oops. There is something wrong.';
								break;
						}
						document.getElementById("msg1").innerHTML = message;
					}
					
				};
			}
			xhttp.open("POST", "check_phonenumber.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("uphone="+uphone);
			else{
				document.getElementById("msg1").innerHTML = '';
			}
		}
		function check_account(uacc){
			if(uacc!=""){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					var message;
					if(this.readyState==4 && this.status==200){
						swith(this.responseText){
							case 'YES':
								message = 'The account is available.';
								break;
							case 'NO':
								message = 'The account is not available.';
								break;
							default:
								message = 'Oops. There is something wrong.';
								break;
						}
						document.getElementById("msg2").innerHTML = message;
					}
					
				};
			}
			xhttp.open("POST", "check_account.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("uacc="+uacc);
			else{
				document.getElementById("msg2").innerHTML = '';
			}
		}
		function check_pwd_composition(pwd){
			if(pwd!=""){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					var message;
					if(this.readyState==4 && this.status==200){
						swith(this.responseText){
							case 'YES':
								message = '';
								break;
							case 'NO':
								message = '只能包含大小寫英文與數字';
								break;
							default:
								message = 'Oops. There is something wrong.';
								break;
						}
						document.getElementById("msg3").innerHTML = message;
					}
					
				};
			}
			xhttp.open("POST", "check_composition.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("string="+pwd);
			else{
				document.getElementById("msg3").innerHTML = '';
			}
		}
		function check_pwd_reType(re_pwd){
			if(re_pwd!=""){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					var message;
					if(this.readyState==4 && this.status==200){
						swith(this.responseText){
							case 'YES':
								message = '';
								break;
							case 'NO1':
								message = '請先輸入密碼再驗證';
								break;
							case 'NO2':
								message = '密碼驗證 ≠ 密碼';
								break;
							default:
								message = 'Oops. There is something wrong.';
								break;
						}
						document.getElementById("msg4").innerHTML = message;
					}
					
				};
			}
			const pwd = document.getElementById("pwd");
			xhttp.open("POST", "check_pwd_reType.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("re_pwd="+re_pwd+"&pwd="+pwd);
			else{
				document.getElementById("msg4").innerHTML = '';
			}
		}
		function check_latitude(ulat){
			if(ulat!=""){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					var message;
					if(this.readyState==4 && this.status==200){
						swith(this.responseText){
							case 'YES':
								message = '';
								break;
							case 'NO1':
								message = '只能允許浮點數';
								break;
							case 'NO2':
								message = '範圍不正確';
								break;
							default:
								message = 'Oops. There is something wrong.';
								break;
						}
						document.getElementById("msg5").innerHTML = message;
					}
					
				};
			}
			xhttp.open("POST", "check_latitude.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("ulat="+ulat);
			else{
				document.getElementById("msg5").innerHTML = '';
			}
		}
		function check_longitude(ulon){
			if(ulon!=""){
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function(){
					var message;
					if(this.readyState==4 && this.status==200){
						swith(this.responseText){
							case 'YES':
								message = '';
								break;
							case 'NO1':
								message = '只能允許浮點數';
								break;
							case 'NO2':
								message = '範圍不正確';
								break;
							default:
								message = 'Oops. There is something wrong.';
								break;
						}
						document.getElementById("msg6").innerHTML = message;
					}
					
				};
			}
			xhttp.open("POST", "check_longitude.php", true);
			xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhttp.send("ulon="+ulon);
			else{
				document.getElementById("msg6").innerHTML = '';
			}
		}
	</script>
	</head>
    
	<body>
	
		<div class="container">
		
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					

					<!-- Start Sign In Form -->
					<form action="register.php" method="post" class="fh5co-form animate-box" data-animate-effect="fadeIn">
						<h2>Sign Up</h2>
						<!-- <div class="form-group">
							<div class="alert alert-success" role="alert">Your info has been saved.</div>
						</div> -->
						<div class="form-group">
							<label for="name" class="sr-only">Name</label>
							<input type="text" class="form-control" id="name" placeholder="Name" autocomplete="off"
								    name="uname" oninput="check_name_composition(this.value);"><label id="msg0"></label>
						</div>
						<div class="form-group">
							<label for="name" class="sr-only">phonenumber</label>
							<input type="text" class="form-control" id="phonenumber" placeholder="PhoneNumber" autocomplete="off"
							        name="uphone" oninput="check_phonenumber(this.value);"><label id="msg1"></label>
						</div>
						<div class="form-group">
							<label for="Account" class="sr-only">Account</label>
							<input type="text" class="form-control" id="Account" placeholder="Account" autocomplete="off"
							        name="uacc" oninput="check_account(this.value);"><label id="msg2"></label>
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password" autocomplete="off"
									name="pwd" oninput="check_pwd_composition(this.value);" id='pwd'><label id="msg3"></label>
						</div>
						<div class="form-group">
							<label for="re-password" class="sr-only">Re-type Password</label>
							<input type="password" class="form-control" id="re-password" placeholder="Re-type Password" autocomplete="off"
								name="re_pwd" oninput="check_pwd_reType(this.value);"><label id="msg4"></label>
						</div>
						<div class="form-group">
							<label for="latitude" class="sr-only">latitude</label>
							<input type="text" class="form-control" id="latitude" placeholder="Latitude" autocomplete="off"
									name="ulat" oninput="check_latitude(this.value);"><label id="msg5"></label>
						</div>
						<div class="form-group">
							<label for="longitude" class="sr-only">longitude</label>
							<input type="text" class="form-control" id="longitude" placeholder="longitude" autocomplete="off"
									name="ulon" oninput="check_longitude(this.value);"><label id="msg6"></label>
						</div>
				
						<div class="form-group">
							<p>Already registered? <a href="index.php">Sign In</a></p>
						</div>
						<div class="form-group">
							<input type="submit" value="Sign Up" class="btn btn-primary">
						</div>
						
					</form>
					<!-- END Sign In Form -->

				</div>
			</div>
			<div class="row" style="padding-top: 60px; clear: both;">
				<div class="col-md-12 text-center"><p><small>&copy; All Rights Reserved. Designed by <a href="https://freehtml5.co">FreeHTML5.co</a></small></p></div>
			</div>
		</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

