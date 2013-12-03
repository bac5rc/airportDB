<?php
	session_start();
	include('connection.php');
	if (!isset($_POST['name'])) {
		$name=$_SESSION['currenttablename'];
	}
	else {
		$name=$_POST['name'];
		$_SESSION['currenttablename']=$name;
	}

	if(!isset($_SESSION['getData'])){
		$_SESSION['getData']=False;
	}
	$query = 'SELECT * FROM '.$name;
	$result = mysql_query($query);
	$line='';

	if (isset($_POST['row'])){
		if($_POST['row'] < 1){
			echo '<br>Invalid row number; please try again</br>';
		}
		else{
			$_SESSION['getData']= True;
			for($x=1; $x<=$_POST['row']; $x++){
				$line = mysql_fetch_array($result);
			}
	
		}
	
	}

	echo '	<h>Enter row number to update (1 = row 1)</h>
		<form action="" method="post"><br>
		RowNumber:<input type="number" name="row"/><br />
		<input type="submit" value="Get Record"/>
		</form>
		<br></br>	
		';
	
	if($_SESSION['getData'] == True){
	
	if($name == 'Admin') {
		if (isset($_POST['uname']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['pword'])){
			$username=$_POST['uname'];
			$firstname=$_POST['fname'];
			$lastname=$_POST['lname'];
			$password=$_POST['pword'];
			mysql_query("UPDATE '$name' SET Username='$username', FirstName='$firstname', LastName='$lastname', Password='$password'");
			echo '<p>Updated Database<p>';
			
		}		
		else{
			$usernamee=$line['Username'];
			$firstnamee=$line['FirstName'];
			$lastnamee=$line['LastName'];
			$passworde=$line['Password'];
			echo '<form action="" method="post">
			Username:<br><input type="text" name="uname" value="'.$usernamee.'" /><br />
			First Name:<br><input type="text" name="fname" value="'.$firstnamee.'" /><br />
			Last Name:<br><input type="text" name="lname" value="'.$lastnamee.'" /><br />	
			Password:<br><input type="text" name="pword" value="'.$passworde.'" /><br />
			<input type="submit" value="Update"/>
			</form>';
		}
	}

	elseif($name == 'Airline') {
		echo "<tr>
		<th>Airline Designator</th>
		<th>Airline Name</th>
		<th>Airline Code</th>
		<th>Terminal</th>
		</tr>";
		while($name = mysql_fetch_array($result)){
			echo '<tr>';
			echo '<td>' . $name['AirlineDesignator'] . '</td>';
			echo '<td>' . $name['AirlineName'] . '</td>';
			echo '<td>' . $name['AirlineCode'] . '</td>';
			echo '<td>' . $name['Terminal'] . '</td>';
			echo '</tr>';
			}
		}

	elseif($name == 'Airplane') {
		echo "<tr>
		<th>Airplane ID</th>
		<th>Airline Designator</th>
		<th>Manufacturer</th>
		<th>Year Issued</th>
		</tr>";
		while($name = mysql_fetch_array($result)){
			echo '<tr>';
			echo '<td>' . $name['AirplaneID'] . '</td>';
			echo '<td>' . $name['AirlineDesignator'] . '</td>';
			echo '<td>' . $name['Manufacturer'] . '</td>';
			echo '<td>' . $name['YearIssued'] . '</td>';
			echo '</tr>';
		}
	}

	elseif($name == 'ArrivingFlight') {
		echo "<tr>
		<th>Flight Number</th>
		<th>Departure Airport Code</th>
		<th>Baggage Carousel</th>
		</tr>";
		while($name = mysql_fetch_array($result)){
			echo '<tr>';
			echo '<td>' . $name['FlightNo'] . '</td>';
			echo '<td>' . $name['DepartureAirportCode'] . '</td>';
			echo '<td>' . $name['BaggageCarousel'] . '</td>';
			echo '</tr>';
			}
		}

elseif($name == 'Baggage') {
echo "<tr>
	<th>Baggage ID</th>
	<th>Baggage Status</th>
	<th>Traveler ID</th>
	<th>Flight Number</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $name['BaggageID'] . '</td>';
		echo '<td>' . $name['BaggageStatus'] . '</td>';
		echo '<td>' . $name['TravelerID'] . '</td>';
		echo '<td>' . $name['FlightNo'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'DepartingFlight') {
echo "<tr>
	<th>Flight Number</th>
	<th>Arrival Airport Code</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $name['FlightNo'] . '</td>';
		echo '<td>' . $name['ArrivalAirportCode'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Employee') {
echo "<tr>
	<th>Employee ID</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Last Name</th>
	<th>Phone Number</th>
	<th>Physical Address</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $name['EmployeeID'] . '</td>';
		echo '<td>' . $name['FirstName'] . '</td>';
		echo '<td>' . $name['MiddleName'] . '</td>';
		echo '<td>' . $name['LastName'] . '</td>';
		echo '<td>' . $name['PhoneNumber'] . '</td>';
		echo '<td>' . $name['PhysicalAddress'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Flight') {
echo "<tr>
	<th>Flight Number</th>
	<th>Date</th>
	<th>Gate Number</th>
	<th>Departure Time</th>
	<th>Airplane ID</th>
	<th>Arrival Time</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $name['FlightNo'] . '</td>';
		echo '<td>' . $name['Date'] . '</td>';
		echo '<td>' . $name['GateNumber'] . '</td>';
		echo '<td>' . $name['DepartureTime'] . '</td>';
		echo '<td>' . $name['AirplaneID'] . '</td>';
		echo '<td>' . $name['ArrivalTime'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Flying') {
echo "<tr>
	<th>Traveler ID</th>
	<th>Flight Number</th>
	<th>Seat Number</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $name['TravelerID'] . '</td>';
		echo '<td>' . $name['FlightNo'] . '</td>';
		echo '<td>' . $name['SeatNo'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Gate') {
echo "<tr>
	<th>Gate Number</th>
	<th>Terminal</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $name['GateNumber'] . '</td>';
		echo '<td>' . $name['Terminal'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Passenger') {
echo "<tr>
	<th>Traveler ID</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Last Name</th>
	<th>Phone Number</th>
	<th>Physical Address</th>
	<th>Email</th>
	<th>Credit Card Number</th>	
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $name['TravelerID'] . '</td>';
		echo '<td>' . $name['FirstName'] . '</td>';
		echo '<td>' . $name['MiddleName'] . '</td>';
		echo '<td>' . $name['LastName'] . '</td>';
		echo '<td>' . $name['PhoneNumber'] . '</td>';
		echo '<td>' . $name['PhysicalAddress'] . '</td>';
		echo '<td>' . $name['Email'] . '</td>';
		echo '<td>' . $name['CreditCardNumber'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Restaurant') {
echo "<tr>
	<th>Name</th>
	<th>Terminal</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $name['Name'] . '</td>';
		echo '<td>' . $name['Terminal'] . '</td>';
		echo '</tr>';
	}
}

elseif($name == 'Shop') {
echo "<tr>
	<th>Name</th>
	<th>Terminal</th>
</tr>";
while($name = mysql_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $name['Name'] . '</td>';
		echo '<td>' . $name['Terminal'] . '</td>';
		echo '</tr>';
	}
}

else {

}

}

	
?>
<input type="submit" value="Back" onclick="location.href='update_table.php';"/>