<?php

require $_SERVER['DOCUMENT_ROOT'] . '/main/navbar.php';

$url = "http://$renderServer";
if (checkWebsite($url)) {
    $online = '<p style="color: green;">Online</p>';
} else {
    $online = '<p style="color: red;">Offline</p>';
}

?>
<h1>Render Server: <?php echo $online; ?></h1>
<br>
<h1>Master Server: <p style="color: green;">Online</p></h1>
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/main/footer.php';
?>