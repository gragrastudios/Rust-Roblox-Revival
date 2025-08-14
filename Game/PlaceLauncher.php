<?php
require($_SERVER['DOCUMENT_ROOT'].'/main/config.php');

$agent = $_SERVER['HTTP_USER_AGENT'];

$sql = "SELECT * FROM apirequests WHERE session = ? AND time >= DATE_SUB(NOW(), INTERVAL 5 SECOND)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_USER['authentication']);
$stmt->execute();
$result = $stmt->get_result();
$apicheck = $result->num_rows;

if($apicheck > 5) {
    $error = "You have been rate limited.";
}

$sql = "INSERT INTO apirequests (session) VALUES (?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_USER['authentication']);
$stmt->execute();

if($error) { ?>

  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
  function JoinGame()
    {
    $("#joiningGameDiag").show();
    $("#Spinner").show();
    $("#Requesting").hide();
    $("#RateLimit").show();
  }
  function closeModal()
    {
    $("#joiningGameDiag").hide();
    $("#Spinner").show();
    $("#Requesting").html("Requesting a server");
  }

<?php
exit(); 
}

if($loggedin == 'no'){ ?>
  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
  function JoinGame()
    {
    $("#joiningGameDiag").show();
    $("#Spinner").show();
    $("#Requesting").show();
        $("#Requesting").html("<?php if($error) { echo $error; }else { echo 'An error occured. Please try again later'; }?>");
  }
  function closeModal()
    {
    $("#joiningGameDiag").hide();
    $("#Spinner").show();
    $("#Requesting").html("Requesting a server");
  }
<?php 
exit(); 
}

$id = (int)htmlspecialchars($_GET['id']);

if(!$id){ ?>
  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
  function JoinGame()
    {
    $("#joiningGameDiag").show();
    $("#Spinner").show();
    $("#Requesting").show();
        $("#Requesting").html("<?php if($error) { echo $error; }else { echo 'An error occured. Please try again later'; }?>");
  }
  function closeModal()
    {
    $("#joiningGameDiag").hide();
    $("#Spinner").show();
    $("#Requesting").html("Requesting a server");
  }
<?php 
exit(); 
}

$sql = "SELECT * FROM games WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$gameq = $stmt->get_result();
$game = $gameq->fetch_assoc();


if(!$game){ ?>
  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
  function JoinGame()
    {
    $("#joiningGameDiag").show();
    $("#Spinner").show();
    $("#Requesting").show();
        $("#Requesting").html("<?php if($error) { echo $error; }else { echo 'An error occured. Please try again later'; }?>");
  }
  function closeModal()
    {
    $("#joiningGameDiag").hide();
    $("#Spinner").show();
    $("#Requesting").html("Requesting a server");
  }
<?php 
exit(); 
}

?>
  function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
  }
  function JoinGame()
    {
    $("#joiningGameDiag").show();
    $("#Spinner").show();
    $("#Requesting").show();
        sleep(600).then(() => { $("#Requesting").html("Waiting for a server"); });
        sleep(1500).then(() => { $("#Requesting").html("A server is loading the game"); });
        sleep(1700).then(() => { $("#Requesting").html("The server is ready. Joining the game..."); });
        setTimeout(function() { console.log("launching client launcher"); }, 2000);
        sleep(2000).then(() => { location.href= "rustclient://?placeid=<?php echo $game['id']; ?>&authentication=<?php echo $_USER['authentication']; ?>"; });

        setTimeout(function() { closeModal(); }, 3500);
  }
  function closeModal()
    {
    $("#joiningGameDiag").hide();
    $("#Spinner").show();
    $("#Requesting").html("Requesting a server");
  }