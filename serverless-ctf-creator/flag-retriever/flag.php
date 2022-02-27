<!DOCTYPE html>
<html>
<head>
<title>Flag Retriever</title>
<style>
	body {
		margin: 0px;
		/*background-image: url('');*/
		background-size: 100%;
		color: #DDDDDD;
		font-family: sans-serif;
	}
	#main {
		margin: 100px 22% 0% 22%;
		padding: 30px;
		background-color: rgba(40, 40, 50, 0.99);
		box-shadow: 0px 0px 5px #666666;
	}
	#log {
		margin: 0px 8px 0px 5px;
		border: solid #8080A0 1px;
		padding: 5px;
		height: fit-content;
		font-family: monospace;
		background: #404050;
	}
	#flag {
		margin: 0px 10px 0px 0px;
		padding: 20px;
		font-family: monospace;
		font-size: 20px;
		text-align: center;
		background: rgb(0, 0, 0, 0.2);
	}

	h1 { margin: 0px; }

	a:link {color: red; text-decoration: none;}
	a:visited {color: yellow; text-decoration: none;}
	a:hover {color: yellow; text-decoration: underline;}
	a:active {color: orange; text-decoration: underline;}
</style>
</head>

<body>
<div id="main">
<br /><h1>FLAG RETRIEVER</h1><br /><br />

<div id="log">
<?php
$finalFlag = "";


function correctAnswer($teamname, $questionNo) {
	
	switch($questionNo) {
		
		//Challenge 1
		case 1:
			$correctAnswer = verifyChallenge1($teamname);
			break;

		//Challenge 2
		//case 2:
		//	$correctAnswer = verifyChallenge2($teamname);
		//	break;
	}

	return $correctAnswer;
}


function verifyChallenge1($teamname) {
	$correctAnswer = "Correct Answer to Challenge 1";
	return $correctAnswer;
}

/*
function verifyChallenge2($teamname) {
	$correctAnswer = "Correct Answer to Challenge 2";
	return $correctAnswer;
}
*/


function flagCreator($teamname, $answer, $questionNo) {
	$string_in_hash = 'salt-text-1'.$teamname.$answer.$questionNo.'salt-text-2';
	$string_out_hash = hash('md5', $string_in_hash);

	return $string_out_hash;
}


function timeTreat($oldFlag) {
	$time_string = (int) (time());
	$newFlag = hash('md5', $oldFlag.$time_string)."_".$time_string;

	return $newFlag;
}


function timeUntreat($oldFlag) {
	$newFlag = $oldFlag;
	$submittedFlag = substr( $newFlag, 0, strlen($oldFlag) - strlen( (int)(time()) ) - 1 );
	$timeSubmitted = substr( $newFlag, strlen($oldFlag) - strlen( (int)(time()) ), strlen( (int)(time()) ) );
	$out = array($submittedFlag, $timeSubmitted);
	return $out;
}


function handleMismatch(int $questionNo) {
	logMessage("Incorrect Answer!");
}


function logMessage($message) {
	print "> ".$message;
}


if ( !empty($_GET['teamname']) AND !empty($_GET['no']) ) {
	$teamname = $_GET['teamname'];
	$questionNo = $_GET['no'];
	
	if (!empty($_GET['answer'])) {
		
		$answer = $_GET['answer'];

		$flag = flagCreator($teamname, $answer, $questionNo);

		$correctAnswer = correctAnswer($teamname, $questionNo);
		$correctFlag = flagCreator($teamname, $correctAnswer, $questionNo);

		if($correctFlag == $flag) {
			$timeTreatedFlag = timeTreat($flag);
			$finalFlag = $timeTreatedFlag;
			logMessage("Your flag has been created! Please store it with you.");
		}
		else {
			handleMismatch($questionNo);
		}
	}
	else if( !empty($_GET['admin-password']) AND !empty($_GET['admin-flag']) ) {
		$adminPassword = $_GET['admin-password'];
		
		if( $adminPassword == "admin-password" ) {
			$submittedTimeTreatedFlag = $_GET['admin-flag'];
			$submittedFlag = timeUntreat($submittedTimeTreatedFlag)[0];
			$timeSubmitted = timeUntreat($submittedTimeTreatedFlag)[1];
			
			$correctAnswer = correctAnswer($teamname, $questionNo);
			$correctFlag = flagCreator($teamname, $correctAnswer, $questionNo);
			
			print "Submitted Flag: ".$submittedFlag."<br/>Correct Flag: &nbsp;&nbsp;".hash('md5', $correctFlag.$timeSubmitted);
			if( $submittedFlag == hash('md5', $correctFlag.$timeSubmitted) ) {
				print "<br/><br/>All Good!";
				print "<br/><br/>Time Submitted: ".$timeSubmitted;
			}
		}
	}
	else {
		print "Not all parameters found. Please redirect <a href='.'>here</a>";
	}
}
else {
	print "Not all parameters found. Please redirect <a href='.'>here</a>";
}
?>
</div><br /><br /><br />

<div id="flag">
	<?php
		if( empty($_GET['admin-password']) OR empty($_GET['admin-flag']) OR ($_GET['admin-password'] != "admin-password") )
				print $finalFlag;
	?>
</div><br /><br />

</div>
</body>
</html>