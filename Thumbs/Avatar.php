<?php
require_once($_SERVER['DOCUMENT_ROOT']."/main/config.php");

if(!(int)htmlspecialchars($_GET['id'])){
    $id = $_USER['id'];
}else {
    $id = (int)htmlspecialchars($_GET['id']);
}

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$useridq = $stmt->get_result();
$user = $useridq->fetch_assoc();

if(!$user) {
    header("Location: images/unavail.png");
    exit();
}elseif(empty($user['thumbnail'])) {
    header("Location: images/unavail.png");
    exit();
}

header("Content-Type: image/png");

echo base64_decode($user['thumbnail']);

?>