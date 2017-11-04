function toggle(id, hide1, hide2, hide3, hide4, tabA, tabB, tabC, tabD, tabE) {
    document.getElementById(id).style.display = 'block';
    document.getElementById(hide1).style.display = 'none';
    document.getElementById(hide2).style.display = 'none';
    document.getElementById(hide3).style.display = 'none';
    document.getElementById(hide4).style.display = 'none';
    document.getElementById(tabA).className = "selected";
 	document.getElementById(tabB).className = "dashitem";
 	document.getElementById(tabC).className = "dashitem";
 	document.getElementById(tabD).className = "dashitem";
 	document.getElementById(tabE).className = "dashitem";
}
function viewChange() {
	document.getElementsByClassName("test").className = 'assignment'
	document.getElementsByClassName("assignment").className = 'test'
} 
