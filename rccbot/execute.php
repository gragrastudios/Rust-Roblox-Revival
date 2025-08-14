<?php 
require_once $_SERVER["DOCUMENT_ROOT"].'/main/config.php';

$scriptsigma = $_GET['script'];

$script = '
  print("Running script from RUST RCCService bot.")
  '.$scriptsigma.'
  ';

$execute = $RCCServiceSoap->execScript($script, "sigma", 0.1);

echo 'Script '.$scriptsigma.' has been executed.';

echo $execute;

$sigmasigmaboy = 'ThumbnailGenerator';

if(strpos($script, $sigmasigmaboy)) {
?>
<img src="data:image/png;base64,<?php echo $execute; ?>">
<?php } ?>