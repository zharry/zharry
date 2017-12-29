<?php

// Allow access from Chrome Extension
header("Access-Control-Allow-Origin: *");

// MySQL Connection
require_once 'connection.php';

// Debug Vars
$DEBUG = false;

/* Return Errors with ERR_{Code}
0: MySQL Connection Failed
1: MySQL Prepare Failed
*/
$return = "";

$data = $_GET;
if ($data["action"] == "createTask") {
	// Generate UUID
	$uuid = uniqid("YDL_", true);
	
	// Insert to SQL
	$stmt = mysqli_prepare($conn, "INSERT INTO `tasks` (`uuid`, `url`, `title`, `artist`, `album`, `album_artist`, `track`, `genre`, `bitrate`, `thumbnail`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
	if ($stmt) {
		mysqli_stmt_bind_param($stmt, "ssssssisis", $uuid ,$data["url"], $data["title"], $data["artist"], $data["album"], $data["albumArtist"], $data["track"], $data["genre"], $data["bitrate"], $data["thumbnail"]);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		// Escape Args
		$data["url"] = escapeshellarg($data["url"]);
		$data["title"] = escapeshellarg($data["title"]);
		$data["artist"] = escapeshellarg($data["artist"]);
		$data["album"] = escapeshellarg($data["album"]);
		$data["albumArtist"] = escapeshellarg($data["albumArtist"]);
		$data["genre"] = escapeshellarg($data["genre"]);
		$data["bitrate"] = escapeshellcmd($data["bitrate"]);
		
		$thumbnail = "default_thumbnail.png";
		// Download Thumbnail
		if (!isset($data["thumbnail"])) {
			$data["thumbnail"] = escapeshellarg($data["thumbnail"]);
			shell_exec("wget --no-check-certificate -O \"thumbnails/{$uuid}\" {$data["thumbnail"]}");
			if (file_exists("thumbnails/{$uuid}")) {
				$thumbnail = "thumbnails/{$uuid}";
			}
		}
		
		// Create Status File
		$createStatus = "touch status/{$uuid}.downloading";
		
		// FFMPEG Command
		$ffm_args = "\"bin/ffmpeg\" ";
		$ffm_args .= "-i \"temp/{$uuid}.mp3\" ";
		$ffm_args .= "-i \"{$thumbnail}\" ";
		$ffm_args .= "-map 0:0 -map 1:0 -c copy ";
		$ffm_args .= "-id3v2_version 3 ";
		$ffm_args .= "-metadata:s:v comment=\"Cover (Front)\" ";
		$ffm_args .= "-metadata title={$data["title"]} ";
		$ffm_args .= "-metadata artist={$data["artist"]} ";
		$ffm_args .= "-metadata album_artist={$data["albumArtist"]} ";
		$ffm_args .= "-metadata album={$data["album"]} ";
		if (isset($data["track"])) {
			$data["track"] = escapeshellcmd($data["track"]);
			$ffm_args .= "-metadata track={$data["track"]} ";
		}
		$ffm_args .= "-metadata genre={$data["genre"]} ";
		$ffm_args .= "\"output/{$uuid}.mp3\"";
		
		// YDL Command
		$ydl_args = "--abort-on-error ";
		$ydl_args .= "--prefer-ffmpeg "; 
		$ydl_args .= "--no-playlist ";
		$ydl_args .= "--no-continue "; 
		$ydl_args .= "--no-part "; 
		$ydl_args .= "--no-progress "; 
		$ydl_args .= "-x --audio-format mp3 "; 
		$ydl_args .= "--audio-quality {$data["bitrate"]}K "; 
		$ydl_args .= "-o \"temp/" . $uuid . ".%(ext)s\" "; 
		$ydl_args .= "--exec 'mv status/{$uuid}.downloading status/{$uuid}.converting && " . $ffm_args . " && mv status/{$uuid}.converting status/{$uuid}.done && echo {}' "; 
		$ydl_args .= "{$data["url"]}";
		if ($DEBUG) {
			$ydl_args = "-v " . $ydl_args;
		}
		$ydl = "\"bin/youtubedl.exe\" " . $ydl_args . " > logs/{$uuid}.txt";
		
		// Run Command
		bexec("PHP-CreateStatus-{$uuid}", $createStatus);
		bexec("PHP-{$uuid}", $ydl);
		
		$return = $ydl;
	} else {
		$return = "ERR_1";
	}
} else if ($data["action"] == "checkStatus") {
	
}

echo $return;

?>