<br/>
<?php

	$query = $_GET["query"];
	$query = strtolower($query);
	$connection = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER_PROJECT'), getenv('MYSQL_PASS_PROJECT'), "zharry.ca-project-grade9study");
	$sql = mysqli_prepare($connection, "SELECT * FROM SCIENCE_DEF WHERE KEYWORD LIKE ? UNION SELECT * FROM SCIENCE_DEF WHERE KEYWORD LIKE ?");
	$que = "{$query}%";
	$quer = "%{$query}%";
	mysqli_stmt_bind_param($sql, 'ss', $que, $quer);
	mysqli_stmt_execute($sql);
	mysqli_stmt_bind_result($sql, $keyw, $defi);

	echo "<h2>Definition Results:</h2>";
	$nores = TRUE;
	while(mysqli_stmt_fetch($sql)){
		$nores = FALSE;
		if(strlen($query) > 0){
			$str = preg_replace("/($query)/i", '<b>$1</b>', $keyw);
		}
		else{
			$str = $keyw;
		}
		$defi = preg_replace('/\\$\\$_\\((.*?)\\)_\\$\\$/i', '<a href="javascript: document.getElementById(\'definition\').value=\'$1\'; document.getElementById(\'definition\').onkeyup(0); void(0);">$1</a>', $defi);
		echo "<div class=\"panel panel-info\"><div class=\"panel-heading\"><h1 class=\"panel-title\"><strong>{$str}</strong></h2></div><div class=\"panel-body\">{$defi}</div></div>";
	}
	if($nores){
		echo "No results... Try searching again!";
	}
?>
