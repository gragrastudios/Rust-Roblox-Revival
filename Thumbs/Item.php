<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/main/config.php");

$id = (int)htmlspecialchars($_GET['id']);

if(!$id) {
    exit("A ID is needed.");
}

$sql = "SELECT * FROM catalog WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$catalogq = $stmt->get_result();
$catalog = $catalogq->fetch_assoc();

if(!$catalog) {
    header("Location: images/unavail.png");
    exit();
}elseif(empty($catalog['thumbnail'])) {      
    header("Location: images/unavail.png");
    exit();
}

header("Content-Type: image/png");

echo base64_decode($catalog['thumbnail']);

?>