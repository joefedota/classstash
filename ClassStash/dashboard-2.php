<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/psl-config.php';
	include_once 'includes/functions.php';
	sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | ClassStash</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:200|Montserrat:900" rel="stylesheet">
	<script type="text/javascript" src="changedash.js"></script>
	<script src="jquery-3.2.1.js"></script>
	<script type="text/javascript" src="jquery1.js"></script>
	<script>
	$(document).ready(function() {
			$('.viewfav').click(function() {
				$(this).next().fadeIn(500);
			});
			$('.doc').click(function() {
				$('.doc').fadeOut(500);
			});
			$('.rem').click(function() {
				$('#remove').fadeIn(500);
			});
		});
	</script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103778914-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body style="background-color: #e8e8ee;">
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
		<div class="content">
			<div class="addrsrcmodal" id="remove">
			<h1 style="margin: auto;">Remove from favorites?</h1>
			<table>
			<tr>
			<td><button>Yes, remove.</button></td>
			<td><a>Cancel</a></td>
			</tr>
			</table>
			</div>
			<div id="dashboard">
				<div id="toolbar">
				<h1 id="dashlabel" style="font-family: 'Montserrat', sans-serif;">Student Dashboard</h1>
				<div id="menu">
					<ul id="dashlist">
						<a onclick="toggle('updates', 'assign','groups','favorites','school','tab1','tab2','tab3','tab4','tab5')"><li id="tab1" class="selected">What&apos;s New</li></a>
						<a onclick="toggle('assign','groups','favorites','school','updates','tab2','tab1','tab3','tab4','tab5')"><li id="tab2" class="dashitem">Assignments/Tests</li></a>
						<a onclick="toggle('groups','favorites','school','updates','assign','tab3','tab1','tab2','tab4','tab5')"><li id="tab3" class="dashitem">Study Groups</li></a>
						<a onclick="toggle('favorites','school','updates','assign','groups','tab4','tab2','tab3','tab1','tab5')"><li id="tab4" class="dashitem">Favorites</li></a>
						<a onclick="toggle('school','updates','assign','groups','favorites','tab5','tab2','tab3','tab4','tab1')"><li id="tab5" class="dashitem">My School</li></a>
					</ul>
				</div>
			</div>
			<div id="dashcontainer">
				<div id="updates">
					<?php	
						$clssstmt = $mysqli->prepare("SELECT class0, class1, class2, class3, class4, class5, class6, class7, class8, teacher0, teacher1, teacher2, teacher3, teacher4, teacher5, teacher6, teacher7, teacher8 FROM member_classes WHERE id='".$uid."'");
						$clssstmt->execute();
						$clssstmt->store_result();
						$clssstmt->bind_result($class0, $class1, $class2, $class3, $class4, $class5, $class6, $class7, $class8, $teacher0, $teacher1, $teacher2, $teacher3, $teacher4, $teacher5, $teacher6, $teacher7, $teacher8);
						$clssstmt->fetch();
						$upsql = 'SELECT * FROM class_updates WHERE (class="'.$class0.'" AND teacher="'.$teacher0.'") OR (class="'.$class1.'" AND teacher="'.$teacher1.'") OR (class="'.$class2.'" AND teacher="'.$teacher2.'") OR (class="'.$class3.'" AND teacher="'.$teacher3.'") OR (class="'.$class4.'" AND teacher="'.$teacher4.'") OR (class="'.$class5.'" AND teacher="'.$teacher5.'") OR (class="'.$class6.'" AND teacher="'.$teacher6.'") OR (class="'.$class7.'" AND teacher="'.$teacher7.'") OR (class="'.$class8.'" AND teacher="'.$teacher8.'") ORDER BY time DESC';	
						$uresult = mysqli_query($mysqli, $upsql);
						while ($row = mysqli_fetch_array($uresult)) {
						$picstmt = $mysqli->prepare('SELECT PROF_PIC_PATH FROM member_details WHERE id="'.$row['id'].'"');
						$picstmt->execute();
						$picstmt->bind_result($opath);
						$picstmt->store_result();
						$picstmt->fetch();
					echo '<div class="update">
						<table style="padding-top: 1rem; width: 100%">
						<tr>
						<td><div class="previewupdate" style="border-radius: 600px; height: 60px; width: 60px; overflow: hidden;">
							<img src="'.$opath.'" title="other" class="profile" style="height: 60px; width: auto;">
						</div></td>
						<td style="width: 80%; white-space: wrap;">
						<strong>'.$row['user'].'</strong> from <strong>'.$row['class'].'</strong> said: "'.$row['update'].'"</td>
						</tr>
						</table>
					</div>';
					}
					?>
				</div>
				<div id="assign">
				<ul class="dashtabmenu">
					<a id="toggletest"><li class="dashtab" id="assigntab">Assignments</li></a>
					<a id="toggleassign"><li class="dashtab" id="testtab">Tests</li></a>
				</ul>
				<div id="assignwindow">
				<?php
					$astmt = 'SELECT * FROM assignment_details WHERE id="'.$uid.'" ORDER BY dueDate';
					$aresult = mysqli_query($mysqli, $astmt);
					
					while ($a = mysqli_fetch_array($aresult)) {
						echo '<div class="assignment" style="position: relative;">
						<p class="attitle" style="top: 5rem;"><strong>Assignment Title:</strong> '.$a['assignment'].'</p>
						<p class="course" style=""><strong>For Course:</strong> '.$a['class'].'</p>
						<a href="classes.php" style="position: absolute; top: 0; right: 0; width: 300px;"><button class="assignbtn">Check this out</button></a>
					</div>';
					}
					$tstmt = 'SELECT * FROM test_details WHERE id="'.$uid.'" ORDER BY dueDate';
					$tresult = mysqli_query($mysqli, $tstmt);
					while ($t = mysqli_fetch_array($tresult)) {
						echo '<div class="test" style="position: relative;">
						<p class="attitle" style="top: 4rem;"><strong>Test Title:</strong> '.$t['test'].'</p>
						<p class="course" style="margin-bottom: 3rem;"><strong>For Course:</strong> '.$t['class'].'</p>
						<a href="classes.php" style="position: absolute; top: 0; right: 0; width: 300px;"><button class="assignbtn">Check this out</button></a>
					</div>';
					}
				?>
				</div>
				</div>
				<div id="groups">
					<div class="studygroup">
						<h3 class="groupname"></h3>
						<h4 class="groupmembers"><a>In Construction</a></h4>
						<h4 class="gogroup"><a></a></h4>
					</div>
				</div>
				<div id="favorites">
					<?php
						$favsql = 'SELECT * FROM mem_favorites WHERE id="'.$uid.'"';
						$result = mysqli_query($mysqli,$favsql);
						while($row = mysqli_fetch_array($result)) {
							$get = 'SELECT type FROM resources WHERE rsrc_path="'.$row['path'].'"';
							$link = mysqli_query($mysqli, $get);
							$gettype = $mysqli->prepare('SELECT type FROM resources WHERE rsrc_path="'.$row['path'].'"');
							$gettype->execute();
							$gettype->store_result();
							$gettype->bind_result($type);
							$gettype->fetch();
							echo '<div class="fav">
							<div class="previewfav">';
								if ($type == 'Link') {
									echo '<img src="/images/link-icon.png" alt="pdf" class="favimg">';
								} else {
									echo '<img src="/images/Document.png" alt="pdf" class="favimg">';
								}
								
							echo '</div>
							<a class="favlink"><p class="favname">'.substr($row['path'], 23).'</p></a>
							<p class="favtag"><strong>Title:</strong> '.$row['title'].'</p>
							<ul class="favoptions">';
								if ($type == 'Link') {
									echo '<a href="'.$row['path'].'">';
								} else {
									echo '<a class="viewfav">';
								}
								echo '<li class="favopt">View</li></a>
								<div class="addrsrcmodal doc">';
								if ($type == 'Document') {
										echo '<iframe src="https://docs.google.com/gview?url=https://www.classstash.com/resources/'.substr($row['path'], 13).'&embedded=true" style="position: absolute; margin-left: 15%; width:70%; height: 100%; z-index: 100;" frameborder="0"></iframe>';
										} else {
											echo '<img style="display: block; margin: auto; width: 50%; height: auto;" src="'.$row['rsrc_path'].'"/>';
										}
								echo '</div>
								<li class="favopt">Share</li>
								<form style="display: inline;" method="post" action="includes/deletefav.php">
								<input name="id" value="'.$row['id'].'" style="display: none;"/>
								<input name="path" value="'.$row['path'].'" style="display: none;"/>
								<button type="submit" style="border: none; background: none; display: inline; font-size: 15px;"><li class="favopt" id="lastopt">Remove</li></button>
								</form>
							</ul>
						</div>';
						}
					?>
				</div>
				<div id="school">
					<ul class="dashtabmenu">
						<a id="togglesched"><li class="dashtab" id="schedtab">Schedule</li></a>
						<a id="togglenews"><li class="dashtab" id="newstab">School News</li></a>
						<a id="toggleclubs"><li class="dashtab" id="clubtab">Clubs</li></a>
						<a id="togglemap"><li class="dashtab" id="maptab">Map</li></a>
					</ul>
					<div id="schedule">
						<h3>Under Construction</h3>
						<div style="display: none;">
						<div class="scheduleitem">
							<p class="classname"><strong>1. First Course Name</strong></p>
							<p class="teachersched"><strong>Teacher: </strong>Teacher Name</p>
							<p class="schedroom"><strong>Room: </strong>Rm #</p>
							<p class="timeframe"><strong>Time Frame: </strong> 00:00 ~ 00:00</p>
							<p class="moreclass"><a href="#">Go to this class -></a></p>
						</div>
						<div class="scheduleitem">
							<p class="classname"><strong>2. Second Course Name</strong></p>
							<p class="teachersched"><strong>Teacher: </strong>Teacher Name</p>
							<p class="schedroom"><strong>Room: </strong>Rm #</p>
							<p class="timeframe"><strong>Time Frame: </strong> 00:00 ~ 00:00</p>
							<p class="moreclass"><a href="#">Go to this class -></a></p>
						</div>
						</div>
					</div>
					<div id="newswindow">
						<h3 class="articletitle">No News</h3>
						
					</div>
					<div class="clubview">
					<h3>Under Construction</h3>
					<div style="display: none;">
						<h3 class="groupname">Club Title</h3>
						<h4 class="groupmembers"><a>View Members</a></h4>
						<h4 class="gogroup"><a>See More</a></h4>
					</div>
					</div>
					<div id="schoolmap">
					<?php
					if ($school == 'Rio Americano High School') {
						echo '<img id="mapimg" src="images/RioMap8x11.pdf" alt="map">';
					} else {
						echo '<h2>Not yet available</h2>';
					}
					?>
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
			<div style="position: relative; top: 5rem; left: 1rem;">
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
	
	</div>
	
	</div>

</body>

</html>