$(document).ready(function() {
	$("a#openacc1").click(function() {
		if ($('li#class1').attr("class") == "classopt") {
			$("#menu1").slideDown();
			$("#class1").attr("class", "active");
		} else {
			$("#menu1").slideUp();
			$("#class1").attr("class", "classopt");
		}
	});
	$("a#openacc2").click(function() {
		if ($('li#class2').attr("class") == "classopt") {
			$("#menu2").slideDown();
			$("#class2").attr("class", "active");
		} else {
			$("#menu2").slideUp();
			$("#class2").attr("class", "classopt");
		}
	});
	$("a#openacc3").click(function() {
		if ($('li#class3').attr("class") == "classopt") {
			$("#menu3").slideDown();
			$("#class3").attr("class", "active");
		} else {
			$("#menu3").slideUp();
			$("#class3").attr("class", "classopt");
		}
	});
	$("a#openacc4").click(function() {
		if ($('li#class4').attr("class") == "classopt") {
			$("#menu4").slideDown();
			$("#class4").attr("class", "active");
		} else {
			$("#menu4").slideUp();
			$("#class4").attr("class", "classopt");
		}
	});
	$("a#openacc5").click(function() {
		if ($('li#class5').attr("class") == "classopt") {
			$("#menu5").slideDown();
			$("#class5").attr("class", "active");
		} else {
			$("#menu5").slideUp();
			$("#class5").attr("class", "classopt");
		}
	});
	$("a#openacc6").click(function() {
		if ($('li#class6').attr("class") == "classopt") {
			$("#menu6").slideDown();
			$("#class6").attr("class", "active");
		} else {
			$("#menu6").slideUp();
			$("#class6").attr("class", "classopt");
		}
	});
	$('.cellopen').click(function() {
			$(this).parent().next().next().slideDown();
			$('.assignmentcell').hide();
			$('.addassign').hide();
	});
	$('.cellclose').click(function() {
			$(this).parent().slideUp();
			$('.assignmentcell').slideDown();
			$('.addassign').slideDown();
	});
	$('.opensubopttest').click(function() {
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.tests').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign').click(function() {
		$('.tests').hide(500);
		$('.assignments').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem').click(function() {
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('.classnews').show(500);
	});
	$('.opensuboptrsrc').click(function() {
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('.classrsrcs').show(500);
	});
	$('.opensuboptinfo').click(function() {
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.info').show(500);
	});
});