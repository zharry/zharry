var socket = io('study-chat.herokuapp.com');
var users = {};

socket.on('connect', function() {
	console.log('connected');
	connect();
});

socket.on('disconnect', function() {
	$('#chat').append(createGlobalMessage(Date.now(), 'Disconnected from server!'));
});

function htmlentities(s){
	return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/ /g, '&nbsp;').replace(/\"/g, '&quot;').replace(/\'/g, '&apos;');
}

function scroll() {
	if(scrollToBottom) {
		window.scrollTo(0, document.body.scrollHeight);
	}
}

function connect() {
	socket.emit('adduser', {
		username: nananananana,
		sessionCookie: nanananananab
	});
}

function createGlobalMessage(timestamp, msg) {
	var $row = $('<div>').addClass('row chatmsg');
	var $messageCol = $('<div>').addClass('col-md-12');

	$row.attr('id', 'GLOBMSG')

	$messageCol.html(msg);

	$row.append($messageCol);
	return $row;
}

function createMessage(user, id, timestamp, msg) {
	var $row = $('<div>').addClass('row chatmsg');
	var $infoCol = $('<div>').addClass('col-md-4');
	var $messageCol = $('<div>').addClass('col-md-8').addClass('wraptext');

	$row.attr('id', 'CHATMSG-' + id);

	$infoCol.html(htmlentities(user.name + ":"));
	$messageCol.html(htmlentities(msg));

	$row.append($infoCol);
	$row.append($messageCol);
	
	notify(user.name + ": " + msg);
	
	return $row;
}

socket.on('userconnect', function(data) {
	users[data.id] = {
		username: data.username,
		name: data.name
	};
	$('#chat').append(createGlobalMessage(Date.now(), users[data.id].name + " has joined."));

	scroll();
});

socket.on('disconnectUser', function(id) {
	$('#chat').append(createGlobalMessage(Date.now(), users[id].name + " has left."));

	scroll();
	delete users[id];
});

socket.on('currentusers', function(data) {
	users = data.users;
	
	var string = {};
	for (var id in users) {
		var name = users[id].name;
		var tmp = string[name];
		if(tmp == null) {
			string[name] = 0;
		}
		else {
			string[name] ++;
		}
	}

	var finalStr = "";

	for (var user in string) {
		var userC = string[user];
		finalStr += user;
		if(userC > 1) {
			finalStr += " (" + userC + ")";
		}
		finalStr += "<br/>";
	}

	$('#chat').append(createGlobalMessage(Date.now(), '<br/>Current users are: <br/>' + finalStr + '<br/>'));
});

socket.on('spam', function() {
	$('#chat').append(createGlobalMessage(Date.now(), 'Please stop spamming!'));
	scroll();
});

socket.on('newmessage', function(data) {
	var user = data.user;
	var id = data.id;
	var timestamp = data.timestamp;
	var msg = data.msg;

	$('#chat').append(createMessage(users[user], id, timestamp, msg));
	console.log(user + ", " + id + ", " + timestamp + ", " + msg);
	scroll();

//	$('#messages').append($('<li>').html(htmlentities(msg));
});

socket.on('unauthorized', function() {
	console.log('Unauthorized');
});

socket.on('deletemessage', function(id) {
	$('#CHATMSG-' + id).remove();
	console.log('deleting');
});

socket.on('noperms', function() {
	console.log('no permission');
});

$('form').submit(function() {
	var message = $('#message').val();
	if (/\S/.test(message)) {
		socket.emit('chatmessage', message);
		$('#message').val('');	
	}
	$('#message').focus();
	return false;
});

function notify(message) {
    if (Notification.permission === "granted") {
        var notification = new Notification(message);
        setTimeout(function() {
            notification.close();
        }, 5000);
    } else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
            if (permission === "granted") {
                var notification = new Notification(message);
                setTimeout(function() {
                    notification.close();
                }, 5000);
            }
        });
    }
}

