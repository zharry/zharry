<?

require_once('/etc/mysql-creds/zharry-mysql.inc.php');

	require '../auth.php';
	requireOPAdmin();

	$user = $ZHM["user"]; 
	$pass = $ZHM["pass"];
	$host = $ZHM["host"];
	$dbname = $ZHM["dbo"]["study"];
	$connection = mysqli_connect($host,$user,$pass,$dbname);
	if (!$connection) {
		die();
	}
	
	$sql = "SELECT TIME, IP, REVERSE_DNS, LOCATION, USERAGENT, COUNTRY, COORDS, ISP FROM LOG";
	$result = $connection->query($sql);

	if ($result->num_rows > 0) {
		$num = 0;
		while($row = $result->fetch_assoc()) {
			$s = "";
			//$s .= "<div id=\"query" . $num . "Status\" style=\"float: left; width: 50px;\" class=\"closed\"> &nbsp </div>";
			$s .= "<div id=\"query" . $num . "\" style=\"float: left; width: calc(100% - 60px);\"";
			$s .= "onMouseOver=\"document.getElementById('logDetails').innerHTML='";
			$s .= "<table border=\\'0\\' style=\\'width: 100%\\'>";
			$s .= "<tr>";
			$s .= "<td>Time Accessed: </td>";
			$s .= "<td>". $row["TIME"]. "</td>";
			$s .= "</tr>";
			$s .= "<tr>";
			$s .= "<td>Reverse DNS: </td>";
			$s .= "<td>". $row["REVERSE_DNS"]. "</td>";
			$s .= "</tr>";
			$s .= "<tr>";
			$s .= "<td>Location: </td>";
			$s .= "<td>". $row["LOCATION"]. "</td>";	
			$s .= "</tr>";
			$s .= "<tr>";
			$s .= "<td>Country: </td>";
			$s .= "<td>". $row["COUNTRY"]. "</td>";
			$s .= "</tr>";
			$s .= "<tr>";
			$s .= "<td>Co-ords: </td>";
			$s .= "<td>". $row["COORDS"]. "</td>";
			$s .= "</tr>";
			$s .= "<tr>";
			$s .= "<td>ISP: </td>";
			$s .= "<td>". $row["ISP"]. "</td>";
			$s .= "</tr>";
			$s .= "<tr>";
			$s .= "<td>UserAgent: </td>";
			$s .= "<td>". $row["USERAGENT"]. "</td>";
			$s .= "</tr>";
			$s .= "</table>";
			//$s .= "'; document.getElementById('query" . $num . "Status').classname = 'open'; \"";
			//$s .=
			$s .= "';\"> &nbsp IP: ". $row["IP"] . "</div>";
			$num++;
			echo $s;
			}
	}
	mysqli_close($connection);
?>
