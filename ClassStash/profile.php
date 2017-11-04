<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/psl-config.php';
	include_once 'includes/functions.php';
	sec_session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>You | ClassStash</title>
		<link type="text/css" href="style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Catamaran:200|Montserrat:900" rel="stylesheet">
		<script src="jquery-3.2.1.js"></script>
		<script src="config.js"></script>
		<script>
		$(document).ready(function() {
			$('#editdetails').click(function() {
				$('#detailsmodal').fadeIn(400);
			});
			$('span.closemodal').click(function() {
				$('.addrsrcmodal').fadeOut(400);
			});
			$('#editclass').click(function() {
				$('#classupdate').fadeIn(400);
			});
			$('#classedit').click(function() {
				$('#classupdate').fadeIn(400);
				$('#detailsmodal').fadeOut(400);
			});
			$('#clssmodbtn').click(function() {
				$('#addclassmodal').fadeIn(400);
				$('#classupdate').hide();
			});
			$('#classaddbtn').click(function() {
				var opt = document.createElement('option');
				var topt = document.createElement('option');
				var optval = $('#classadd').val();
				var toptval = $('#teacheradd').val();
				opt.value = optval;
				topt.value = toptval;
				if (optval.length != 0) {
					$('.classselect').append($('<option>', {
    						value: opt.value,
   						text: opt.value
					}));
				}
				if (toptval.length != 0) {
					$('.teacherselect').append($('<option>', {
    						value: topt.value,
   						text: topt.value
					}));
				}
				$('#addclassmodal').fadeOut(400);
				$('#classupdate').show();
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
	<body>
		<div class="container">
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
				</p>
			</div>
		<div class="content" style="">
			<div class="addrsrcmodal" id="addclassmodal">
				<div class="modalcontent" style="text-align: center; height: 300px; z-index: 100;">
					<span class="closemodal">&times;</span>
					<h1 style="position: relative; font-family: 'Montserrat', sans-serif; top: 4rem;">Enter your class and teacher below...</h1>
					<table><tr>
					<td style="width: 60%;"><input type="text" class="schoolin" id="classadd" placeholder="Class Name"/></td><td style="width: 40%;"><input class="schoolin" id="teacheradd" placeholder="Teacher" type="text"/></td>
					</tr></table>
					<button class="addbtn" id="classaddbtn">Add Class</button>
			</div>
	</div>
			<div class="addrsrcmodal" id="detailsmodal">
				<div class="detailcontent">
					<span class="closemodal">&times;</span>
					<button class="addfavbtn" id="classedit" style="position: absolute; bottom: 3rem; right: .5rem;">Edit Classes</button>
					<div style="width: 100%; text-align: center;">
						<h1 style="font-family: 'Montserrat', sans-serif; padding-top: 2rem;">Edit Profile</h1>
						<form action="includes/update_details.php" method="post" enctype="multipart/form-data">
						<table>
						<tr>
							<td><label for="profpic" style="position: relative; "><table>
				<tr>
					<td><a>
					<?php
					
					echo '<div style="width: 80px; height: 80px; border-radius: 40px; background-image: url('.$path.'); border: solid 1px; background-size: auto 100%; overflow: hidden;" id="cprofdiv"><img id="confprof" style="width: auto; height: 100%;"></div>';
					?>
					</a></td>
					<td style="padding-left: 1rem; padding-top: 2rem;"><strong>Change Profile Picture</strong></td>
					
				</tr>
			</table></label>
			<input id="profpic" name="profpic" type="file" onchange="readURL(this);" accept="image/*" style="opacity: 0; width: 50%; height: 100%; z-index: 1; margin-top: 3rem;"/></td></tr><tr><td style="position: relative;"><strong style="display: inline; position: absolute; top: 0; left: 1rem;">Change Name - </strong><input type="text" style="position: absolute; top: 1.5rem; left: 1rem; display: inline;" name="namein" placeholder="Name" class="schoolin"/></td><tr><td style="padding-left: 1rem;"><p class="entrylabel"><strong>Change your grade - </strong><input name="gradechoice" type="radio" value="9"> 09 <input name="gradechoice" type="radio" value="10"> 10 <input name="gradechoice" type="radio" value="11"> 11 <input name="gradechoice" type="radio" value="12"> 12</p></td></tr>
			<tr><td style="position: relative;">
			<p style="position: absolute; left: 1rem; margin-top: 4rem;"><strong>Change School - </strong></p>
			<select name="school" onchange="getSchool();" style="position: absolute; left: 1rem; margin-top: 7rem;">
				<?php
				$sql = "SELECT school FROM schools";
				$result = mysqli_query($mysqli,$sql);

				while ($row = mysqli_fetch_array($result)) {
					echo '<option>'.$row['school'].'</option>';
				}
				?>
				<br>
			</select>
						</td></tr>
						</table>
					</div>
				<button class="addfavbtn" style="position: absolute; bottom: .5rem; right: .5rem;" type="submit">Save Changes</button>
				</form>
				</div>
				
			</div>
			<div style="position: relative; top: 2rem; width: 25%; float: left;">
				<div style="text-align: center;">
					<div class="crop">
						<?php
						if (isset($path)) {
						echo '<img style="height: 150px; width: auto; min-width: 100%;" src="'.$path.'" title="You">';
					} else {
						echo '<img src=images/iu.png title="You">';
					}
						?>	
					</div>
					<?php echo '<h2 style="padding-top: .5rem;"><b>'.$fullname.'</b></h2>
						<p style="color: #a1a1a1">'.$email.'<br></p>' ?>
					<p><b>I am a</b> <?php if ($grade == "12") {
						echo "Senior";
						} elseif($grade == "11") {
							echo "Junior";
						} elseif($grade == "10") {
							echo "Sophomore";
						} else {
							echo "Freshman";
						}
					 	echo "<br></p>";
					 	if ($_GET['update'] == 'success') {
					 		echo "<p style='color: green;'>Profile info changed.</p>";
					 	} elseif ($_GET['update'] == 'failed') {
					 		echo "<p style='color: red;'>No Info Changed";
					 	}
					 ?>
					<a id="editdetails" style="color: #f3a21b;">Edit your profile</a>
					<form action="includes/logout.php">
						<button type="submit" style="position: relative; top: 1rem;">Logout</button>
					</form>
				</div>
			</div>
			<div style="float: right; width: 70%;">
				<div class="profileinfo">
					<h4 style="color: black; padding-left: 1rem; margin-bottom: 0;"><b>Currently Enrolled In</b></h4>
					<?php
						$clssstmt = $mysqli->prepare("SELECT class0, class1, class2, class3, class4, class5, class6, class7, class8, teacher0, teacher1, teacher2, teacher3, teacher4, teacher5, teacher6, teacher7, teacher8 FROM member_classes WHERE id='".$uid."'");
						$clssstmt->execute();
						$clssstmt->store_result();
						$clssstmt->bind_result($class0, $class1, $class2, $class3, $class4, $class5, $class6, $class7, $class8, $teacher0, $teacher1, $teacher2, $teacher3, $teacher4, $teacher5, $teacher6, $teacher7, $teacher8);
						$clssstmt->fetch();
						echo '<table>
						<tr>';	
							if ($class0 != 'None' && $class0 != 'Select your class') {
								echo '<td class="profclss"><b>0.</b> '.$class0.' -</td>
							<td class="profclss teacher">'.$teacher0.'</td>';
							}
							echo '<td class="profclss"><b>1.</b> '.$class1.' -</td>
							<td class="profclss teacher">'.$teacher1.'</td>
							<td class="profclss"><b>2.</b> '.$class2.' -</td>
							<td class="profclss teacher">'.$teacher2.'</td>
							<td class="profclss"><b>3.</b> '.$class3.' -</td>
							<td class="profclss teacher">'.$teacher3.'</td>
						</tr>
						</table>
						<table>
							<tr>	
								<td class="profclss"><b>4.</b> '.$class4.' - </td>
								<td class="profclss teacher">'.$teacher4.'</td>
								<td class="profclss"><b>5.</b> '.$class5.' - </td>
								<td class="profclss teacher">'.$teacher5.'</td>
								<td class="profclss"><b>6.</b> '.$class6.' - </td>
								<td class="profclss teacher">'.$teacher6.'</td>
							</tr>
						</table>';
					?>
					<a id="editclass" style="position: absolute; bottom: 1rem; right: 1rem;">Edit Classes</a>
				</div>
				<div class="addrsrcmodal" id="classupdate">
				<div class="detailcontent" style="height: auto; padding-bottom: 4rem;">
					<span class="closemodal">&times;</span>
					<h2 style="padding-left: 1rem; padding-top: 1rem;">Update Classes</h2>
					<form action="includes/update_details.php" method="post" enctype="multipart/form-data">
					<div class="classchoice" style="background-color: rgba(158, 153, 157, 0.4); height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						0. <select class="classselect" name="class0">
						<?php
						$teachers = array();
						$classes = array();
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>'.$class0.'</option><option>Select your class</option><option>None</option>';
						while ($row = mysqli_fetch_array($clssresults)) {
							$classes[] = $row['classes'];
							$teachers[] = $row['teacher'];
						}
						$classarray = array_unique($classes);
						sort($classarray);	
						$teacherarray = array_unique($teachers);
						sort($teacherarray);
						foreach ($classarray as $class) {
							echo '<option>'.$class.'</option>';
						}
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher0'><option>".$teacher0."</option><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}												
						?>
					</select>
					</span></p>
					</div>
					</div>
					<div class="classchoice" style="height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						1. <select class="classselect" name="class1">
						<?php
						echo '<option>'.$class1.'</option><option>None</option>';
						while ($row = mysqli_fetch_array($clssresults)) {
							$classes1[] = $row['classes'];
							$teachers1[] = $row['teacher'];
						}
						$classarray1 = array_unique($classes);
						sort($classarray1);	
						$teacherarray1 = array_unique($teachers);
						sort($teacherarray1);
						foreach ($classarray1 as $class) {
							echo '<option>'.$class.'</option>';
						}
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher1'><option>".$teacher1."</option><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray1 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}											
						?>
					</select>
					</span></p>
					</div>
					</div>	
					<div class="classchoice" style="background-color: rgba(158, 153, 157, 0.4); height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						2. <select class="classselect" name="class2">
						<?php
						echo '<option>'.$class2.'</option><option>Select your class</option><option>None</option>';
						while ($row = mysqli_fetch_array($clssresults)) {
							$classes2[] = $row['classes'];
							$teachers2[] = $row['teacher'];
						}
						$classarray2 = array_unique($classes);
						sort($classarray2);	
						$teacherarray2 = array_unique($teachers);
						sort($teacherarray2);
						foreach ($classarray2 as $class) {
							echo '<option>'.$class.'</option>';
						}
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher2'><option>".$teacher2."</option><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray2 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}												
						?>
					</select>
					</span></p>
					</div>
					</div>
					<div class="classchoice" style="height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						3. <select class="classselect" name="class3">
						<?php
						echo '<option>'.$class3.'</option><option>None</option>';
						while ($row = mysqli_fetch_array($clssresults)) {
							$classes3[] = $row['classes'];
							$teachers3[] = $row['teacher'];
						}
						$classarray3 = array_unique($classes);
						sort($classarray3);
						$teacherarray3 = array_unique($teachers);
						sort($teacherarray3);
						foreach ($classarray3 as $class) {
							echo '<option>'.$class.'</option>';
						}
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher3'><option>".$teacher3."</option><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray3 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}											
						?>
					</select>
					</span></p>
					</div>
					</div>	
					<div class="classchoice" style="background-color: rgba(158, 153, 157, 0.4); height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						4. <select class="classselect" name="class4">
						<?php
						echo '<option>'.$class4.'</option><option>Select your class</option><option>None</option>';
						while ($row = mysqli_fetch_array($clssresults)) {
							$classes4[] = $row['classes'];
							$teachers4[] = $row['teacher'];
						}
						$classarray4 = array_unique($classes);
						sort($classarray4);	
						$teacherarray4 = array_unique($teachers);
						sort($teacherarray4);
						foreach ($classarray4 as $class) {
							echo '<option>'.$class.'</option>';
						}
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher4'><option>".$teacher4."</option><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray4 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}												
						?>
					</select>
					</span></p>
					</div>
					</div>
					<div class="classchoice" style="height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						5. <select class="classselect" name="class5">
						<?php
						echo '<option>'.$class5.'</option><option>None</option>';
						while ($row = mysqli_fetch_array($clssresults)) {
							$classes5[] = $row['classes'];
							$teachers5[] = $row['teacher'];
						}
						$classarray5 = array_unique($classes);
						sort($classarray5);
						$teacherarray5 = array_unique($teachers);
						sort($teacherarray5);
						foreach ($classarray5 as $class) {
							echo '<option>'.$class.'</option>';
						}
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher5'><option>".$teacher5."</option><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray5 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}											
						?>
					</select>
					</span></p>
					</div>
					</div>	
					<div class="classchoice" style="background-color: rgba(158, 153, 157, 0.4); height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						6. <select class="classselect" name="class6">
						<?php
						echo '<option>'.$class6.'</option><option>Select your class</option><option>None</option>';
						while ($row = mysqli_fetch_array($clssresults)) {
							$classes6[] = $row['classes'];
							$teachers6[] = $row['teacher'];
						}
						$classarray6 = array_unique($classes);
						sort($classarray6);	
						$teacherarray6 = array_unique($teachers);
						sort($teacherarray6);
						foreach ($classarray6 as $class) {
							echo '<option>'.$class.'</option>';
						}
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher6'><option>".$teacher6."</option><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray6 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}												
						?>
					</select>
					</span></p>
					</div>
					</div>
					<div class="classchoice" style="height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						7. <select class="classselect" name="class7">
						<?php
						echo '<option>'.$class7.'</option><option>None</option>';
						while ($row = mysqli_fetch_array($clssresults)) {
							$classes7[] = $row['classes'];
							$teachers7[] = $row['teacher'];
						}
						$classarray7 = array_unique($classes);
						sort($classarray7);
						$teacherarray7 = array_unique($teachers);
						sort($teacherarray7);
						foreach ($classarray7 as $class) {
							echo '<option>'.$class.'</option>';
						}
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher7'><option>".$teacher7."</option><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray7 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}											
						?>
					</select>
					</span></p>
					</div>
					</div>
					<div class="classchoice" style="background-color: rgba(158, 153, 157, 0.4); height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						8. <select class="classselect" name="class8">
						<?php
						echo '<option>'.$class8.'</option><option>Select your class</option><option>None</option>';
						while ($row = mysqli_fetch_array($clssresults)) {
							$classes8[] = $row['classes'];
							$teachers8[] = $row['teacher'];
						}
						$classarray8 = array_unique($classes);
						sort($classarray8);	
						$teacherarray8 = array_unique($teachers);
						sort($teacherarray8);
						foreach ($classarray8 as $class) {
							echo '<option>'.$class.'</option>';
						}
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher8'><option>".$teacher8."</option><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray8 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}												
						?>
					</select>
					</span></p>
					</div>
					</div>					
				<button class="addfavbtn" type="submit" style="position: absolute; bottom: .5rem; right: .5rem;">Update Classes</button>
				</form>
				<button class="addfavbtn" id="clssmodbtn" style="position: absolute; bottom: .5rem; left: .5rem;">Add a New Class</button>
				</div>
			</div>
				<div class="profileinfo" style="position: relative; top: 4rem;">
					<h4 style="color: black; padding-left: 1rem; margin-bottom: 0;"><b>Your Resources</b></h4>
					<table>
					<tr>
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
					echo '<td><table style="overflow: auto; margin-top: 1rem;">
						<tr>
							<td style="padding-left: 1rem;">
							<div style="height: 100px; width: 100px; overflow: hidden;">';
							if ($type == 'Link') {
								echo '<img src="/images/link-icon.png" style="height: 100%; width: auto;">';
							} else {
							
								echo '<img src="/images/Document.png" style="height: 100%; width: auto;">';
							
							}
							echo '</div>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 1rem; white-space: nowrap; text-align: center; max-width: 10rem; overflow: hidden; text-overflow: ellipsis;"><a href="dashboard.php">'.substr($row['path'], 23).'</a></td>
						</tr>
					</table></td>';
					}
					?>
					</tr>
					</table>
				</div>
				<div class="profileinfo" style="position: relative; top: 5rem;">
					<h4 style="color: black; padding-left: 1rem; margin-bottom: 0;"><b>My Clubs & Study Groups</b></h4>
					<p style="padding-left: 1rem;">Under Construction</p>
					<div style="display: none;">
					<table style="overflow: auto; margin-top: 1rem;">
						<tr>
							<td style="padding-left: 1rem;">
							<div style="height: 100px; width: 100px; overflow: hidden;">
								<img src="/images/chem.jpg" style="width: auto; height: 100%;">
							</div>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 1rem;">favdoc.png</td>
						</tr>
					</table>
					</div>
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