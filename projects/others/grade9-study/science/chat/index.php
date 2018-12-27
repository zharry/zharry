<?php

require '../auth.php';
requireView('SNC1D6-02');

$url = 'https://study-chat.herokuapp.com/auth';
$hash = hash('sha256', $_SESSION['g9s_username'].$_SESSION['g9s_first'].$_SESSION['g9s_last'].$_SESSION['g9s_email'].$_SESSION['g9s_perm'].session_id().'622r5ac4jxpQJagL083BwHy3bQSZVlQhVlnXKE5AzWKqu5zBzLAHys+zDZxbT+OP2StVL/vz+l6xpw7s6MyiNg==');
$data = array('user' => $_SESSION['g9s_username'], 'first' => $_SESSION['g9s_first'], 'last' => $_SESSION['g9s_last'], 'email' => $_SESSION['g9s_email'], 'perm' => $_SESSION['g9s_perm'], 'sessionCookie' => session_id(), 'hash' => $hash);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

?>

<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Chat</title>
		<link rel="stylesheet" href="../../res/bootstrap.min.css"></link>
		<style>
			footer { position: fixed; bottom: 0; width: 100%; padding: 1em; background-color: #F5F5F5; }
			.chatmsg { padding: 0.125em; margin-bottom: 10px; word-wrap: break-word; }
			#main { margin-bottom: 72px; }
/*			#chat:nth-child(odd) { background: #F5F5F5; } */
		</style>
	</head>
	<body>
		<div id="main" class="container">
			<div class="row">
				<div class="col-md-10" id="chat">
					
				</div>
				<div class="col-md-2" id="users">
					
				</div>
			</div>
		</div>

		<footer>
			<div class="container">
				<form class="input-group">
					<input type="text" class="form-control" placeholder="Message..." id="message" autocomplete="off"/>
      				<span class="input-group-btn">
						<button type="submit" class="btn btn-primary">Send</button>
					</span>
				</form>
			</div>
		</footer>

		<script>
			var nananananana = "<?php echo $_SESSION['g9s_username']; ?>";
			var nanananananab = "<?php echo session_id(); ?>";
			var scrollToBottom = true;
		</script>
		<script src="../../res/socket.io-1.3.4.js"></script>
		<script src="../../res/jquery-1.9.1.min.js"></script>
		<script src="../../res/bootstrap.min.js"></script>
		<script src="chat.js"></script>
	</body>
</html>