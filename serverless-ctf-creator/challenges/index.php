<!DOCTYPE html>

<?php
	$challenge_url = "";
	$challenge_name = "";

	function evaluateChallengeName() {
		global $challenge_name, $challenge_url;

		switch($challenge_url) {
			case "example-challenge-1":
				$challenge_name = "Example Challenge 1";
				break;

			case "example-challenge-2":
				$challenge_name = "Example Challenge 2";
				break;

			//More cases for all the other challenges
			//case "example-challenge-3":
			//	$challenge_name = "Example Challenge 3";
			//	break;
				
			default:
				exit("Error: Requested challenge does not exist.");
				break;
		}
	}
	
	if(!empty($_GET['c'])) {
		global $challenge_url;
		$challenge_url = $_GET['c'];

		evaluateChallengeName();
	}
	else {
		exit("Error: Challenge Parameter not found.");
	}

?>


<head>
<title>Challenge: <?= $challenge_name ?></title>
<style>
	body {
		margin: 0px;
		/*background-image: url('');*/
		background-size: 100%;
		color: #DDDDDD;
		font-family: sans-serif;
	}
	#main {
		margin: 100px 18% 0% 18%;
		padding: 20px;
		background-color: rgba(40, 40, 40, 0.99);
		box-shadow: 0px 0px 5px #666666;
	}
	#challenge-label {
		font-size: 13px;
		color: #999999;
	}
	#submit {
		border: #282828 solid 6px;
		background: #AAAAAA;
		font-size: 13pt;
		font-weight: 1000;
	}
	#submit:hover {background: #CCCCCC; cursor: pointer;}
	#submit:active {background: #888888; cursor: pointer;}

	h1 { margin: 0px; }
	td { width: 50%; }
	tr { width: 30%; }
</style>
</head>

<body>
<div id="main">
	<p id="challenge-label">Challenge</p>
	<img id="" style="float: right"; />
	<h1><?= $challenge_name ?></h1><br /><br />

	<form action="<?= $challenge_url ?>">
		<table>
			<tr>
				<td><p>Team Name:</p></td>
				<td><input type="text" name="teamname" /></td>
			</tr>
		</table>
		<br /><br /><br /><br /><br /><br />
		<input id="submit" type="submit" value=">>" /><br />
	</form>
</div>
</body>

</html>
