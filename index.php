 <?php
    $baseUrl = 'https://api.opendota.com/api/players/';
	

//-----Initial variable definition-----
	$users = array
	(
		array("DEC1MAL",12142250,"#1008A5"),
		array("AfouToPatisa",32952238,"#0894F5"),
		array("Toxic Joke Plays",103178298,"#03C902"),		//+ zero
		array("John",91426528,"#CA9801"),  			// + 197497174
		array("Blackadder",29750909,"#FE0100") 	// + 91365572
	);

	echo "<img src=/grid.jpg><br>";
	
//---------Main - Results------
    for ($row = 0; $row < 5; $row++) {
	  echo "<p><b><font color='".$users[$row][2]."'>".$users[$row][0].", ID: ".$users[$row][1]."</font></b></p>";
	  echo "<ul>";
		//echo "<li>".$users[$row][$col]."</li>";
		//getWL($row, $users, $baseUrl);
		getCOMBO($row, $users, $baseUrl);
	  echo "</ul>";
	}
//---------Main - Results------/
	
	


//-----API call function DEF-----
    function getCOMBO($row, $users, $baseUrl)  {
		//echo "<li> Games with:";
		$url[0] = $baseUrl.$users[$row][1].'/peers/';
		$response = file_get_contents( $url[0]);	//Get the response JSON from the API
		//print $response;
		$WL_array = json_decode($response,true);		//For example, " Array ( [win] => 2090 [lose] => 1810 ) "
		//for ($row = 0; $row < 5; $row++) {
		//print $WL_array[$users[$row][1]]["account_id"];
		//}
		foreach ($WL_array as $item) {
			for ($row = 0; $row < 5; $row++) {
				if ($item['account_id']== $users[$row][1])
				print "with ".$users[$row][0].":".$item['with_win']." wins out of ".$item['with_games']." games. Winrate: ".number_format((float)($item['with_win'])*100/($item['with_games']), 2, '.', '')."</br>";
			}
		}

	}
//-----End of function DEF-----


		//if ($item['account_id']== "32952238")
		//	print $item['with_win'];

?> 


