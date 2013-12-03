<head>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
  </head>
<body style="padding:30px; font-family:'Lato'">  
<h1 style="text-align:center; font-family:'Lato'; font-size:48px;">CHARLOTTESVILLE<br>CITY AIRPORT</h1>

<br>
<br>
<table>
<tr>
<td>
<div  style="padding:0px 0px 0px 140px; width:300px">

<div style="text-align:left;">
<table>

<?php
include('connection.php');
$flight=$_POST['viewflighttype'];
if($flight == 'Arrivals') {
echo "
	<p style="font-family:'Lato'; font-size:30px;">Today's Arrivals</p> 
	<p style="font-family:'Lato'; font-size:15px;"></p>
	<tr>
	<th>Flight No</th>
	<th>Date</th>
	<th>Gate Number</th>
	<th>Departure Time</th>
	<th>Arrival Time</th>
	<th>Departure Airport</th>
	<th>Baggage Carousel</th>
</tr>";
$query = "SELECT FlightNo,GateNumber,DepartureTime,ArrivalTime,DepartureAirportCode,BaggageCarousel FROM `Today's Arrivals`";
$result = mysql_query($query);
while($flight = mysql_fetch_array($result)){
		$no = $flight['FlightNo'];
		$gate = $flight['GateNumber'];
		echo '<tr>';
		echo '<td>' . $no . '</td>';
		echo '<td>' . $flight['Date'] . '</td>';
		echo '<td>' . $gate . '</td>';
		echo '<td>' . $flight['DepartureTime'] . '</td>';
		echo '<td>' . $flight['ArrivalTime'] . '</td>';
		echo '<td>' . $flight['DepartureAirportCode'] . '</td>';
		echo '<td>' . $flight['BaggageCarousel'] . '</td>';
		echo '</tr>';
	}
}
else {
echo "
	<p style="font-family:'Lato'; font-size:30px;">Today's Departures</p> 
	<p style="font-family:'Lato'; font-size:15px;"></p>
	<tr>
	<th>Flight No</th>
	<th>Date</th>
	<th>Gate Number</th>
	<th>Departure Time</th>
	<th>Arrival Time</th>
	<th>Destination Airport</th>
</tr>";
$query = "SELECT FlightNo,GateNumber,DepartureTime,ArrivalTime,ArrivalAirportCode FROM `Today's Departures`";
$result = mysql_query($query);
while($flight = mysql_fetch_array($result)){
		$no = $flight['FlightNo'];
		$gate = $flight['GateNumber'];
		echo '<tr>';
		echo '<td>' . $no . '</td>';
		echo '<td>' . $flight['Date'] . '</td>';
		echo '<td>' . $gate . '</td>';
		echo '<td>' . $flight['DepartureTime'] . '</td>';
		echo '<td>' . $flight['ArrivalTime'] . '</td>';
		echo '<td>' . $flight['ArrivalAirportCode'] . '</td>';
		echo '</tr>';
	}
}

while($flight = mysql_fetch_array($result)){
		$no = $flight['FlightNo'];
		$gate = $flight['GateNumber'];
		echo '<tr>';
		echo '<td>' . $no . '</td>';
		echo '<td>' . $gate . '</td>';
		echo '</tr>';
	}
	
?>
</table>
</div>
</div>
</td>
</tr>
</table>
<br>
<br>
<div style="text-align:center; color:black">
<a href="admin.php" style="color:Black;">Admin Login</a>
</div>
</body>

	
	
</div>
</div>
</td>
<td>
<img src="http://www.thefineyounggentleman.com/wp-content/uploads/2012/10/Airplane.jpg" style="padding:0px 0px 0px 30px; width:700px; vertical-align:text-top;">
</td>
</tr>
</table>
<br>
<br>
<div style="text-align:center; color:black">
<a href="admin.php" style="color:Black;">Admin Login</a>
</div>
</body>
