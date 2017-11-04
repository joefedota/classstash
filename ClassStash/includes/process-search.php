<?php
	$search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
	header('Location: ../srchlanding.php?search='.$search.'');
	