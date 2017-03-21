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
            $product_detail = response[0]["p_details"];
            $highlights = response[0]["highlights"];
            $desc = response[0]["desc"];
            $messages = response[0]["terms"];

            $("#shoes_name").text($shoes_name);
            $("#sex_and_category").text($sex+"'s " + $category + " shoes");
            $("#price").text("$ "+$price);
            $("#prod_detail").text($product_detail);
            $("#highlights").text($highlights);
            $("#desc").text($desc);
            $("#messages").text($messages);
            
            //搞唔_店啊!!!
            //$("#img_1").attr("src", "images/product/"+$shoes_name+"_1.jpg");
            //$("#img_2").attr("src", "images/product/"+$shoes_name+"_2.jpg");
            //$("#img_3").attr("src", "images/product/"+$shoes_name+"_3.jpg");
            //$("#img_4").attr("src", "images/product/"+$shoes_name+"_4.jpg");
            //$("#img_thumb_1").attr("data-thumb", "images/product/"+$shoes_name+"_1.jpg");
            //$("#img_thumb_2").attr("data-thumb", "images/product/"+$shoes_name+"_2.jpg");
            //$("#img_thumb_3").attr("data-thumb", "images/product/"+$shoes_name+"_3.jpg");
            //$("#img_thumb_4").attr("data-thumb", "images/product/"+$shoes_name+"_4.jpg");
        }
    };

	//load web icon
	//$('head').append('<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">" />');
	//$('head').append('<link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">" />');
	//$('head').append('<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">" />');

});
