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

$sitelink = "rust08.xyz";
$sitelink2 = "RUST08.XYZ";
$sitelink3 = "Rust08.xyz";
  
//names
$sitename = "RUST";
$sitename2 = "Rust";
$sitename3 = "rust";

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

$motto = "A Rusty Building Toy.";
  
$renderServer = "renderurlhere";
$versions = "2008";

//for renders
require_once("RCCServiceSoap08.php");
$RCCServiceSoap = new RCCServiceSoap08("iphere", porthere, "roblox.com", true);
 
$bux = "RUSTBUX";
$tickets = "Tickets";
$buxalt = "R$";
$ticketsalt = "Tx";
  
if(isset($_SESSION['username'])) {
  $loggedin = 'yes';
  $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
  $_USERQ = mysqli_query($link, $sql);
  $_USER = mysqli_fetch_assoc($_USERQ);
  
  $time = time();
  $sql = "UPDATE users SET lastseen = '".$time."' WHERE id = '".$_USER['id']."'";
  $lastseencheck = mysqli_query($link, $sql);
}else {
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