<!DOCTYPE html>
<html>
<head>
<title>Flag Retriever</title>
<style>
	body {
		margin: 0px;
		padding: 20px;
		background: #333333;
		color: #DDDDDD;
		font-family: sans-serif;
	}
	td { width: 50%; }
	tr { width: 30%; }
</style>
</head>

<body>
<h1>FLAG RETRIEVER</h1><br />

<form action="flag.php">
	<table>
		<tr>
			<td><p>Team Name:</p></td>
			<td><input type="text" name="teamname" size="40" /></td>
		</tr>
		<tr>
			<td><p>Question ID:</p></td>
			<td><input type="text" name="no" size="40" /></td>
		</tr>
		<tr>
			<td><p>Answer:</p></td>
			<td><input type="text" name="answer" size="40" /></td>
		</tr>
	</table>
	<br /><br />
	<input type="submit" value="Submit"/>
</form>
</body>

</html>