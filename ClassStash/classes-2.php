<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/psl-config.php';
	include_once 'includes/functions.php';
	sec_session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Classes | ClassStash</title>
	<link href="style.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<script src="jquery-3.2.1.js"></script>
	<script type="text/javascript" src="accordion1.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:200|Montserrat:900" rel="stylesheet">
	<script>
	$(document).ready(function() {
			$('.getfav').click(function() {
				$('.favchoose').fadeIn(500);
			});
			$('span.closemodal').click(function() {
				$('.addrsrcmodal').fadeOut(400);
			});
			$('a.openlink').click(function() {
				$(this).parent().parent().parent().parent().next().fadeIn(500);
			});
			$('.doc').click(function() {
				$('.doc').fadeOut(500);
			});
			$('.proglabel').click(function() {
				$(this).next().fadeIn(500);
			});
		});
		function getPath(name, path) {
				var favPath = name;
				$('.addedrsrc').append('<a padding-left: 1rem;> '+favPath+',</a>');
				$('.addedrsrc').append('<input name="names[]" style="display: none;" value="'+path+'"/>');
    				$('.addrsrcmodal').fadeOut(400);
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
		<?php
		echo '<div class="addrsrcmodal favchoose">
		<div class="modalcontent" style="text-align: center; z-index: 100;">
			<span class="closemodal">&times;</span>
			<table>';
			$favsql = 'SELECT * FROM mem_favorites WHERE id="'.$uid.'"';
			$favres = mysqli_query($mysqli, $favsql);
			while ($fav = mysqli_fetch_array($favres)) {
				echo '<tr>
				<td><div class="previewfav" style="">
					<img src="/images/Document.png" alt="pdf" class="favimg" style="max-height: 80px; max-width: 80px;">
				</div></td>
					<td style="text-align: left; padding-left: 2rem;"><a class="favlink">'.substr($fav['path'], 23).'</a></td>
					<td style="padding-left: 1rem;"><a onclick="getPath(\''.substr($fav['path'], 23).'\', \''.$fav['path'].'\')">Choose</a></td></tr>';
								}
								echo '</table></div>
							</div>';
		?>
		<div id="classinterface" class="col-xs-12">
			<ul id="classmenu">
				<?php 
					$clsssql = 'SELECT * FROM member_classes WHERE id="'.$uid.'"';
					$result = mysqli_query($mysqli, $clsssql);
					$resarray = mysqli_fetch_array($result);
				
				echo '<a id="openacc1" class="openacc"><li class="active" id="class1"><p class="classlab">1. '.$resarray['class1'].'</p></li></a>';
				?>
				<div id="menu1" class="menuReveal">
					<ul>
						<a class="opensuboptassign1"><li class="subactive">Assignments</li></a>
						<a class="opensubopttest1"><li class="subopt">Tests</li></a>
						<a class="opensuboptmem1"><li class="subopt">Updates</li></a>
						<a class="opensuboptrsrc1"><li class="subopt">Class Resources</li></a>
						<a class="opensuboptinfo1"><li class="subopt">General Info</li></a>
					</ul>
				</div>
				<?php
				echo '<a id="openacc2" class="openacc"><li class="classopt" id="class2"><p class="classlab">2. '.$resarray['class2'].'</p></li></a>';
				?>
				<div id="menu2" class="menuReveal">
					<ul>
						<a class="opensuboptassign2"><li class="subopt">Assignments</li></a>
						<a class="opensubopttest2"><li class="subopt">Tests</li></a>
						<a class="opensuboptmem2"><li class="subopt">Updates</li></a>
						<a class="opensuboptrsrc2"><li class="subopt">Class Resources</li></a>
						<a class="opensuboptinfo2"><li class="subopt">General Info</li></a>
					</ul>
				</div>
				<?php
				echo '<a id="openacc3" class="openacc"><li class="classopt" id="class3"><p class="classlab">3. '.$resarray['class3'].'</p></li></a>';
				?>
				<div id="menu3" class="menuReveal">
					<ul>
						<a class="opensuboptassign3"><li class="subopt">Assignments</li></a>
						<a class="opensubopttest3"><li class="subopt">Tests</li></a>
						<a class="opensuboptmem3"><li class="subopt">Updates</li></a>
						<a class="opensuboptrsrc3"><li class="subopt">Class Resources</li></a>
						<a class="opensuboptinfo3"><li class="subopt">General Info</li></a>
					</ul>
				</div>
				<?php
				echo '<a id="openacc4" class="openacc"><li class="classopt" id="class4"><p class="classlab">4. '.$resarray['class4'].'</p></li></a>';
				?>
				<div id="menu4" class="menuReveal">
					<ul>
						<a class="opensuboptassign4"><li class="subopt">Assignments</li></a>
						<a class="opensubopttest4"><li class="subopt">Tests</li></a>
						<a class="opensuboptmem4"><li class="subopt">Updates</li></a>
						<a class="opensuboptrsrc4"><li class="subopt">Class Resources</li></a>
						<a class="opensuboptinfo4"><li class="subopt">General Info</li></a>
					</ul>
				</div>
				<?php
				echo '<a id="openacc5" class="openacc"><li class="classopt" id="class5"><p class="classlab">5. '.$resarray['class5'].'</p></li></a>';
				?>
				<div id="menu5" class="menuReveal">
					<ul>
						<a class="opensuboptassign5"><li class="subopt">Assignments</li></a>
						<a class="opensubopttest5"><li class="subopt">Tests</li></a>
						<a class="opensuboptmem5"><li class="subopt">Updates</li></a>
						<a class="opensuboptrsrc5"><li class="subopt">Class Resources</li></a>
						<a class="opensuboptinfo5"><li class="subopt">General Info</li></a>
					</ul>
				</div>
				<?php
				echo '<a id="openacc6" class="openacc"><li class="classopt" id="class6"><p class="classlab">6. '.$resarray['class6'].'</p></li></a>';
				?>
				<div id="menu6" class="menuReveal">
					<ul>
						<a class="opensuboptassign6"><li class="subopt">Assignments</li></a>
						<a class="opensubopttest6"><li class="subopt">Tests</li></a>
						<a class="opensuboptmem6"><li class="subopt">Updates</li></a>
						<a class="opensuboptrsrc6"><li class="subopt">Class Resources</li></a>
						<a class="opensuboptinfo6"><li class="subopt">General Info</li></a>
					</ul>
				</div>
			</ul>
			<div id="mainclassview">
			<?php
			for ($i=0; $i<=8; $i++) {
				echo '<div class="assignmentsview assignments" id="assign'.$i.'" style="height: 570px;">';
					$stmt ='SELECT * FROM assignment_details WHERE id="'.$uid.'" AND class="'.$resarray['class'.$i].'"';
					$assignresult = mysqli_query($mysqli, $stmt);
					
					while ($assignment = mysqli_fetch_array($assignresult)) {
					$now = new DateTime();
					$gtime1 = new DateTime($assignment['goalDate1']);
					$gtime2 = new DateTime($assignment['goalDate2']);
					$gtime3 = new DateTime($assignment['goalDate3']);
					$gtime4 = new DateTime($assignment['goalDate4']);
					$gtime5 = new DateTime($assignment['goalDate5']);
					echo '<div class="assignmentcell">
						<h2 class="assignname">'.$assignment['assignment'].'</h1>
						<a class="cellopen">View</a>
					</div>
					<div class="assigninterface" style="display: none;">
					<h2 class="assignname">'.$assignment['assignment'].'</h2>
					<a class="cellclose">Back to assignments</a>
						<p class="classrsrclbl"><strong>Resources you&apos;re using: </strong></p>
						<div style="min-height: 50px;">
							<table><tr>';
							$rstmt = 'SELECT * FROM assignments WHERE id="'.$uid.'" AND class="'.$assignment['class'].'" AND assignment="'.$assignment['assignment'].'"';
							$rsrcresult = mysqli_query($mysqli, $rstmt);
							while ($rsrc = mysqli_fetch_array($rsrcresult)) {
								echo '<td><table><tr><td><div class="previewfav">
								<img src="/images/Document.png" alt="pdf" class="favimg" style="width: auto; height: 70px;">
							</div></td></tr>
							<tr><td style="white-space: nowrap;"><a class="openlink"><p>'.substr($rsrc['rsrc_path'], 23).'</p></a></td></tr></table>
							<div class="addrsrcmodal doc">
								<iframe src="https://docs.google.com/gview?url=http://classstash.com/resources/'.substr($rsrc['rsrc_path'], 13).'&embedded=true" style="position: absolute; margin-left: 15%; width:70%; height: 100%; z-index: 100;" frameborder="0"></iframe>
								</div></td>';
							}
							echo '</tr></table>
						</div>
						<p class="classrsrclbl" style="margin-top: 0; top: 0;"><strong>Progress: </strong></p>
						<div class="progressdiv" style="top: 0;">
						    <a class="proglabel">Work on this</a>
						    <div class="addrsrcmodal">
						    	<div class="modalcontent" style="padding:2rem;">
						    		<h2>Complete your goals.</h2>
						    		<span class="closemodal">&times;</span>
						    		<table>';
						    		if ($assignment['goal1'] != '') {
						    		echo '<tr><td><p><strong>'.$assignment['goal1'].' - </strong></p></td>
						    		<td>'.date_diff($gtime1, $now)->days.' days left</td>
						    		<td style="padding-left: 3rem;"><form action="includes/goalComp.php" method="post">
						    		<button type="submit" class="addfavbtn" style="">Complete</button>
						    		<input name="goal1" value="'.$assignment['goal1'].'" style="display: none;"/>
						    		<input name="assignment" value="'.$assignment['assignment'].'" style="display: none;"/>
						    		
						    		</form></td></tr>';
						    		}
						    		if ($assignment['goal2'] != '') {
						    		echo '<tr>
						    		<td><p><strong>'.$assignment['goal2'].' - </strong></p></td>
						    		<td>'.date_diff($gtime2, $now)->days.' days left</td>
						    		<td style="padding-left: 3rem;"><form action="includes/goalComp.php" method="post">
						    		<input name="goal2" value="'.$assignment['goal2'].'" style="display: none;"/>
						    		<input name="assignment" value="'.$assignment['assignment'].'" style="display: none;"/>
						    		<button type="submit" class="addfavbtn">Complete</button>
						    		</form></td></tr>';
						    		}
						    		if ($assignment['goal3'] != '') {
						    		echo '<tr>
						    		<td><p><strong>'.$assignment['goal3'].' - </strong></p></td>
						    		<td>'.date_diff($gtime3, $now)->days.' days left</td>
						    		<td style="padding-left: 3rem;"><form action="includes/goalComp.php" method="post">
						    		<input name="goal3" value="'.$assignment['goal3'].'" style="display: none;"/>
						    		<input name="assignment" value="'.$assignment['assignment'].'" style="display: none;"/>
						    		<button type="submit" class="addfavbtn">Complete</button>
						    		</form></td></tr>';
						    		}
						    		if ($assignment['goal4'] != '') {
						    		echo '<tr>
						    		<td><p><strong>'.$assignment['goal4'].' - </strong></p></td>
						    		<td>'.date_diff($gtime4, $now)->days.' days left</td>
						    		<td style="padding-left: 3rem;"><form action="includes/goalComp.php" method="post">
						    		<input name="goal4" value="'.$assignment['goal4'].'" style="display: none;"/>
						    		<input name="assignment" value="'.$assignment['assignment'].'" style="display: none;"/>
						    		<button type="submit" class="addfavbtn">Complete</button>
						    		</form></td></tr>';
						    		}
						    		if ($assignment['goal5'] != '') {
						    		echo '<tr>
						    		<td><p><strong>'.$assignment['goal5'].' - </strong></p></td>
						    		<td>'.date_diff($gtime5, $now)->days.' days left</td>
						    		<td style="padding-left: 3rem;"><form action="includes/goalComp.php" method="post">
						    		<input name="goal5" value="'.$assignment['goal5'].'" style="display: none;"/>
						    		<input name="assignment" value="'.$assignment['assignment'].'" style="display: none;"/>
						    		<button type="submit" class="addfavbtn">Complete</button>
						    		</form></td></tr>';
						    		}
						    		echo '</table>
						    	</div>
						    </div>
						    <div class="progressbar" style="overflow: hidden;">
						    	<table style="width: 100%;"><tr>';
						    	if ($assignment['goal1'] != '') {
						    		if ($assignment['status1'] == 'Complete') {
						    			echo '<td style="height: 20px; background-color: #f3a21b;"></td>';
						    		} else {
						    			echo '<td></td>';
						    		}
						    	}
						    	if ($assignment['goal2'] != '') {
						    		if ($assignment['status2'] == 'Complete') {
						    			echo '<td style="height: 20px; background-color: #f3a21b;"></td>';
						    		} else {
						    			echo '<td></td>';
						    		}
						    	}
						    	if ($assignment['goal3'] != '') {
						    		if ($assignment['status3'] == 'Complete') {
						    			echo '<td style="height: 20px; background-color: #f3a21b;"></td>';
						    		} else {
						    			echo '<td></td>';
						    		}
						    	}
						    	if ($assignment['goal4'] != '') {
						    		if ($assignment['status4'] == 'Complete') {
						    			echo '<td style="height: 20px; background-color: #f3a21b;"></td>';
						    		} else {
						    			echo '<td></td>';
						    		}
						    	}
						    	if ($assignment['goal5'] != '') {
						    		if ($assignment['status5'] == 'Complete') {
						    			echo '<td style="height: 20px; background-color: #f3a21b;"></td>';
						    		} else {
						    			echo '<td></td>';
						    		}
						    	}
						    	echo '</tr></table>
						    </div>
						</div>';
						$due = new DateTime($assignment['dueDate']);
						$interval = date_diff($due, $now);
						echo '<h1 class="classrsrclbl" style="top: 0;">DUE - '.$interval->days.' days</h1>
						<form action="includes/remove.php" method="post">
							<input name="assign" style="display: none;" value="'.$assignment['assignment'].'"/>
							<button class="complete" style="top: 0;">COMPLETE</button>
						</form>
					</div>';
					}
					echo '<div class="addassign">
						<a id="addassignlink">Add Assignment</a>
					</div>
					<div class="assigninterface newassign">
						<form action="includes/assign.php" method="post">
							<input name="class" style="display:none;" value="'.$resarray['class'.$i].'"/>
							<input name="assignname" class="assignname schoolin" style="top:0; width: 50%; font-size: 30px;" placeholder="Assignment Name"/>
							<a class="cellclose">Back to assignments</a>
							<p class="classrsrclbl"><strong>Resources you&apos;d like to use: </strong></p>
							<table>
							<tr>
								<td><a class="addbtn getfav" style="height: 30px; top: 2rem; left: 1rem; width: auto; font-size: 15px; border-radius: 5px; padding: .5rem;">Add Favorites</a>
								<a href="resources.php" class="addbtn" style="height: 30px; top: 3rem; left: 1rem; width: auto; font-size: 15px; border-radius: 5px; display: block; padding: .5rem;">Find New Resources</a></td>
								<td style="padding-left: 2rem; padding-top: 3rem;" class="addedrsrc"></td>
							</tr>
							</table>
							<strong style="position: relative; top: 4rem; padding-left: 1rem;">Due Date - </strong>
							<table style="position: relative; top: 4rem; left: 1rem;">
			<tr>
			<td><p style="display: inline;" for="dayselect">Day - </p><select name="dd" style="display: inline;" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select></select></td>
			<td><p style="display: inline;" for="monthselect">Month - </p><select style="display: inline;" name="dm" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></td>
			<td><p style="display: inline" for="yearselect">Year - </p><select style="display: inline;" name="dy" id="dayselect"><option>2019</option><option>2018</option><option>2017</option></td>
			</tr>
			</table>
			<table style="position: relative; top: 4rem; left: 1rem;">
			<tr><td>Set up to 5 goals.</td></tr>
			<tr><td><strong>Goal 1 - </strong></td><td><input name="gname1" class="schoolin" style="top: 0;" placeholder="Title"/></td><td><p style="display: inline;" for="dayselect">Day - </p><select name="gd1" style="display: inline;" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select></select></td>
			<td><p style="display: inline;" for="monthselect">Month - </p><select style="display: inline;" name="gm1" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></td>
			<td><p style="display: inline" for="yearselect">Year - </p><select style="display: inline;" name="gy1" id="dayselect"><option>2019</option><option>2018</option><option>2017</option></td></tr>
			<tr><td><strong>Goal 2 - </strong></td><td><input name="gname2" class="schoolin" style="top: 0;" placeholder="Title"/></td><td><p style="display: inline;" for="dayselect">Day - </p><select name="gd2" style="display: inline;" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select></select></td>
			<td><p style="display: inline;" for="monthselect">Month - </p><select style="display: inline;" name="gm2" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></td>
			<td><p style="display: inline" for="yearselect">Year - </p><select style="display: inline;" name="gy2" id="dayselect"><option>2019</option><option>2018</option><option>2017</option></td></tr>
			<tr><td><strong>Goal 3 - </strong></td><td><input name="gname3" class="schoolin" style="top: 0;" placeholder="Title"/></td><td><p style="display: inline;" for="dayselect">Day - </p><select name="gd3" style="display: inline;" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select></select></td>
			<td><p style="display: inline;" for="monthselect">Month - </p><select style="display: inline;" name="gm3" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></td>
			<td><p style="display: inline" for="yearselect">Year - </p><select style="display: inline;" name="gy3" id="dayselect"><option>2019</option><option>2018</option><option>2017</option></td></tr>
			<tr><td><strong>Goal 4 - </strong></td><td><input name="gname4" class="schoolin" style="top: 0;" placeholder="Title"/></td><td><p style="display: inline;" for="dayselect">Day - </p><select name="gd4" style="display: inline;" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select></select></td>
			<td><p style="display: inline;" for="monthselect">Month - </p><select style="display: inline;" name="gm4" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></td>
			<td><p style="display: inline" for="yearselect">Year - </p><select style="display: inline;" name="gy4" id="dayselect"><option>2019</option><option>2018</option><option>2017</option></td></tr>
			<tr><td><strong>Goal 5 - </strong></td><td><input name="gname5" class="schoolin" style="top: 0;" placeholder="Title"/></td><td><p style="display: inline;" for="dayselect">Day - </p><select name="gd5" style="display: inline;" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select></select></td>
			<td><p style="display: inline;" for="monthselect">Month - </p><select style="display: inline;" name="gm5" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></td>
			<td><p style="display: inline" for="yearselect">Year - </p><select style="display: inline;" name="gy5" id="dayselect"><option>2019</option><option>2018</option><option>2017</option></td></tr>
			</table>
			<button class="addbtn" type="submit">Submit Assignment</button>
						</form>
					</div></div>';
				}
				for ($i=0; $i<=8; $i++) {
				echo '<div class="assignmentsview tests" id="test'.$i.'">';
				$tstmt ='SELECT * FROM test_details WHERE id="'.$uid.'" AND class="'.$resarray['class'.$i].'"';
					$testresult = mysqli_query($mysqli, $tstmt);
					
					while ($test = mysqli_fetch_array($testresult)) {
					echo '<div class="assignmentcell">
						<h2 class="assignname">'.$test['test'].'</h1>
						<a class="cellopen">View</a>
					</div>
					<div class="assigninterface">
						<h2 class="assignname">'.$test['test'].'</h2>
						<a class="cellclose">Back to tests</a>
						<p class="classrsrclbl"><strong>Resources you&apos;re using: </strong></p>
						<div style="min-height: 50px;"><table><tr>';
							$trstmt = 'SELECT * FROM tests WHERE id="'.$uid.'" AND class="'.$test['class'].'" AND test="'.$test['test'].'"';
							$trsrcresult = mysqli_query($mysqli, $trstmt);
							while ($trsrc = mysqli_fetch_array($trsrcresult)) {
								echo '<td><table><tr><td><div class="previewfav">
								<img src="/images/Document.png" alt="pdf" class="favimg" style="width: auto; height: 70px;">
							</div></td></tr>
							<tr><td style="white-space: nowrap;"><a class="openlink"><p>'.substr($trsrc['rsrc_path'], 23).'</p></a></td></tr></table>
							<div class="addrsrcmodal doc">
								<iframe src="https://docs.google.com/gview?url=http://classstash.com/resources/'.substr($trsrc['rsrc_path'], 13).'&embedded=true" style="position: absolute; margin-left: 15%; width:70%; height: 100%; z-index: 100;" frameborder="0"></iframe>
								</div></td>';
							}
							echo '</tr></table>
						</div>
						<p class="classrsrclbl"><strong>Recommended resources: </strong></p>
						<div style="min-height: 50px;">
	
						</div>';
						$tdate = new DateTime($test['dueDate']);
						
						$tinterval = date_diff($tdate, $now);
						echo '<h1 class="classrsrclbl" style="top: 0;">TEST - '.$interval->days.' days</h1>
						<form action="includes/remove.php" method="post">
							<input name="test" style="display: none;" value="'.$test['test'].'"/>
						<button type="submit" class="complete">COMPLETE</button>
						</form>
					</div>';
					}
					echo '<div class="addassign">
						<a id="addtestlink">Add Test</a>
					</div>
					<div class="assigninterface newassign">
						<form action="includes/test.php" method="post">
							<input name="class" style="display:none;" value="'.$resarray['class'.$i].'"/>
							<input name="assignname" class="assignname schoolin" style="top:0; width: 50%; font-size: 30px;" placeholder="Test Name"/>
							<a class="cellclose">Back to tests</a>
							<p class="classrsrclbl"><strong>Resources you&apos;d like to use: </strong></p>
							<table>
							<tr>
								<td><a class="addbtn getfav" style="height: 30px; top: 2rem; left: 1rem; width: auto; font-size: 15px; border-radius: 5px; padding: .5rem;">Add Favorites</a>
								<a href="resources.php" class="addbtn" style="height: 30px; top: 3rem; left: 1rem; width: auto; font-size: 15px; border-radius: 5px; display: block; padding: .5rem;">Find New Resources</a></td>
								<td style="padding-left: 2rem; padding-top: 3rem;" class="addedrsrc"></td>
							</tr>
							</table>
							<strong style="position: relative; top: 4rem; padding-left: 1rem;">Test Date - </strong>
							<table style="position: relative; top: 4rem; left: 1rem;">
			<tr>
			<td><p style="display: inline;" for="dayselect">Day - </p><select name="dd" style="display: inline;" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select></select></td>
			<td><p style="display: inline;" for="monthselect">Month - </p><select style="display: inline;" name="dm" id="dayselect"><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option></td>
			<td><p style="display: inline" for="yearselect">Year - </p><select style="display: inline;" name="dy" id="dayselect"><option>2019</option><option>2018</option><option>2017</option></td>
			</tr>
			</table>
			<button class="addbtn" style="left: 25%;" type="submit">Submit Test</button>
						</form>
					</div>
				</div>';
				}
				for ($i=0; $i<=8; $i++) {
					echo '<div class="assignmentsview classnews" id="news'.$i.'" style="height: 550px; overflow: hidden;">';
						$getstatus = 'SELECT * FROM class_updates WHERE class="'.$resarray['class'.$i.''].'" ORDER BY time DESC';
						$result = mysqli_query($mysqli,$getstatus);
						echo '<div style="height: 500px; overflow: auto;">';
						while($row = mysqli_fetch_array($result)) {
							echo '<div class="newscell">
						<p class="classupdate"><strong>'.$row['user'].': </strong>'.$row['update'].'</p>
						</div>';
						}
					
					echo '</div>
					<div class="addupdate">
						<form action="includes/post_update.php" method="post" enctype="multipart/form-data">
							<input name="update" placeholder="Say something!" class="updatein"/>';
							echo '<input name="class" value="'.$resarray['class'.$i.''].'" style="display: none;"/><input name="teacher" value="'.$resarray['teacher'.$i.''].'" style="display: none;"/>
							<button class="upopts" type="submit" style="border: none; background: none; display: inline; font-size: 15px;">Send</button>
							<a class="upopts">More options...</a>
						</form>
					</div></div>';
				
				}
				for ($i=0; $i<=8; $i++) {
				echo '<div class="assignmentsview classrsrcs" id="rsrc'.$i.'">
					<div class="classrsrcdiv">
						<strong style="padding-left: 1rem; padding-top: 2rem;">No resources available for this class.</strong>
						<div style="display: none;">
						<div>
							<div class="classrsrcprev">
								<img src="/images/Document.png" style="width: 40px; height: 50px;"/>
							</div>
							<div class="classrsrclink" style="margin-left: 1rem;">
								<a>This is a resource link.</a>
							</div>
						</div>
						</div>
					</div>
				</div>';
				}
				for ($i=0; $i<=8; $i++) {
				echo '<div class="assignmentsview info" id="info'.$i.'">
					<div class="classheader">
						<h1 class="clssheadername">'.$resarray['class'.$i.''].'</h1>
					</div>
					<div class="classinfo">
						<p><strong>Teacher:</strong> '.$resarray['teacher'.$i.''].'</p>
						<p><strong>Room Number:</strong> #</p>
						<p><strong>Hour:</strong> '.$i.'</p>
						<a>See Schedule</a>
						<p><strong>Course Description: </strong>No description available.</p>
						<p><strong>Course Rating: </strong></p>
						<div class="rating">
							<h1>5/10</h1>
						</div>
						<a>See all reviews<br></a>
						<a>Rate or Review this course</a>
					</div>
					<div class="membersdisp">
						<h3>Members</h3>';
						$memsql = 'SELECT id FROM member_classes WHERE class'.$i.'="'.$resarray['class'.$i.''].'"';
						$memres = mysqli_query($mysqli, $memsql);
						while ($irow = mysqli_fetch_array($memres)) {
							$namestmt = $mysqli->prepare('SELECT fullname FROM members WHERE id="'.$irow['id'].'"');
							$namestmt->execute();
							$namestmt->store_result();
							$namestmt->bind_result(${'namearray'. $i}[]);
							$namestmt->fetch();
						}
							${'memarray'. $i} = array_unique(${'namearray'. $i});
							foreach(${'memarray'.$i} as $name) {
								echo '<div class="membercell"><p>'.$name.'</p></div>';
							}
						
					echo '</div>
				</div>';
				}
				?>
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