$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});

$(window).ready(function(){
    $("#update_account").click(function(){
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
    });
});