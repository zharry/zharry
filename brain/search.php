<?php
    require_once 'auth/connection.php';
    session_start();
    
    if (isset($_GET["query"])) {
        // Setup Query
        $req = mysqli_real_escape_string($conn, $_GET["query"]);
        $sql = "SELECT * FROM `contents` WHERE `tags` LIKE '%$req%' AND `access` != 'Protected' AND `access` != 'Private';";
        if (isset($_SESSION["username"])) {
            $sql = "SELECT * FROM `contents` WHERE `tags` LIKE '%$req%';";
        }
        $ret = array();
        
        // Perform Query
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                $ret[] = $row;
            }
        }
        
        header('Content-Type:application/json'); 
        echo json_encode($ret);
    }
?>