<?php

require 'db.php';

require 'discord.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$errors = 0;
if($errors == 1){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}else{
    error_reporting(0);
    ini_set('display_errors', 0);
}  

//maintenance
$maintenance = 'no';
if($maintenance == 'yes') { 
    if($_SERVER['REQUEST_URI'] !== '/Maintenance.aspx') {
        header('Location: /Maintenance.aspx');
    }
}

// closure message lmao 
$closure = 'no';
if($closure == 'yes') { 
    if($_SERVER['REQUEST_URI'] !== '/Closure.aspx') {
        header('Location: /Closure.aspx');
    }
}
  
//download link
$download = "/download/rust.zip";

$renderServer = "147.185.221.24:7884";
$versions = "2008";

//for renders
require_once("RCCServiceSoap08.php");
$RCCServiceSoap = new RCCServiceSoap08("147.185.221.24", 7884, "roblox.com", true);

$buxalt = "R$";
$ticketsalt = "Tx";
  
if (isset($_SESSION['username'])) {
    $loggedin = 'yes';

    $stmt = $link->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $_SESSION['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $_USER = $result->fetch_assoc();
    $stmt->close();

    if ($_USER) {
        $time = time();
        $stmt = $link->prepare("UPDATE users SET lastseen = ? WHERE id = ?");
        $stmt->bind_param("ii", $time, $_USER['id']);
        $stmt->execute();
        $stmt->close();
        
        //names
        if($_USER['theme'] == 'Roblox 2008') {
            $sitename = "ROBLOX";
            $sitename2 = "Roblox";
            $sitename3 = "roblox";
            $motto = "Online Building Toy.";
            $bux = "ROBUX";
            $tickets = "Tickets";
            $corporation = "ROBLOX Corp";
            $sitelink = "roblox.com";
            $sitelink2 = "ROBLOX.COM";
            $sitelink3 = "Roblox.com";
            
            $logo = "/images/roblox_logo.png?v=".rand(1,9999)."";
        }else {
            $sitename = "RUST";
            $sitename2 = "Rust";
            $sitename3 = "rust";
            $motto = "A Rusty Building Toy.";
            $bux = "RUSTBUX";
            $tickets = "Tickets";
            $corporation = "Gra Gra Studios";
            $sitelink = "rust08.xyz";
            $sitelink2 = "RUST08.XYZ";
            $sitelink3 = "Rust08.xyz";
            
            $logo = "/images/logo.png?v=".rand(1,9999)."";
        }
    }
} else {
    //names
    $sitename = "RUST";
    $sitename2 = "Rust";
    $sitename3 = "rust";
    $motto = "A Rusty Building Toy.";
    $bux = "RUSTBUX";
    $tickets = "Tickets";
    $corporation = "Gra Gra Studios";
    $sitelink = "rust08.xyz";
    $sitelink2 = "RUST08.XYZ";
    $sitelink3 = "Rust08.xyz";
    
    $logo = "/images/logo.png?v=".rand(1,9999)."";
    $loggedin = 'no';
}

//time
function TimeAgo($date) {
    $date2 = strtotime($date);
    $strTime = array("second", "minute", "hour", "day", "month", "year");
	$length = array("60","60","24","30","12","10");
    $currentTime = time();
	if($currentTime >= $date2) {
		$diff = time()- $date2;
		for ($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
		    $diff = $diff / $length[$i];
		}
	    $diff = round($diff);
        if ($strTime[$i] == 1) {
            return $diff . " " . $strTime[$i] . " ago ";	
        } else {
            return $diff . " " . $strTime[$i] . "s ago ";	
        }
    }
}

function checkWebsite($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true); // Request only headers
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Ignore SSL validation
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Set timeout
    curl_setopt($ch, CURLOPT_VERBOSE, true); // Enable debugging

    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($httpCode >= 500); // Returns true if accessible
}

$RobloxColors = array(
    1,          //1
    208,        //2
    194,        //3
    199,        //4
    26,         //5
    21,         //6
    24,         //7
    226,        //8
    23,         //9
    107,        //10
    102,        //11
    11,         //12
    45,         //13
    135,        //14
    106,        //15
    105,        //16
    141,        //17
    28,         //18
    37,         //19
    119,        //20
    29,         //21
    151,        //22
    38,         //23
    192,        //24
    104,        //25
    9,          //26
    101,        //27
    5,          //28
    153,        //29
    217,        //30
    18,         //31
    125         //32
);

$RobloxColorsHtml = array(
    "#F2F3F2",  //1
    "#E5E4DE",  //2
    "#A3A2A4",  //3
    "#635F61",  //4
    "#1B2A34",  //5
    "#C4281B",  //6
    "#F5CD2F",  //7
    "#FDEA8C",  //8
    "#0D69AB",  //9
    "#008F9B",  //10
    "#6E99C9",  //11
    "#80BBDB",  //12
    "#B4D2E3",  //13
    "#74869C",  //14
    "#DA8540",  //15
    "#E29B3F",  //16
    "#27462C",  //17
    "#287F46",  //18
    "#4B974A",  //19
    "#A4BD46",  //20
    "#A1C48B",  //21
    "#789081",  //22
    "#A05F34",  //23
    "#694027",  //24
    "#6B327B",  //25
    "#E8BAC7",  //26
    "#DA8679",  //27
    "#D7C599",  //28
    "#957976",  //29
    "#7C5C45",  //30
    "#CC8E68",  //31
    "#EAB891"   //32
);
?>