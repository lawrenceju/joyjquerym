<!DOCTYPE html>
<?
require('../condb.php');
session_start();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>


<body onload="Loading()" id ="body_content">
<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>header</h1>
  </div>
<div data-role="content" >



<ul data-role="listview" id="ul_list">
</ul>

</div>
 
  <div data-role="footer">
    <h1>footer</h1>
  </div>
</div> 




</body>
</html>


<script>

 
function Loading(){
	$.ajax({
		type       : "POST",
		data       : {action:'select'},
		dataType   : "json",
		url        : "ajax.php",
		beforeSend:function(){
                    $('#loadingIMG').show();
                },
                complete:function(){
                    $('#loadingIMG').hide();
                },
		success: function(data){
			if(!data) {
				$("#ul_list").append("<tr><td>"+"no values"+"</td></tr>");
				return;
			}
			var numberdate = data.length;
			for (var i = 0; i < numberdate; i++) {
				$("#ul_list").append("<li><a href='query_list?id="+data[i].COMPANY+"'>"+data[i].COMPANY+"<span class='ui-li-count'>"+data[i].NUM+"</span></a></li>");
			}
			$("#ul_list").listview("refresh");
		}
	})
}

</script>