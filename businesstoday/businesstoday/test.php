
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>BusinessToday</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="a.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js "></script>

<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>

function getdata()
{
	 alert("aa");
	 var postData = new Array();
	 postData.push({name: 'latitude', value: '70'});
	 postData.push({name: 'altitude', value: '50'});
	$.ajax(
   	 {
       	 	url : "http://127.0.0.1/surrogate/test.php",
        	type: "POST",
        	data : postData,
        	success:function(data, textStatus, jqXHR) 
        	{
			alert(data);
		}
	});


}



</script>
<body>
	<button onclick="getdata()">dfgdfgdfs</button>
</body>
</html>


