$(window).load(function() {
	$("#btn_password").click(function(){
		if(isEmail($("#emailInput").val())){
			var email = $("#emailInput").val();
			var str = "email=" + email + "&task=pw";

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "PHP/update_user.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send(str);
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState === 4 && xmlhttp.status==404){
                    console.log(xmlhttp.responseText);
                }else{
                	console.log(xmlhttp.responseText);
                }
            };
		}
		alert("Sent");
	});
});

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}