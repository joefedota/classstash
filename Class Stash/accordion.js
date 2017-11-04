var parent = document.getElementsByClassName("openacc");
var i;

for(i=0; i < parent.length; i++) {
	parent[i].onclick = function() {
		this.classList.toggle("active");
		var reveal = document.getElementsByClassName("menuReveal")[i];
		if (reveal.style.maxHeight) {
			reveal.style.maxHeight = null;
		} else {
			reveal.style.maxHeight = reveal.scrollHeight + "px";
		}
	}
}

$(document).ready(function() {
	$("a.openacc").click(function() {
			$(".menuReveal").show();
		});
});