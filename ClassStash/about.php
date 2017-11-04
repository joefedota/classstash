<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/psl-config.php';
	include_once 'includes/functions.php';
	
	sec_session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>About | ClassStash</title>
		<link href="style.css" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Catamaran:200,600|Montserrat:900" rel="stylesheet">
		<script src="jquery-3.2.1.js"></script>
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103778914-1', 'auto');
  ga('send', 'pageview');

</script>
	</head>
	<body>
	<?php
				$uid = $_SESSION['user_id'];
				$stmt = $mysqli->prepare("SELECT fullname, email FROM members WHERE id = '".$uid."'");
				$stmt->execute();
				$stmt->store_result();
				$stmt->bind_result($fullname, $email);
				$stmt->fetch();
				$dtl_stmt = $mysqli->prepare("SELECT PROF_PIC_PATH, SCHOOL, GRADE_LEVEL, BIRTHDAY FROM member_details WHERE id = '".$uid."'");
				$dtl_stmt->execute();
				$dtl_stmt->store_result();
				$dtl_stmt->bind_result($path, $school, $grade, $bday);
				$dtl_stmt->fetch();
		?>
		<div id="headcontainer">
			<figure id="logo">
				<img src="images/classstashlogo.jpeg" alt="Class Stash">
			</figure>
				<ul id="topmenu">
					<li class="menuitem"><a href="dashboard.php">Home</a></li>
					<li class="menuitem"><a href="classes.php">Classes</a></li>
					<li class="menuitem"><a href="resources.php">Resources</a></li>
					<li class="menuitem"><a href="help.php">Get Help</a></li>
				</ul>
				<?php 
				if (isset($path)) {
						echo '<p id="profile"><a href="profile.php">
					<img src="'.$path.'" title="You" class="profile"></br>'.
					 $fullname.'</a>';
					} else {
						echo '<p id="profile"><a href="profile.php">
					<img src="/images/iu.png" title="You" class="profile"></br>'.
					 $fullname.'</a>';
					}
				?>
		</div>
		<div class="content">
			<div style="width: 100%;">
				<h1 style="font-family: 'Montserrat', sans-serif; margin-left: 2rem; font-size:40px;">The Product</h1>
				<table style="width:100%;">
					<tr>
					<th style="padding: 1rem; width:33%; text-align: center; font-size: 25px;">Current Version</th><th style="padding: 1rem; width:33%; text-align: center; font-size: 25px;">Last Update</th><th style="padding: 1rem; width:33%; text-align: center; font-size: 25px;">Coming Soon</th>
					</tr>
					<tr>
					<td style="font-weight: light; font-size: 30px; text-align: center;">v1.0.0 RELEASE</td><td style="text-align: center;"><ul><li>• Bug Fixes</li><li>• Class Interface</li><li>• Dashboard</li></ul></td><td style="text-align: center;"><ul><li>• Groups/Clubs</li><li>• Improved Search</li><li></li></ul></td>
					</tr>
				</table>
				<h1 style="font-family: 'Montserrat', sans-serif; margin-left: 2rem; font-size:40px;">The People</h1>
				<table style="width: 100%;">
					<tr>
						<td style="width: 50%; text-align: center; font-size: 25px; font-weight: bold;">Joe Fedota, Founder and CEO</td><td style="text-align: center; padding: 2rem;">Joe created Class Stash as a better solution to the messy online class management websites and academic resource sharing applications that were imposed upon students by their schools. He is 17 years old, and a Senior at Rio Americano High School.</td>
					</tr>
				</table>
			</div>
			
		</div>
		<div class="footer">
		<div style="position: relative; top: .5rem; left: 1rem;">
			<table>
				<tr style="width: 100%">
					<td><small>Copyright &copy; 2017 Joe Fedota, All Rights Reserved</small></td>
					<<td style="position: relative; left: 35%;"><a href="about.php">About |</a><a href="privacypolicy.htm"> Privacy Policy |</a><a href="terms.html"> Terms & Conditions</a><td>
					<td style="position: absolute; right: 3rem;"><a><img style="height: 40px; width: 40px;" src="/images/fb.png"></a><a style="padding-left: 1rem;"><img style="height: 40px; width: 40px;" href="https://twitter.com/class_stash" src="/images/twit.png"></a><a style="padding-left: 1rem;"><img style="height: 40px; width: 40px;" src="/images/insta.png"></a></td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>