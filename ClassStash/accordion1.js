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
			$(this).parent().next().slideDown();
			$('.assignmentcell').hide();
			$('.addassign').hide();
	});
	$('.cellclose').click(function() {
			$(this).parent().slideUp();
			$('.assignmentcell').slideDown();
			$('.addassign').slideDown();
	});
	$('a#addassignlink').click(function() {
		$(this).parent().next().slideDown();
		$('.assignmentcell').hide();
		$('.addassign').hide();
	});
	$('a#addtestlink').click(function() {
		$(this).parent().next().slideDown();
		$('.assignmentcell').hide();
		$('.addassign').hide();
	});
	$('.opensubopttest0').click(function() {
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#test0').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign0').click(function() {
		$('.assignments').hide(500);
		$('.tests').hide(500);
		$('#assign0').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem0').click(function() {
		$('.classnews').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('#news3').show(500);
	});
	$('.opensuboptrsrc0').click(function() {
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('#rsrc0').show(500);
	});
	$('.opensuboptinfo0').click(function() {
		$('.info').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#info0').show(500);
	});
	$('.opensubopttest1').click(function() {
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#test1').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign1').click(function() {
		$('.assignments').hide(500);
		$('.tests').hide(500);
		$('#assign1').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem1').click(function() {
		$('.classnews').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('#news1').show(500);
	});
	$('.opensuboptrsrc1').click(function() {
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('#rsrc1').show(500);
	});
	$('.opensuboptinfo1').click(function() {
		$('.info').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#info1').show(500);
	});
	$('.opensubopttest2').click(function() {
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#test2').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign2').click(function() {
		$('.assignments').hide(500);
		$('.tests').hide(500);
		$('#assign2').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem2').click(function() {
		$('.classnews').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('#news2').show(500);
	});
	$('.opensuboptrsrc2').click(function() {
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('#rsrc2').show(500);
	});
	$('.opensuboptinfo2').click(function() {
		$('.info').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#info2').show(500);
	});
	$('.opensubopttest3').click(function() {
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#test3').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign3').click(function() {
		$('.assignments').hide(500);
		$('.tests').hide(500);
		$('#assign3').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem3').click(function() {
		$('.classnews').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('#news3').show(500);
	});
	$('.opensuboptrsrc3').click(function() {
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('#rsrc3').show(500);
	});
	$('.opensuboptinfo3').click(function() {
		$('.info').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#info3').show(500);
	});
	$('.opensubopttest4').click(function() {
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#test4').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign4').click(function() {
		$('.assignments').hide(500);
		$('.tests').hide(500);
		$('#assign4').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem4').click(function() {
		$('.classnews').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('#news4').show(500);
	});
	$('.opensuboptrsrc4').click(function() {
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('#rsrc3').show(500);
	});
	$('.opensuboptinfo4').click(function() {
		$('.info').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#info4').show(500);
	});
	$('.opensubopttest5').click(function() {
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#test5').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign5').click(function() {
		$('.assignments').hide(500);
		$('.tests').hide(500);
		$('#assign5').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem5').click(function() {
		$('.classnews').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('#news5').show(500);
	});
	$('.opensuboptrsrc5').click(function() {
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('#rsrc5').show(500);
	});
	$('.opensuboptinfo5').click(function() {
		$('.info').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#info5').show(500);
	});
	$('.opensubopttest6').click(function() {
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#test6').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign6').click(function() {
		$('.assignments').hide(500);
		$('.tests').hide(500);
		$('#assign6').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem6').click(function() {
		$('.classnews').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('#news6').show(500);
	});
	$('.opensuboptrsrc6').click(function() {
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('#rsrc6').show(500);
	});
	$('.opensuboptinfo6').click(function() {
		$('.info').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#info6').show(500);
	});
	$('.opensubopttest7').click(function() {
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#test7').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign7').click(function() {
		$('.assignments').hide(500);
		$('.tests').hide(500);
		$('#assign7').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem7').click(function() {
		$('.classnews').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('#news7').show(500);
	});
	$('.opensuboptrsrc7').click(function() {
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('#rsrc7').show(500);
	});
	$('.opensuboptinfo7').click(function() {
		$('.info').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#info7').show(500);
	});
	$('.opensubopttest8').click(function() {
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#test8').show(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptassign8').click(function() {
		$('.assignments').hide(500);
		$('.tests').hide(500);
		$('#assign8').show(500);
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.addassign').slideDown();
		$('.info').hide(500);
		$(this).children(".subopt").attr('class', 'subactive');
	});
	$('.opensuboptmem8').click(function() {
		$('.classnews').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.classrsrcs').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.info').hide(500);
		$('#news8').show(500);
	});
	$('.opensuboptrsrc8').click(function() {
		$('.classrsrcs').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.info').hide(500);
		$('#rsrc8').show(500);
	});
	$('.opensuboptinfo8').click(function() {
		$('.info').hide(500);
		$('.subactive').attr('class', 'subopt');
		$(this).children(".subopt").attr('class', 'subactive');
		$('.tests').hide(500);
		$('.assignments').hide(500);
		$('.assigninterface').slideUp();
		$('.assignmentcell').slideDown();
		$('.classnews').hide(500);
		$('.classrsrcs').hide(500);
		$('#info8').show(500);
	});
});