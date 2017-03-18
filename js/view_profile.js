$(window).load(function() {
    //OnLoad Event
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });

    //load web icon
    $('head').append('<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">" />');
    $('head').append('<link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">" />');
    $('head').append('<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">" />');

    var xmlhttp = new XMLHttpRequest();
    var str = "task=profile";
    xmlhttp.open("POST", "PHP/search_user.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(str);
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status==200){
            var response = $.parseJSON(xmlhttp.responseText);
            console.log(xmlhttp.responseText);
            //console.log(response);
            $("#f_name").val(response[0]["f_name"]);
            $("#l_name").val(response[0]["l_name"]);
            $('input:radio[name=sex]').filter('[value='+  response[0]["sex"] +']').prop('checked', true);
            $("#phone").val(response[0]["phone"]);
            $("#email").val(response[0]["email"]);
            $('input:radio[name=job_type]').filter('[value='+  response[0]["type"] +']').prop('checked', true);
            $('input:radio[name=work_type]').filter('[value='+  response[0]["work_type"] +']').prop('checked', true);
        }
    };

    //Click Event
    $("#update_account").click(function(){
        var xmlhttp = new XMLHttpRequest();

        //Step1: check password
        var valid_data = true;
        if($("#c_pw").val() == "" || $("#c_pw").val().length < 8){
            valid_data = false;
            $("#c_pw").css("box-shadow", function(){return "inset 0 0 1px 2px black";});
        }else{
            $("#c_pw").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
        }
        if($("#n_pw").val() != "" || $("#n_repw").val() != ""){
            if(($("#n_pw").val().length < 8) ||
                ($("#n_repw").val().length < 8) ||
                ($("#n_repw").val() != $("#n_pw").val())){
                valid_data = false;
                $('#n_pw').css("box-shadow", function(){return "inset 0 0 1px 2px black";});
                $('#n_repw').css("box-shadow", function(){return "inset 0 0 1px 2px black";});
            }else{
                $("#n_pw").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
                $("#n_repw").css("box-shadow", function(){return "0 0 0px 2px #ffffff";});
            }
        }

        //Step2: check account & password
        if(valid_data){
            var $username = $("#username").val();
            var $password = $("#c_pw").val();
            var str =   "task=verify" + "&" +
                        "username=" + $username + "&" +
                        "password=" + $password;
            //console.log(str);
            xmlhttp.open("POST", "PHP/search_user.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send(str);
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState === 4 && xmlhttp.status==200){
                    if(xmlhttp.responseText == "Verified"){
                        $.update_user();
                        console.log("Account comfirmed");
                    }else{
                        alert("Wrong Password.");
                    }
                }
            };
        }
    });
});

$.update_user = function(){
    var xmlhttp = new XMLHttpRequest();
    var str = "f_name=" + $("#f_name").val() +"&";
        str+= "l_name=" + $("#l_name").val() +"&";
        str+= "sex=" + $('input[name=sex]:checked').val() +"&";
        str+= "work_type=" + $('input[name=work_type]:checked').val() +"&";
        str+= "job_type=" + $('input[name=job_type]:checked').val() +"&";
        str+= "new_password=" + $('#n_pw').val() +"&";
        str+= "email=" + $("#email").val() +"&";
        str+= "phone=" + $('#phone').val();
    //console.log(str);

    xmlhttp.open("POST", "PHP/update_user.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(str);
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status==200){
            console.log(xmlhttp.responseText);
            alert("Update Successed");
        }
    };
}
