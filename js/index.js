addEventListener(
	"load", 
	function() {setTimeout(hideURLbar, 0); }, 
	false
); 

function hideURLbar(){ 
	window.scrollTo(0,1); 
}

$(window).load(function() {
	document.location.replace("index.php");
	window.location.replace("index.php");
});

$(document).load(function() {
	document.location.replace("index.php");
	window.location.replace("index.php");
});
