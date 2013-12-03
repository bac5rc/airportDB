<?php

$buttons=array('Display', 'Update','Logout');

for ($x=0; $x < count($buttons); $x++){
	if (isset($_POST[$buttons[$x]])){
		if($buttons[$x]== 'Logout'){
			header("Location: admin.php");
		}
		elseif($buttons[$x]== 'Update'){
			header("Location: update_table.php");
		}
		elseif($buttons[$x]== 'Display'){
			header("Location: display_table.php");
		}
		else{
			
		}
	}
}


echo 

'<h1>WELCOME</h1>
<form action="" method="post">
	<input type="submit" name="Display" value="Display" />
</form>

<form action="" method="post">
	<input type="submit" name="Update" value="Update" />
</form>

<form action="" method="post">
	<input type="submit" name="Logout" value="Logout"/>
</form>'

?>