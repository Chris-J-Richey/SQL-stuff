<!-- 
	Chris Richey
	ISS414
	4/25/2018
-->
<html>
<head>
	<title>Supercross Fan Page</title>
<style>
.blah {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
}
body{
	background-color: #547d9e;
}
</style>
</head>
<body>

<h1 style='text-align: center;'>Supercross Fan Page</h1>

<!-- use tables to workout formatting -->

<?php
	$link = mysqli_init();

    //conditionals to make sure it connects
    if (!$link) { 
        die('mysqli_init failed'); 
    }
    if (!mysqli_real_connect($link, 'iss414mysql.mysql.database.azure.com', 'chrisrichey1995@iss414mysql', 'Iss414EH826G!', 'chrisrichey1995', 3306)) { 
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error()); 
    }

    $DisplayForm = TRUE;
    //if Submit button was jsut pressed
    if (isset($_POST['Submit'])){
        //sets variables for query
        $Fname = $_POST['FName'];
        $Lname = $_POST['LName'];
        $Email = $_POST['Email'];

        //makes sql string
        $SQLString = "INSERT into USERS (use_fname, use_lname, use_email) VALUES ('" . $Fname . "', '" . $Lname . "', '" . $Email . "');";

        //runs the sql string
        if (!mysqli_query($link, $SQLString)) {
            echo "<p>error";
        }
        $DisplayForm = FALSE;
    }

    //gets all variables from database
    //gets power levels
    $sql = "SELECT * FROM Power";
    $rs = mysqli_query($link, $sql);
    $pow_power = array();
    $c = 0;
    while ($row = mysqli_fetch_assoc($rs)) {
        $pow_power[$c] = $row["pow_power"];
        $c = $c + 1;
    }
    //gets team names
    $sql = "SELECT * FROM Team";
    $rs = mysqli_query($link, $sql);
    $team_name = array();
    for ($c = 0; $c < mysqli_num_rows($rs); $c++){
        //gets variables
        $row = mysqli_fetch_assoc($rs);
        $team_name[$c] = $row["team_name"];
    }
    //gets first set of riders
    $sql1 = "SELECT riders.rid_number, riders.rid_fname, riders.rid_lname, team.team_name, power.pow_power from riders, power, team where riders.pow_code = 1 and team.team_code=riders.team_code and power.pow_code=riders.pow_code order by rid_number ASC;";
    $rs = mysqli_query($link, $sql1);
    $rid_number = array();
    $rid_fname = array();
    $rid_lname = array();
    $rid_team = array();
    $rid_power = array();
    $FirstSet = 0;
    for ($c = 0; $c < mysqli_num_rows($rs); $c++){
        //gets variables
        $row = mysqli_fetch_assoc($rs);
        $rid_number[$c] = $row["rid_number"];
        $rid_fname[$c] = $row["rid_fname"];
        $rid_lname[$c] = $row["rid_lname"];
        $rid_team[$c] = $row["team_name"];
        $rid_power[$c] = $row["pow_power"];
        $FirstSet=$c;
    }
    //gets second set of riders
    $sql2 = "SELECT riders.rid_number, riders.rid_fname, riders.rid_lname, team.team_name, power.pow_power from riders, power, team where riders.pow_code = 2 and team.team_code=riders.team_code and power.pow_code=riders.pow_code order by rid_number ASC";
    $rs2 = mysqli_query($link, $sql2);
    for ($c = $FirstSet; $c < (mysqli_num_rows($rs2)+$FirstSet); $c++){
        //gets variables
        $row = mysqli_fetch_assoc($rs2);
        $rid_number[$c] = $row["rid_number"];
        $rid_fname[$c] = $row["rid_fname"];
        $rid_lname[$c] = $row["rid_lname"];
        $rid_team[$c] = $row["team_name"];
        $rid_power[$c] = $row["pow_power"];
    }

    //builds html
	echo "<table width='100%'>
		<tr>
			<td align='center'>
				<img src='https://www.feldentertainment.com/assets/0/5358/5369/5481/5482/a7e3ae44-b50a-4f13-b8c9-9d16e96c70f4.png?version=5' width='200px' height='240px' align='center'>
			</td>
			<td width='30%'>

				<!-- table with lists describing aspects -->

				<table class='blah' align='center' bgcolor='#cecece' width='300 px'>
					<tr class='blah'>
						<td class='blah'>
							Teams
						</td>
						<td class='blah'>
							Bike Types
						</td>
					</tr>
					<tr class='blah'>
						<td class='blah'>
							<ul>";
	//loops though team names for list
	foreach ($team_name as $key => $value) {
		echo "<li>".$value."</li>";
	}
	echo "
							</ul>
						</td>
						<td class='blah'>
							<ul>";
	//loops through power levels for list
	foreach ($pow_power as $key => $value) {
		echo "<li>".$value."</li>";
	}
	echo "
							</ul>
						</td>
					</tr>
				</table>
			</td>
			<td align='center'>
				<img src='https://www.feldentertainment.com/assets/0/5358/5369/5481/5482/aa9d4503-f21c-4270-96f1-185fd7a168ec.png?version=5' width='200px' height='240px' align='center'>
			</td>
		</tr>
		<tr>
			<td align='center'>
				<img src='https://www.feldentertainment.com/assets/0/5358/5369/5481/5482/fd34efba-e447-4051-b432-9549953b223f.png?version=5' width='200px' height='240px' align='center'>
			</td>
			<td>

				<!-- table with info from data bases -->
				
				<table class='blah' align='center' bgcolor='#cecece' width='600 px'>
					<tr class='blah'>
						<th class='blah'>
							Name
						</th>
						<th class='blah'>
							Number
						</th>
						<th class='blah'>
							Team
						</th>
						<th class='blah'>
							Bike type
						</th>
					</tr>";
	//loops for every rider to display their info
	for ($key = 0; $key < count($rid_number); $key++) {
		echo "
		<tr class='blah'>
			<td class='blah'>" .
				$rid_fname[$key] . " " . $rid_lname[$key] .
			"</td>
			<td class='blah'>" . 
				$rid_number[$key] . 
			"</td>
			<td class='blah'>" . 
				$rid_team[$key] . 
			"</td>
			<td class='blah'>" . 
				$rid_power[$key] . 
			"</td>
		</tr>";
	}
	echo "
				</table>
			</td>
			<td align='center'>
				<img src='https://www.feldentertainment.com/assets/0/5358/5369/5481/5482/eb351c32-1bf1-4cde-89ff-de4d327062c9.png?version=5' width='200px' height='240px' align='center'>
			</td>
		</tr>
		<tr>
			<td>

				<!-- table with links to info pages -->
				
				<table align='center' width='200 px' padding='2px' bgcolor='#5c87aa'>
					<tr>
						<td align='center'>
							data from two webpages:
						</td>
					</tr>
					<tr>
						<td align='center'>
							<a href='http://www.amasupercross.com/entries.aspx?eventId=304&class=1'>450 Riders</a>
						</td>
					</tr>
					<tr>
						<td align='center'>
							<a href='http://www.amasupercross.com/entries.aspx?eventId=304&class=2'>250 Riders</a>
						</td>
					</tr>
				</table>
			</td>
			<td>";
	//if not previously submitted
	if ($DisplayForm) {
		echo "
		<!-- form broken into table for formatting -->
		
		<form action='FanPage.php' method='post'>
		<table>
			<tr>
				<td align='right'>
					First name:
					<input type='text' name='FName'>
				</td>
				<td align='left'>	
					Last name:
					<input type='text' name='LName'>
				</td>
			</tr>
			<tr>
				<td align='right'>
					Email:
					<input type='text' name='Email'>
				</td>
				<td align='center'>
					<input type='submit' name='Submit' value='Submit'>
				</td>
			</tr>
		</table>
		</form>";
	}
	else{
		//if submit was pressed and it worked
		echo "Submitted";
	}
	echo "
			</td>
			<td>
			</td>
		</tr>
	</table>";

	mysqli_close($link);
?>
</body>
</html>
<!--
bye
-->