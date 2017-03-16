$(window).load(function() {
    //OnLoad Event
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "PHP/search_user.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
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
    /*$("#update_account").click(function(){
        var xmlhttp = new XMLHttpRequest();
        var str = "username='" + $("#username").val()+"'";
        //console.log(str);
        xmlhttp.open("POST", "PHP/update_user.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send(str);
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState === 4 && xmlhttp.status==200){
                console.log(xmlhttp.responseText);
                console.log("Updated");
                alert("Updated Successed");
            }
        };
    });*/

});
