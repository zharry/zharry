<?php

require '../auth.php';
requireAdmin('SNC1D6-02');

$url = 'https://study-chat.herokuapp.com/log';
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
echo $result;

?>
