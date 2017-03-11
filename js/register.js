$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});
});

$(window).ready(function(){
    $("#add_account").click(function(){
    	var valid_data = true;

    	//STEP 1: check policy
    	if($("#check_policy").prop("checked")){
    		$("#check_policy").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
    	}else{
    		valid_data = false;
    		$("#check_policy").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
    	}

    	//STEP 2: check data
    	if(valid_data){
    		if($("#username").val() == "" || $("#username").val().length < 8){
    			valid_data = false;
	    		$("#username").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
    		}else{
	    		$("#username").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
    		}
            if( $("#password").val().length >= 8 &&
             $("#re_password").val().length >= 8 &&
             $("#password").val() == $("#re_password").val()){
                $("#password").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
                $("#re_password").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
            }else{
                valid_data = false;
                if($("#password").val().length < 8)
                    $("#password").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
                if($("#re_password").val().length < 8)
                    $("#re_password").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
                if($("#password").val() != $("#re_password").val()){
                    valid_data = false;
                    $("#password").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
                    $("#re_password").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
                }
            }
            if($("#email").val() == "" || $("#email").val().length < 8){
                valid_data = false;
                $("#email").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
            }else{
                $("#email").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
            }
            if($("#phone").val() == "" || $("#phone").val().length < 8){
                valid_data = false;
                $("#phone").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
            }else{
                $("#phone").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
            }
            //STEP 3: pass value if valid
            if(valid_data){
                var xmlhttp = new XMLHttpRequest();
                var str = "username=" + $("#username").val() +"&";
                    str+= "password=" + $("#password").val() +"&";
                    str+= "f_name=" + $("#f_name").val() +"&";
                    str+= "l_name=" + $("#l_name").val() +"&";
                    str+= "sex=" + $('input[name=sex]:checked').val() +"&";
                    str+= "email=" + $('#email').val() +"&";
                    str+= "phone=" + $('#phone').val();
                console.log(str);

                xmlhttp.open("POST", "PHP/add_user.php", true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send(str);
                xmlhttp.onreadystatechange = function() {
                    if(xmlhttp.readyState === 4 && xmlhttp.status==200){
                        console.log(xmlhttp.responseText);
                        alert("Register Successed");
                    }
                };
            }
    	}
    });
});
