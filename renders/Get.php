<?php require_once($_SERVER['DOCUMENT_ROOT']."/main/config.php");
$sql = "SELECT * FROM users WHERE id='".(int)htmlspecialchars($_GET['id'])."'";
$useridq = mysqli_query($link, $sql) or die(mysqli_error($link));
$user = mysqli_fetch_assoc($useridq);

header("Content-Type: image/png");

echo base64_decode($user['thumbnail']);
echo rand(1,9999);

?>
