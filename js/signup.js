$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
  //console.log("hi");
});

$(window).ready(function(){
    $("#submit").click(function(){
      //console.log("hi");
        var valid_data = true;
        if($("#username").val() == "" || $("#username").val().length < 8){
    			valid_data = false;
	    		$("#username").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
    		}else{
	    		$("#username").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
    		}
        if($("#password").val() == "" || $("#password").val().length < 8){
    			valid_data = false;
          $("#password").val("");
	    		$("#password").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
    		}else{
	    		$("#password").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
    		}
        if(valid_data){
            var xmlhttp = new XMLHttpRequest();
            var str ="task=verify" + "&";
                str+="username=" + $("#username").val() +"&";
                str+= "password=" + $("#password").val();
            console.log(str);

            xmlhttp.open("POST", "PHP/search_user.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send(str);
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState === 4 && xmlhttp.status==200){
                  if(xmlhttp.responseText == "Verified"){
                      $.update_session();
                      console.log("Account verified");
                  }else{
                      alert("User does not exist or wrong password.");
                  }
                }
            };
        }
    });
});

$.update_user = function(){
  var xmlhttp = new XMLHttpRequest();
  var str ="task=session" + "&";
      str+="username=" + $("#username").val() +"&";
      str+= "password=" + $("#password").val();

  xmlhttp.open("POST", "PHP/update_user.php", true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send(str);
  xmlhttp.onreadystatechange = function() {
      if(xmlhttp.readyState === 4 && xmlhttp.status==200){
          console.log(xmlhttp.responseText);
      }
  };

}
