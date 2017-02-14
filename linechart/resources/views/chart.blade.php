<!DOCTYPE html>
<html>
<head>
	<title>Line Chart</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    .min{
    	float: left;
    	width: 15px;
    	height: 15px;
    	background-color: red;
    	border-style: solid;
    	border-width: 2px;
    	border-color: black;
    }
    .max{
    	float: left;
    	width: 15px;
    	height: 15px;
    	background-color: blue;
    	border-style: solid;
    	border-width: 2px;
    	border-color: black;
    }
    .av{
    	float: left;
    	width: 15px;
    	height: 15px;
    	background-color: green;
    	border-style: solid;
    	border-width: 2px;
    	border-color: black;
    }
    </style>
    <script type="text/javascript">
	function number()
	{
		document.getElementById("a").innerHTML = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
</script>
</head>
<body onload="number()">
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Line Graph from server </h1>
			<div id="temps_div"></div>
			{!! Lava::render('LineChart', 'server_data', 'temps_div') !!}
		</div>
	</div>
	
</div>
</body>
</html>