<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/psl-config.php';
	include_once 'includes/functions.php';
	sec_session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Help | ClassStash</title>
		<link href="style.css" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<script type="text/javascript" src="changedash.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Catamaran:200|Montserrat:900" rel="stylesheet">
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
					<img src="/images/classstashlogo.jpeg" alt="Class Stash">
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
			<div style="float: left; padding-left: 2rem; max-width: 50%;">
				<h1>Here are some tips.</h1>
				<ul style="list-style: square;">
					<li style="margin-top: 2rem;">If you encountered a bug, please report it in the box to the right.</li>
					<li style="margin-top: 2rem;">If your search didn&apos;t return any results, try being more general. For example, searching US History, will return more results than, US History Chapter 1 Study Guide.</li>
					<li style="margin-top: 2rem;">Make sure that your teacher is selected in each class in order to be connected to your classmates and the proper resources.</li>
					<li style="margin-top: 2rem;">When searching for resources, make sure to use precise and accurately-spelled keywords.</li>
					<li style="margin-top: 2rem;">The What&apos;s New tab of the Dashboard contains updates for your entire account, to see updates for your classes visit the Class Interface.</li>
					<li style="margin-top: 2rem;">Some files may be too large for or incompatible with ClassStash upload scripts. You can convert your file to one of the acceptable file types.</li>
				</ul>
				<h4 style="margin-top: 6rem;">For important issues or questions contact this number - <strong>(916) - 812 - 3070</strong></h4>
			</div>
			<div style="float: right; padding-right: 2rem; margin-right: 3rem;">
			<h2>Report an issue. Or ask a question.</h2>
			<form method="post" action="includes/report.php" enctype="multipart/form-data">
				<input name="name" placeholder="Name" style="width: 90%; font-size: 20px">
				<textarea name="descrip" placeholder="Description" style="border-style: solid; resize: none; border-radius: 0; margin-top: 1rem; width: 90%;" rows="5"></textarea>
				<button type="submit" style="margin-top: 1rem; width: 98%;" class="button button-block">Send</button>
			</form>
			<?php
				if ($_GET['success'] == 'true') {
					 echo '<h3 style="color: green;">Successfully sent.</h3>';
				} elseif ($_GET['error'] == '1') {
					 echo '<h3 style="color: red;">Error, must submit name and description.</h3>';
				}
			?>
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