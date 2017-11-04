$(document).ready(function() {
    $('a#toggleassign').click(function() {
        $(".test").show('slow');
       	$(".assignment").hide();
       	$("#assigntab").css("color", "black")
       	$("#testtab").css("color", "#7d0d00")
    });
    $('a#toggletest').click(function() {
    	$(".test").hide();
       	$(".assignment").show('slow');
       	$("#assigntab").css("color", "#7d0d00")
       	$("#testtab").css("color", "black")
    });
    $('a#togglesched').click(function() {
    	$("#schedule").show('slow');
    	$(".clubview").hide();
    	$("#newswindow").hide();
    	$("#schoolmap").hide();
    	$("#schedtab").css("color", "#7d0d00");
    	$("#newstab").css("color", "black");
    	$("#clubtab").css("color", "black");
    	$("#maptab").css("color", "black");
    });
    $('a#togglenews').click(function() {
    	$("#schedule").hide();
    	$(".clubview").hide();
    	$("#newswindow").show('slow');
    	$("#schoolmap").hide();
    	$("#schedtab").css("color", "black");
    	$("#newstab").css("color", "#7d0d00");
    	$("#clubtab").css("color", "black");
    	$("#maptab").css("color", "black");
    });
    $('a#toggleclubs').click(function() {
    	$(".clubview").show('slow');
    	$("#schedule").hide();
    	$("#newswindow").hide();
    	$("#schoolmap").hide();
    	$("#schedtab").css("color", "black");
    	$("#newstab").css("color", "black");
    	$("#clubtab").css("color", "#7d0d00");
    	$("#maptab").css("color", "black");
	});
	$('a#togglemap').click(function() {
    	$("#schoolmap").show();
    	$(".clubview").hide();
    	$("#schedule").hide();
    	$("#newswindow").hide();
    	$("#schedtab").css("color", "black");
    	$("#newstab").css("color", "black");
    	$("#clubtab").css("color", "black");
    	$("#maptab").css("color", "#7d0d00");
	});
});