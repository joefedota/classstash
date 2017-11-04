<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/psl-config.php';
	include_once 'includes/functions.php';
	
	sec_session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Search | ClassStash</title>
		<link href="style.css" type="text/css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Catamaran:200|Montserrat:900" rel="stylesheet">
		<script src="jquery-3.2.1.js"></script>
		<script>
		$(document).ready(function() {
			$('.viewdoc').click(function() {
				$(this).next().fadeIn(500);
			});
			$('.addrsrcmodal').click(function() {
				$('.addrsrcmodal').fadeOut(500);
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

			<div style="width: 80%; position: relative; left: 1rem; top: 1rem;">
				<form action="includes/process-search.php" method="post">
					<input name="search" placeholder="Search our stash..." class="searchbar"/>
					<button type="submit" class="srchbtn">GO</button>
				</form>
			</div>
			<?php
				$sql = 'SELECT * FROM resources WHERE title LIKE "%'.$_GET['search'].'%" OR description LIKE "%'.$_GET['search'].'%"';
				$result = mysqli_query($mysqli,$sql);
				$num_rows = mysqli_num_rows($result);
				echo "<h2 style='position: relative; top: 1rem; left: 1rem;'>Results: ".$num_rows."</h2>";
				if ($num_rows == 0) {
					echo '<h2 style="margin-left: 1rem;">Try broadening your search. Or browse the all of our files below.</h2>';
				}
				if ($_GET['update'] == 'success') {
					echo '<h2 style="margin-left: 1rem; color: green;">Item added to favorites.</h2>';
				} elseif ($_GET['update'] == 'failed') {
					echo '<h2 style="margin-left: 1rem; color: red;">Item already in favorites.</h2>';
				}
				
			?>
			<div  style="position: relative; top: 2rem; left: 1rem;">
				<table>
					<?php	
						if ($num_rows == 0) {
							$emsql = 'SELECT * FROM resources';
							$emresult = mysqli_query($mysqli,$emsql);
							while($row = mysqli_fetch_array($emresult)) {
								echo'<tr><td>';
								if ($row['type'] == 'Document'){
									echo '<img src="images/Document.png" alt="pdf" style="height: 110px; width: 80px;">';
								}
								echo'</td>
								<td style="padding-left: 1rem;">
								<p><strong>Title: </strong>'.$row['title'].'</p>
								<a class="viewdoc"><p><strong>Link: </strong><u style="color: #f3a21b;">'.substr($row['rsrc_path'], 23).'</u></p></a>
								<div class="addrsrcmodal">
										<iframe src="https://docs.google.com/gview?url=http://classstash.com/resources/'.substr($row['rsrc_path'], 13).'&embedded=true" style="position: absolute; margin-left: 15%; width:70%; height: 100%; z-index: 100;" frameborder="0"></iframe>
								</div>
								<p><strong>Rating: </strong>'.$row['rating'].'/10</p></td>
								<td style="padding: 1rem; vertical-align: top; position: relative;"><strong>Description: </strong>'.$row['description'].'<form action="includes/fav_upload.php" method="post" enctype="multipart/form-data"><input name="path" value="'.$row['rsrc_path'].'" style="display: none;"/><input name="rating" value="'.$row['rating'].'" style="display: none;"/><input name="descrip" value="'.$row['description'].'" style="display: none;"/><input name="title" value="'.$row['title'].'" style="display: none;"/><input name="search" value="'.$_GET['search'].'" style="display: none;"/><button class="addfavbtn" style="position: absolute; bottom: .5rem; left: 1rem;">Add to Favorites</button></td></tr></form>';
							}
						} else {
						while($row = mysqli_fetch_array($result)) {
								echo'<tr><td>';
								if ($row['type'] == 'Link'){
									echo '<img src="images/link-icon.png" alt="pdf" style="height: 110px; width: 80px;">';
								} else {
									echo '<img src="images/Document.png" alt="pdf" style="height: 110px; width: 80px;">';
								}
								echo'</td>
								<td style="padding-left: 1rem;">
								<p><strong>Title: </strong>'.$row['title'].'</p>';
								if ($row['type'] == 'Link') {
								echo '<a href="'.$row['rsrc_path'].'">';
								} else {
									echo '<a class="viewdoc">';
								}
									echo '<p><strong>Link: </strong><u style="color: #f3a21b;">'.substr($row['rsrc_path'], 23).'</u></p></a>

								<div class="addrsrcmodal">';
								if ($row['type'] == 'Document') {
										echo '<iframe src="https://docs.google.com/gview?url=http://classstash.com/resources/'.substr($row['rsrc_path'], 13).'&embedded=true" style="position: absolute; margin-left: 15%; width:70%; height: 100%; z-index: 100;" frameborder="0"></iframe>';
										} else {
											echo '<img style="display: block; margin: auto; width: 50%; height: auto;" src="'.$row['rsrc_path'].'"/>';
										}
								echo '</div>
								<p><strong>Rating: </strong>'.$row['rating'].'/10</p></td>
								<td style="padding: 1rem; vertical-align: top; position: relative;"><strong>Description: </strong>'.$row['description'].'<form action="includes/fav_upload.php" method="post" enctype="multipart/form-data"><input name="path" value="'.$row['rsrc_path'].'" style="display: none;"/><input name="rating" value="'.$row['rating'].'" style="display: none;"/><input name="descrip" value="'.$row['description'].'" style="display: none;"/><input name="title" value="'.$row['title'].'" style="display: none;"/><input name="search" value="'.$_GET['search'].'" style="display: none;"/><button class="addfavbtn" style="position: absolute; bottom: .5rem; left: 1rem;">Add to Favorites</button></td></tr></form>';
						} 
						}
					?>
				</table>
			</div>
		
		
	</body>
</html>