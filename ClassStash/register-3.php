<?php
	include_once 'includes/register.inc.php';
	include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Class Stash</title>
		<link href="style.css" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Catamaran:200|Montserrat:900" rel="stylesheet">
		<script type="text/javascript" src="jquery-1.8.3.js"></script>
		<script type="text/javascript" src="changedash.js"></script>
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
	<body id="indexbody">
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
				<p id="profile"><a href="login.php">
					<img src="/images/iu.png" title="You" class="profile"></br>
					Log in</a>
				</p>
		</div>
		<div class="content">
			<div id="all">
			<div id= "signup">		
		
				<div class="form">
      				<h1 id="new" style="font-family: 'Montserrat', sans-serif;">New to Class Stash? Sign Up For Free.</h1>
			<?php
      				if(!empty($error)) {
      					echo $error;
      				}
      			?>
      			
        		<div id="signupform">
          			<form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" name="register_form">
          
         			<div class="top-row">
            			<div class="field-wrap">
             			 <input class="schoolin" style="position: relative; top: 0; background-color: transparent;" id="first" name="fullname" type="text" required autocomplete="off" placeholder="Full Name"/>
            			</div>
        
            			<div class="field-wrap">
             			 <input class="schoolin" style="position: relative; top: 1rem; background-color: transparent;" type="text" name="email" placeholder="Email Address"/>
            			</div>
         			 </div>

          			<div class="field-wrap">
            			<input class="schoolin" style="position: relative; top: 2rem; background-color: transparent;" type="password" name="pass" required autocomplete="off" placeholder="Password"/>
          			</div>
          
          			<div class="field-wrap">
           			 <input class="schoolin" style="position: relative; top: 3rem; background-color: transparent;" type="password" name="conf" required autocomplete="off" placeholder="Re-enter Password"/> 
          			</div>
          			<p style="margin-top: 6rem;">By creating an account, you are agreeing to our <a style="color: blue;" href="terms.html">Terms and Conditions</a> and <a href="privacypolicy.htm" style="color: blue;">Privacy Policy</a></p>
         			 <button class="button button-block" style="margin-top: 7rem;" type="submit" value="Register" onclick="return regformhash(this.form, this.form.fullname, this.form.email, this.form.pass, this.form.conf);"/>Get Started --></button>
          			
         			 </form>

        		</div>
			</div>

			<div id="perks">
				<h2 id="perklabel">What you get with Class Stash.</h2>
				<div class="perk">
					<img class="plogo" src="/images/rs.png" alt="resources logo">
					<p class="caption" id="c1">Unlimited access to shared academic resources.</p>
				</div>
				<div class="perk">
					<img class="plogo" src="/images/p2p.png" alt="peer to peer logo">
					<p class="caption">Unparalleled Peer to Peer connection among students.</p>
				</div>
				<div class="perk">
					<img class="plogo" src="/images/school.png" alt="school logo">
					<p class="caption" id="c3">A new approach to the online school management.</p>
				</div>
			</div> 
		</div><!-- /form -->
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
</body>
</html>