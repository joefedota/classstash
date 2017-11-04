$(document).ready(function() {
	$('#addrsrcbtn').click(function() {
		$('.addrsrcmodal').fadeIn(400);
	});
	$('span.closemodal').click(function() {
		$('.addrsrcmodal').fadeOut(400);
	});
	$('#submitrsrcbtn').click(function() {
		$('.addrsrcmodal').fadeOut(400);
	});
	$('#btn4').click(function() {
		$('#linkin').show();
		$('#rsrcup').hide();
	});
	$('#btn1').click(function() {
		$('#linkin').hide();
		$('#rsrcup').show();
	});
	$('#btn2').click(function() {
		$('#linkin').hide();
		$('#rsrcup').show();
	});
	$('#btn3').click(function() {
		$('#linkin').hide();
		$('#rsrcup').show();
	});
});