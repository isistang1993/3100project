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

    $.view_shoes();
    $.quick_view();
    $.view_rank();

	//load web icon
	//$('head').append('<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">" />');
	//$('head').append('<link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">" />');
	//$('head').append('<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">" />');

    $("#star_1").click(function(){ $.set_rank(1) });
    $("#star_2").click(function(){ $.set_rank(2) });
    $("#star_3").click(function(){ $.set_rank(3) });
    $("#star_4").click(function(){ $.set_rank(4) });
    $("#star_5").click(function(){ $.set_rank(5) });

});

$.set_rank = function(rank_num){
    var xmlhttp = new XMLHttpRequest();
    var rank_num = "rank_num=" + rank_num;
    var shoes_id = "shoes_id=" + getUrlParameter('shoes_id');
    var task = "task=rank";
    var str = rank_num + "&" + task + "&" + shoes_id;
    console.log(str);
    xmlhttp.open("POST", "PHP/add_shoes.php", true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(str);
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status==200){
            if(xmlhttp.responseText=="Added"){
                console.log(xmlhttp.responseText);
                alert("submited");
                $.view_rank();
            }else{
                console.log(xmlhttp.responseText);
                alert("please Login.");
            }
        }
    }
}

$.view_rank = function(){
    var xmlhttp = new XMLHttpRequest();
    var shoes_id = "shoes_id=" + getUrlParameter('shoes_id');
    var task = "task=rank";
    xmlhttp.open("GET", "PHP/search_shoes.php?"+shoes_id+"&"+task, true);
    //xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send();
    //console.log("PHP/search_shoes.php?"+shoes_id+"&"+sex+"&"+task);
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status==200){
            console.log(xmlhttp.responseText);
            var response = $.parseJSON(xmlhttp.responseText);
            console.log(response);
            console.log(response[0]["rank"]+"~");
            var rank_id = ["temp", "#star_1", "#star_2", "#star_3", "#star_4", "#star_5"];
            for(i=0; i<=5; i++){
                if(i!=0 && i<=response[0]["rank"]){
                    $(rank_id[i]).attr("class", "active");
                }
            }
        }
    }
}

$.view_shoes = function(){
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
            //console.log(xmlhttp.responseText);
            var response = $.parseJSON(xmlhttp.responseText);
            //console.log(response);

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
            /*$("#img_1").attr("src", "images/product/"+$shoes_name+"_1.jpg");
            $("#img_2").attr("src", "images/product/"+$shoes_name+"_2.jpg");
            $("#img_3").attr("src", "images/product/"+$shoes_name+"_3.jpg");
            $("#img_4").attr("src", "images/product/"+$shoes_name+"_4.jpg");
            $("#img_thumb_1").attr("data-thumb", "images/product/"+$shoes_name+"_1.jpg");
            $("#img_thumb_2").attr("data-thumb", "images/product/"+$shoes_name+"_2.jpg");
            $("#img_thumb_3").attr("data-thumb", "images/product/"+$shoes_name+"_3.jpg");
            $("#img_thumb_4").attr("data-thumb", "images/product/"+$shoes_name+"_4.jpg");*/
        }
    };
}

$.quick_view = function(){
    var xmlhttp = new XMLHttpRequest();
    var sex = "sex="+ getUrlParameter('sex');
    var task = "task=quick_view";

    xmlhttp.open("GET", "PHP/search_shoes.php?"+sex+"&"+task, true);
    xmlhttp.send();
    //console.log("PHP/search_shoes.php?"+shoes_id+"&"+sex+"&"+task);

    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState === 4 && xmlhttp.status==200){
            //console.log(xmlhttp.responseText);            
            var response = $.parseJSON(xmlhttp.responseText);

            var items_name = ["#quick_view_1", "#quick_view_2", "#quick_view_3"];
            var items_price = ["#view_price_1", "#view_price_2", "#view_price_3"];
            var items_link = ["#quick_view_link1", "#quick_view_link2", "#quick_view_link3"];
            var items_img = ["#quick_view_img_1", "#quick_view_img_2", "#quick_view_img_3"];

            for(i=0; i<items_name.length; i++){
                $(items_name[i]).text(response[i]["name"]);
                $(items_price[i]).text(response[i]["price"]);
                $(items_link[i]).attr("href", "single.php?shoes_id="+response[i]["s_id"]+"&sex="+response[i]["sex"]);
                $(items_img[i]).attr("src", "images/product/"+response[i]["name"]+"_1.jpg");
                //console.log("single.html?shoes_id="+response[i]["s_id"]+"&sex="+response[i]["sex"]);
            }
        }
    }
}