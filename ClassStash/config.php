<?php
include_once 'includes/db_connect.php';
include_once 'includes/psl-config.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Set Up | ClassStash</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:200|Montserrat:900" rel="stylesheet">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="jquery-3.2.1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="config.js"></script>
	<script>
		$(document).ready(function() {
			$('#addschoollink').click(function() {
				$('#schoolmodal').fadeIn(400);
			});
			$('span.closemodal').click(function() {
				$('.addrsrcmodal').fadeOut(400);
			});
			$('#schoolbtn').click(function() {
				var opt = document.createElement('option');
				var optval = $('#schoolin').val();
				opt.value = optval;
				$('#schoolselect').append($('<option>', {
    					value: opt.value,
   					text: opt.value
				}));
				$('.addrsrcmodal').fadeOut(400);
			});
			$('#addclasslink').click(function() {
				$('#classmodal').fadeIn(400);
			});
			$('#classbtn').click(function() {
				var opt = document.createElement('option');
				var topt = document.createElement('option');
				var optval = $('#classin').val();
				var toptval = $('#teacherin').val();
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
				$('.addrsrcmodal').fadeOut(400);
			});
			var url_string = window.location.href;
			var url = new URL(url_string);
			var selschool = url.searchParams.get("school");
			document.getElementById('schoolselect').value = selschool;		
		});
		function getSchool() {
			var school = document.getElementById('schoolselect').value;
			window.location.href= "config.php?school=" + school;		
		}
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
	<div id="headcontainer">
		<figure id="logo">
			<img src="images/classstashlogo.jpeg" alt="Class Stash">
		</figure>
		<ul id="topmenu">
			<li class="menuitem"><a href="">Home</a></li>
			<li class="menuitem"><a href="">Classes</a></li>
			<li class="menuitem"><a href="">Resources</a></li>
			<li class="menuitem"><a href="">Get Help</a></li>
		</ul>
		<p id="profile"><a href="">
			<img src="images/iu.png" title="You" class="profile"></br>
					Log in</a>
		</p>
	</div>
	<div class="content" style="height: 950px;">
	<div class="addrsrcmodal" id="schoolmodal">
		<div class="modalcontent" style="text-align: center; height: 300px; z-index: 100;">
			<span class="closemodal">&times;</span>
			<h1 style="position: relative; font-family: 'Montserrat', sans-serif; top: 4rem;">Enter your school name below...</h1>
			<input type="text" class="schoolin" id="schoolin" placeholder="e.g. Rio Americano High School"/>
			<button class="addbtn" id="schoolbtn">Add School</button>
		</div>
	</div>
	<div class="addrsrcmodal" id="classmodal">
		<div class="modalcontent" style="text-align: center; height: 300px; z-index: 100;">
			<span class="closemodal">&times;</span>
			<h1 style="position: relative; font-family: 'Montserrat', sans-serif; top: 4rem;">Enter you class and teacher below...</h1>
			<table><tr>
			<td style="width: 60%;"><input type="text" class="schoolin" id="classin" placeholder="Class Name"/></td><td style="width: 40%;"><input class="schoolin" id="teacherin" placeholder="Teacher" type="text"/></td>
			</tr></table>
			<button class="addbtn" id="classbtn">Add Class</button>
		</div>
	</div>
	<form action="includes/upload_details.php" method="post" enctype="multipart/form-data">
		<div class="configleft">
			<h1>Account Setup</h1>
			<?php
				if ($_GET['error'] == "1") {
					echo "<p style='font-color: red;'>Please complete all of the set up page.</p>";
				}
			?>
			<strong>Select your school -</strong>
			<select name="school" onchange="getSchool();"; id="schoolselect">
				<?php
				$sql = "SELECT school FROM schools";
				$result = mysqli_query($mysqli,$sql);

				while ($row = mysqli_fetch_array($result)) {
					echo '<option>'.$row['school'].'</option>';
				}
				?>
				<br>
			</select>	
			<a id="addschoollink" style="z-index: 2;"><br>Don&apos;t see your school? Click here to add it.<br></a>
			<div style="position: relative; margin-bottom: 2rem; height: 82px;">
			<label for="profpic"><table>
				<tr>
					<td><a><div style="width: 80px; height: 80px; border-radius: 40px; background-image: url(images/add.png); border: solid 1px; background-position: center -1rem; float: left; overflow: hidden; margin-top: 3rem;" id="cprofdiv"><img id="confprof" style="width: auto; height: 100%;"></div></a></td>
					<td style="padding-left: 1rem; padding-top: 2rem;"><strong>Profile Picture</strong></td>
				</tr>
			</table></label>
			<input id="profpic" name="profpic" type="file" onchange="readURL(this);" accept="image/*" style="opacity: 0; width: 50%; height: 100%; position: absolute; z-index: 1; margin-top: 3rem;"/>
			</div>
			<p class="entrylabel"><strong>Choose your grade - </strong><input name="gradechoice" type="radio" value="9"> 09 <input name="gradechoice" type="radio" value="10"> 10 <input name="gradechoice" type="radio" value="11"> 11 <input name="gradechoice" type="radio" value="12"> 12</p>			
			<p class="entrylabel"><strong>Birthday - </strong></p>
			<table style="margin-top: 5rem;">
			<tr>
			<td><p style="display: inline;" for="dayselect">Day - </p><select name="bd" style="display: inline;" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select></select></td>
			<td><p style="display: inline;" for="monthselect">Month - </p><select style="display: inline;" name="bm" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></td>
			<td><p style="display: inline" for="yearselect">Year - </p><select style="display: inline;" name="by" id="dayselect"><option>2004</option><option>2003</option><option>2002</option><option>2001</option><option>2000</option><option>1999</option><option>1998</option></td>
			</tr>		
			</table>
		
		
			</div>
			<div class="configright">
			<h1>Add your classes here.</h1>
			<div id="pickclassdiv">
				<div class="classchoice" style="background-color: rgba(158, 153, 157, 0.4); height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						0. <select class="classselect" name="class0">
						<?php
						$teachers = array();
						$classes = array();
						$school = $_GET['school'];
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>Select your class</option><option>None</option>';
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
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher0'><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
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
						$teachers1 = array();
						$classes1 = array();
						$school = $_GET['school'];
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>Select your class</option><option>None</option>';
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
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher1'><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
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
				<div class="classchoice" style= "background-color: rgba(158, 153, 157, 0.4); height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style="padding-left: 1rem; padding-right: 1rem;">2. <select class="classselect" name="class2"><?php
						$teachers2 = array();
						$classes2 = array();
						$school = $_GET['school'];
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>Select your class</option><option>None</option>';
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
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher2'><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray2 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}												
						?></select></span></p>
						
					</div>
				</div>
				<div class="classchoice" style= "height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style="padding-left: 1rem; padding-right: 1rem;">3. <select class="classselect" name="class3"><?php
						$teachers3 = array();
						$classes3 = array();
						$school = $_GET['school'];
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>Select your class</option><option>None</option>';
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
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher3'><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray3 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}										
						?></select></span></p>
						
					</div>
				</div>
				<div class="classchoice" style= "background-color: rgba(158, 153, 157, 0.4); height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style="padding-left: 1rem; padding-right: 1rem;">4. <select class="classselect" name="class4"><?php
						$teachers4 = array();
						$classes4 = array();
						$school = $_GET['school'];
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>Select your class</option><option>None</option>';
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
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher4'><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray4 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}											
						?></select></span></p>
						
					</div>
				</div>
				<div class="classchoice" style= "height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style="padding-left: 1rem; padding-right: 1rem;">5. <select class="classselect" name="class5"><?php
						$teachers5 = array();
						$classes5 = array();
						$school = $_GET['school'];
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>Select your class</option><option>None</option>';
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
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher5'><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray5 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}													
						?></select></span></p>
						
					</div>
				</div>
				<div class="classchoice" style= "background-color: rgba(158, 153, 157, 0.4); height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style="padding-left: 1rem; padding-right: 1rem;">6. <select class="classselect" name="class6"><?php
						$teachers6 = array();
						$classes6 = array();
						$school = $_GET['school'];
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>Select your class</option><option>None</option>';
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
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher6'><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
						foreach ($teacherarray6 as $teacher) {
							if ($teacher != "Don't Know" && $teacher != "None"){
								echo '<option>'.$teacher.'</option>';
							}
						}										
						?></select></span></p>
						
					</div>
				</div>
				<div class="classchoice" style="height: 70px;">
					<div style="position: relative; top: 32%;">
						<p style='padding-left: 1rem; padding-right: 1rem;'>
						7. <select class="classselect" name="class7">
						<?php
						$teachers7 = array();
						$classes7 = array();
						$school = $_GET['school'];
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>Select your class</option><option>None</option>';
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
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher7'><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
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
						$teachers8 = array();
						$classes8 = array();
						$school = $_GET['school'];
						$clsssql = "SELECT classes, teacher FROM classes WHERE school='".$school."'";
						$clssresults = mysqli_query($mysqli,$clsssql);
						echo '<option>Select your class</option><option>None</option>';
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
						echo "</select><span style='float: right;'>Teacher: <select class='teacherselect' name='teacher8'><option>None</option><option value='Don&apos;&apos;t Know'>Don&apos;t know</option>";	
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
				<div style="position: relative; top: 1rem; width: 100%" id="addclasslink"><a>Don&apos;t see your class or teacher? Add a new one.</a></div>
			</div>
		</div>
		<button class="configbtn" type="submit">I&apos;m finished setting up.</button>
	</form>
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