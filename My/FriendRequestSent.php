<?php 
require($_SERVER['DOCUMENT_ROOT'].'/main/navbar.php'); 

$id = (int)htmlspecialchars($_GET['ID']);

if(!$id) {
    exit('User id is needed.');
}

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$userq = $stmt->get_result();
$user = $userq->fetch_assoc();

if(!$user) {
    exit('User doesnt exist.');
}

?>
	<div class="MessageContainer">
        <div id="MessagePane">
			<div id="ctl00_cphRoblox_pConfirmation">
				<div id="Confirmation">
					<h3>Friend Request Sent</h3>
					<div id="Message"><span id="ctl00_cphRoblox_lConfirmationMessage">Your friend request has been sent to <?php echo $user['username']; ?>.</span></div>
					<div class="Buttons"><a id="ctl00_cphRoblox_lbContinue" class="Button" href="/User.aspx">Continue</a></div>
				</div>
			
</div>
		</div>
		<div style="clear: both;"></div>
	</div>

				</div>
<?php require($_SERVER['DOCUMENT_ROOT'].'/main/footer.php'); ?>