addEventListener(
	"load", 
	function() {setTimeout(hideURLbar, 0); }, 
	false
); 

function hideURLbar(){ 
	window.scrollTo(0,1); 
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(window).load(function() {
	$('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	});

	$('#ref_link').val(window.location.href);

    var xmlhttp = new XMLHttpRequest();
    var shoes_id = "shoes_id=" + getUrlParameter('shoes_id');
    var sex = "sex="+ getUrlParameter('sex');
    var task = "task=single";
    xmlhttp.open("GET", "PHP/search_shoes.php?"+shoes_id+"&"+sex+"&"+task, true);
    //xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
    //console.log("PHP/search_shoes.php?"+shoes_id+"&"+sex+"&"+task);
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status==200){
            console.log(xmlhttp.responseText);
            var response = $.parseJSON(xmlhttp.responseText);
            console.log(response);

            $shoes_name = response[0]["shoes_name"];
            $sex = response[0]["sex"];
            $category = response[0]["category"];
            $price = response[0]["price"];

            $("#shoes_name").text($shoes_name);
            $("#sex_and_category").text($sex+"'s " + $category + " shoes");
            $("#price").text("$ "+$price);
            //$("#f_name").val(response[0]["f_name"]);
            //$("#l_name").val(response[0]["l_name"]);
            //$('input:radio[name=sex]').filter('[value='+  response[0]["sex"] +']').prop('checked', true);
            //$("#phone").val(response[0]["phone"]);
            //$("#email").val(response[0]["email"]);
            //$('input:radio[name=job_type]').filter('[value='+  response[0]["type"] +']').prop('checked', true);
            //$('input:radio[name=work_type]').filter('[value='+  response[0]["work_type"] +']').prop('checked', true);
        }
    };

	//load web icon
	//$('head').append('<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">" />');
	//$('head').append('<link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">" />');
	//$('head').append('<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">" />');

});
