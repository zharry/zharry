<?php

$host = getenv('MYSQL_HOST');
$user = getenv('MYSQL_USER_SKILLS');
$pass = getenv('MYSQL_PASS_SKILLS');
$db = "skills_october-training";

$conn = new PDO('mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8', $user, $pass, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$name = $_POST['name'] ?? null;
$time = $_POST['time'] ?? null;
$score = $_POST['score'] ?? null;

$fetchOnly = $_POST["fetchOnly"] ?? null;

if ($fetchOnly != "fetchOnly") {
	if (empty($name)) {
		echo json_encode(['error' => 'Name field cannot be blank.']);
		return false;
	}

	if (empty($time) && $time != '0') {
		echo json_encode(['error' => 'Time field cannot be blank.']);
		return false;
	}

	if (empty($score) && $score != '0') {
		echo json_encode(['error' => 'Score field cannot be blank.']);
		return false;
	}

	if (!ctype_digit($time)) {
		echo json_encode(['error' => 'Time field must be an integer.']);
		return false;
	}


	if (!is_numeric($score)) {
		echo json_encode(['error' => 'Score field must be an integer.']);
		return false;
	}

	$stmtInsert = $conn->prepare('INSERT INTO ranking (name, time, score) VALUES (?, ?, ?)');
	$stmtInsert->execute([$name, $time, $score]);
}

$stmtSelect = $conn->query('SELECT * FROM ranking');
$ranking = $stmtSelect->fetchAll();
echo json_encode($ranking);