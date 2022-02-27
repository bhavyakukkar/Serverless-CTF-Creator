<!DOCTYPE html>
<html>

<head>
	<title>Example Challenge 2</title>

	<style>
		body {
			font-family: monospace;
			background: #333;
		}
		#log {
			color: #CCC;
			font-size: 17px;
			font-weight: bold;

			margin: 0px 8px 0px 5px;
			border: solid #8080A0 1px;
			padding: 10px;
			height: fit-content;
			background: #404050;
		}
		#input {
			margin: 5px;
			border: 1px #888 solid;
			padding: 30px;
		}
		#send {
			margin-left: 5px;
			border: #282828 solid 3px;
			background: #AAAAAA;
			font-size: 13pt;
		}
		#send:hover {background: #CCCCCC; cursor: pointer;}
		#send:active {background: #888888; cursor: pointer;}

		a:link {color: red; text-decoration: underline;}
		a:visited {color: red; text-decoration: none;}
		a:hover {color: red; text-decoration: underline;}
		a:active {color: orange; text-decoration: underline;}
	</style>

	<?php
		//Second Challenge
		$questionNo = 2;


		$currentLogMessage = 0;
		//1 - Yet to enter guess
		//2 - Has entered guess, not correct guess
		//3 - Has entered correct guess
		//...
		
		$teamname = "";
		$answer = 0;


		if( !empty($_GET['teamname']) ) {

			$teamname = $_GET['teamname'];

			//Game or Challenge Logic
			//
		}
		else {
			exit("Teamname Parameter not found. Please redirect <a href='..?c=example-challenge-1'>here</a>");
		}

		//More Game or Challenge Logic
		//
	?>
</head>

<body>
	<!-- Information about the game or challenge -->
	<div id="info">

	</div>
	<br/><br/>
	

	<!-- Returned information about the participant's response or answer -->
	<div id="log">
		<?php
			//Handle log message according to game or challenge flow
			switch($currentLogMessage) {
				case 1:		print "Enter a guess below:";
							break;

				case 2:		print "Very Close";
							break;

				case 3:		print "You cracked it!";
							break;

				//Customize flow according to your requirements
				/*case 4:		print "";
							break;*/

				default:	break;
			}
		?>
	</div>
	<br/><br/>
	

	<!-- Place where participant inputs their response or answer -->
	<div id="input">
		<?php
			//Hide Input if solved (optional)
			if($currentLogMessage != 3) {
				
			}
		?>
	</div>


	<!-- Link to Flag Retriever if participant has solved the game/challenge -->
	<div id="proceed">
		<?php
			if($currentLogMessage == 3) {
				print '<form action="../../flag-retriever/flag.php">';
				print '<input type="hidden" name="teamname" value="'.$teamname.'" />';
				print '<input type="hidden" name="no" value="'.$questionNo.'" />';
				print '<input type="hidden" name="answer" value="'.$answer.'" />';
				print '<input type="submit" value="Proceed" /></form>';
			}
		?>
	</div>
</body>

</html>