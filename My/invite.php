<?php 

$InvitationID = (int)htmlspecialchars($_GET['InvitationID']);

if(!$InvitationID) {
    exit("Request id is needed.");
}

$sql = "SELECT * FROM friends WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $InvitationID);
$stmt->execute();
$friendq = $stmt->get_result();
$friend = $friendq->fetch_assoc();

if(!$friend) {
    exit("Friend Request doesnt exist.");
}

if(!$friend['sent_to'] == $_USER['id']) {
    exit("Not your friend request.");
}

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $friend['sent_from']);
$stmt->execute();
$usersdsq = $stmt->get_result();
$usersds = $usersdsq->fetch_assoc();

if(!$usersds) {
    exit("User doesnt exist.");
}

?>
	<div id="InvitationContainer">
        <div id="InvitationPane">
			<div id="ctl00_cphRoblox_pFriendInvitation">
	
				<div id="ctl00_cphRoblox_pMessageReader">
		
					<h3>Friend Request</h3>
					<div class="MessageReaderContainer">
					    

<div id="Message">
    <table width="100%">
        <tr valign="top">
            <td style="width: 10em">
                <div id="DateSent">
                <?php
                    $createstring = strtotime($friend['date_created']);
                    echo $createdate = date('d/m/Y H:i:s A',$createstring); 
                ?>
                </div>
                <div id="Author">
                    
                    <a id="ctl00_cphRoblox_rbxMessageReader_Avatar" disabled="disabled" title="<?php echo $usersds['username']; ?>" onclick="return false" style="display:inline-block;height:64px;width:64px;"><img width="64" height="64" src="/Thumbs/Avatar.ashx?id=<?php echo $usersds['id']; ?>&v=<?php echo rand(1,9999); ?>" border="0" id="img" alt="<?php echo $usersds['username']; ?>" /></a><br />
                    <a id="ctl00_cphRoblox_rbxMessageReader_AuthorHyperLink" title="Visit <?php echo $usersds['username']; ?>'s Home Page" href="../User.aspx?ID=<?php echo $usersds['id']; ?>"><?php echo $usersds['username']; ?></a>
                </div>
                <div id="Subject">
                    Friend Request<br />
                    <br />
                    <div id="ctl00_cphRoblox_rbxMessageReader_AbuseReportButton_AbuseReportPanel" class="ReportAbusePanel">
			
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_rbxMessageReader_AbuseReportButton_ReportAbuseIconHyperLink" href="../AbuseReport/Message.aspx?ID=2274830&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fMy%2fFriendInvitation.aspx%3fInvitationID%3d494536"><img src="../images/abuse.png" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_rbxMessageReader_AbuseReportButton_ReportAbuseTextHyperLink" href="../AbuseReport/Message.aspx?ID=2274830&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fMy%2fFriendInvitation.aspx%3fInvitationID%3d494536">Report Abuse</a></span>

		</div>
                </div>
            </td>
            <td style="padding: 0 10px 0 10px">
                <div class="Body">
                    <div id="ctl00_cphRoblox_rbxMessageReader_pBody" class="MultilineTextBox" style="height:250px;width:400px;overflow-y:scroll;">
			
                        <?php echo htmlspecialchars($friend['message']); ?>
                    
		</div>
                </div>
                
            </td>
        </tr>
    </table>
</div>
					    <div style="clear:both"></div>
					</div>		
	</div>	
				<div id="ctl00_cphRoblox_pSubmit_ExistingInvitation">
					<div class="Buttons">
						<a id="ctl00_cphRoblox_lbCancel" class="Button" href="/User.aspx">Cancel</a>
						<a id="ctl00_cphRoblox_lbDecline" class="Button" href="/api/declinefriend.ashx?id=<?php echo $friend['id']; ?>">Decline</a>
						<a id="ctl00_cphRoblox_lbAccept" class="Button" href="/api/acceptfriend.ashx?id=<?php echo $friend['id']; ?>">Accept</a>
					</div>
	</div>		
</div>
		</div>
	</div>
				</div>
				</div>