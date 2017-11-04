<?php
	include_once 'includes/db_connect.php';	
	include_once 'includes/functions.php';
 
	sec_session_start();
 
	if (login_check($mysqli) == true) {
    		$logged = 'in';
    		header('Location: dashboard.php');
	} else {
    		$logged = 'out';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome Back</title>
		<link href="style.css" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Catamaran:200|Montserrat:900" rel="stylesheet">
		<script type="text/javascript" src="sha512.js"></script>
		<script type="text/javascript" src="forms.js"></script>
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103778914-1', 'auto');
  ga('send', 'pageview');

</script>
	</head>
	<body style="min-height: 100%;">
	<div class="container" style="min-height: 100%;">
		<div id="headcontainer">
				<figure id="logo">
					<img src="/images/classstashlogo.jpeg" alt="Class Stash">
				</figure>
				<ul id="topmenu">
					<li class="menuitem"><a href="">Home</a></li>
					<li class="menuitem"><a href="">Classes</a></li>
					<li class="menuitem"><a href="">Resources</a></li>
					<li class="menuitem"><a href="">Get Help</a></li>
				</ul>
				<p id="profile"><a href="">
					<img src="/images/iu.png" title="You" class="profile"></br>
					Log in</a>
				</p>
		</div>
		<div id="logincontent">
			<div id="full">
				<div id="login">
					<h1 id="welcome">Welcome Back!</h1>
					<form action="includes/process_login.php" method="post" name="login_form">
						<div class="loginfield">
              				<input class="schoolin" style="width: 20rem"type="text" name="email" placeholder="Email"/>
            			</div>
            			<div class="loginfield">
            				<input class="schoolin" style="width: 20rem; padding-top: 2rem;" type="password" name="pass" required autocomplete="off" placeholder="Password"/>
            			</div>
            			<button type="submit" style="margin-top: 8rem; width: 25rem;" value="Login" onclick="formhash(this.form, this.form.pass)" id="loginbtn" class="button button-block"/>Log In</button>
					</form>
					<?php
        					if (isset($_GET['error'])) {
            						echo '<p style="color: red;">Your email or password was entered incorrectly.</p>';
        					}
        				?> 
					<p class="logoptions"><a class="addbtn" style="top: 0; padding: .5rem;"href="register.php"> Need an account? Sign up here.</a></p>
					<p class="logoptions">Forgot Password?</p>
			</div>
			</div>
		</div>
		<div class="footer">
		<div style="position: relative; top: .5rem; left: 1rem;">
			<table>
				<tr style="width: 100%">
					<td><small>Copyright &copy; 2017 Joe Fedota, All Rights Reserved</small></td>
					<td style="position: relative; left: 35%;"><a href="about.php">About |</a><a href="privacypolicy.htm"> Privacy Policy |</a><a href="terms.html"> Terms & Conditions</a><td>
					<td style="position: absolute; right: 3rem;"><a><img style="height: 40px; width: 40px;" src="/images/fb.png"></a><a style="padding-left: 1rem;"><img style="height: 40px; width: 40px;" href="https://twitter.com/class_stash" src="/images/twit.png"></a><a style="padding-left: 1rem;"><img style="height: 40px; width: 40px;" src="/images/insta.png"></a></td>
				</tr>
			</table>
		</div>
	</div>
			</div>
	

	</body>
</html>