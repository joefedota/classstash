<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/psl-config.php';
	include_once 'includes/functions.php';
	sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Resources | ClassStash</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:200|Montserrat:900" rel="stylesheet">
	<script src="jquery-3.2.1.js"></script>
	<script type="text/javascript" src="modal.js"></script>
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
	<div class="container">
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
		<div class="content" style="min-height: 800px;">
			<h1 id="rsrcpglabel" style="font-family: Montserrat, sans-serif;">The best way to find academic resources.</h1>
			<div style="width: 80%; position: relative; left: 4rem;">
				<form action="includes/process-search.php" method="post">
					<input name="search" placeholder="Search our stash..." class="searchbar"/>
					<button type="submit" class="srchbtn">GO</button>
				</form>
			</div>
			<div class="bottomrsrc">
				<h1 id="searchlabel">Your classes.</h1>
				<ul id="classsearch">
					<?php
					$clssstmt = $mysqli->prepare("SELECT class0, class1, class2, class3, class4, class5, class6, class7, class8 FROM member_classes WHERE id='".$uid."'");
					$clssstmt->execute();
					$clssstmt->store_result();
					$clssstmt->bind_result($class0, $class1, $class2, $class3, $class4, $class5, $class6, $class7, $class8);
					$clssstmt->fetch();
					if ($class0 != "None" && $class0 != "Select your class") {
						echo '<li class="srchclass">'.$class0.' <button type="submit" class="findrsrc">FIND</button></li>';
					}
					echo '<li class="srchclass">'.$class1.'</li>
					<li class="srchclass">'.$class2.'</li>
					<li class="srchclass">'.$class3.'</li>
					<li class="srchclass">'.$class4.'</li>
					<li class="srchclass">'.$class5.'</li>
					<li class="srchclass">'.$class6.'</li>';
					if ($class7 != "None" && $class7 != "Select your class") {
						echo '<li class="srchclass">'.$class7.' <button type="submit" class="findrsrc">FIND</button></li>';
					}
					if ($class8 != "None" && $class8 != "Select your class") {
						echo '<li class="srchclass">'.$class8.' <button type="submit" class="findrsrc">FIND</button></li>';
					}
					?>
				</ul>
				<div id="addopt">
					<h1 id="addlabel">Help someone out! Add a resource.</h1>
					<button href="#" id="addrsrcbtn">Add Resource</button>
				</div>
				<div class="addrsrcmodal">
					<div class="modalcontent">
						<span class="closemodal">&times;</span>
						<form action="includes/upload_rsrc.php" method="post" enctype="multipart/form-data">
							<input name="rsrcfile" id="rsrcup" type="file" style="position: relative; top: 1rem; left: 2rem;" accept=".gif,.jpeg,.jpg,.docx,.pdf,.mov,.m4v,.avi,.txt,.mpg,.mpeg,.doc,.rtf"/>
							<input name="rsrclink" id="linkin" style="margin: 2rem; width: 60%; display: none;" placeholder="Resource URL"/>
							<div class="infoentry">
								<input type="text" name="title" placeholder="Resource Title" class="upldentry"></input>
								<textarea type="text" name="descrip" placeholder="Add Description" class="uplddescrip" rows="4" cols="60"></textarea>
								<div id="selectdiv">
									<input type="radio" name="upldtype" value="Document" class="typeselect" id="btn1"/>
									<label for="btn1" class="typelabel">Document</label>
									<input type="radio" name="upldtype" value="Video"class="typeselect" id="btn2"/>
									<label for="btn2" class="typelabel">Video</label>
									<input type="radio" name="upldtype" value="Image" class="typeselect" id="btn3"/>
									<label for="btn3" class="typelabel">Image</label>
									<input type="radio" name="upldtype" value="Link" class="typeselect" id="btn4"/>
									<label for="btn4" class="typelabel">Link</label>
								</div>
							</div>
							<button type="submit" id="submitrsrcbtn">Submit Resource</button>
						</form>
					</div>
				</div>
				<div style="clear: both;"></div>
			</div>
		</div>
		<div style="position: relative; top: .5rem; left: 1rem;">
			<table>
				<tr style="width: 100%">
					<td><small>Copyright &copy; 2017 Joe Fedota, All Rights Reserved</small></td>
					<td style="position: relative; left: 35%;"><a href="about.php">About |</a><a href="privacypolicy.htm"> Privacy Policy |</a><a href="terms.html"> Terms & Conditions</a><td>
					<td style="position: absolute; right: 3rem;"><a><img style="height: 40px; width: 40px;" src="/images/fb.png"></a><a style="padding-left: 1rem;"><img style="height: 40px; width: 40px;" src="/images/twit.png"></a><a style="padding-left: 1rem;"><img style="height: 40px; width: 40px;" src="/images/insta.png"></a></td>
				</tr>
			</table>
		</div>
	</div>
	
</body>
</html>