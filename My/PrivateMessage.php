<?php
$MessageID = (int)htmlspecialchars($_GET['MessageID']);

if(!$MessageID) {
    $RecipientID = (int)htmlspecialchars($_GET['RecipientID']);
    
    if(!$RecipientID) {
        exit("RecipientID is needed.");
    }
    
    require('SendMessage.php');
    die();
}

require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");

$sql = "SELECT * FROM messages WHERE id = ? AND sent_to = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", $MessageID, $_USER['id']);
$stmt->execute();
$messageq = $stmt->get_result();
$message = $messageq->fetch_assoc();

if(!$message) {
    exit("Message does not exist, or you can't access this message.");
}


$jaskdhsadk = $message['sent_from'];


$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $jaskdhsadk);
$stmt->execute();
$userq = $stmt->get_result();
$user = $userq->fetch_assoc();   
?>
					
	<div class="MessageContainer">
		<div id="AdsPane">
			
<div class="Ads_WideSkyscraper">
    <script type="text/javascript"><!--
        google_ad_client = "pub-2247123265392502";
        google_ad_width = 160;
        google_ad_height = 600;
        google_ad_format = "160x600_as";
        google_ad_type = "text_image";
        google_ad_channel = "";
        //-->
    </script>
    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
</div>
        </div>
        <div id="MessagePane">
			<div id="ctl00_cphRoblox_pPrivateMessage">
	
				<div id="ctl00_cphRoblox_pPrivateMessageReader">
		
					<h3>Private Message</h3>
					<div class="MessageReaderContainer">
					    

<div id="Message">
    <table width="100%">
        <tr valign="top">
            <td style="width: 10em">
                <div id="DateSent">
                    <?php
                        $createstring = strtotime($message['date_created']);
                        echo $createdate = date('m/d/Y H:i:s A',$createstring); 
                    ?>
                </div>
                <div id="Author">
                    
                    <a id="ctl00_cphRoblox_rbxMessageReader_Avatar" disabled="disabled" title="yea" onclick="return false" style="display:inline-block;height:64px;width:64px;"><img src="/Thumbs/Avatar.ashx?id=<?php echo $user['id']; ?>&v=<?php echo rand(1, 9999); ?>" width="64" height="64" border="0" id="img" alt="<?php echo $user['username']; ?>" /></a><br />
                    <a id="ctl00_cphRoblox_rbxMessageReader_AuthorHyperLink" title="Visit <?php echo $user['username']; ?>'s Home Page" href="../User.aspx?ID=<?php echo $user['id']; ?>"><?php echo $user['username']; ?></a>
                </div>
                <div id="Subject">
                    <?php echo $message['subject']; ?><br />
                    <br />
                    <div id="ctl00_cphRoblox_rbxMessageReader_AbuseReportButton_AbuseReportPanel" class="ReportAbusePanel">
			
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_rbxMessageReader_AbuseReportButton_ReportAbuseIconHyperLink" href="../AbuseReport/Message.aspx?ID=<?php echo $message['id']; ?>"><img src="../images/abuse.png" alt="Report Abuse" style="border-width:0px;" /></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_rbxMessageReader_AbuseReportButton_ReportAbuseTextHyperLink" href="../AbuseReport/Message.aspx?ID=<?php echo $message['id']; ?>">Report Abuse</a></span>

		</div>
                </div>
            </td>
            <td style="padding: 0 10px 0 10px">
                <div class="Body">
                    <div id="ctl00_cphRoblox_rbxMessageReader_pBody" class="MultilineTextBox" style="height:250px;overflow-y:scroll;">
			
                        <?php echo $message['message']; ?>
                    
		</div>
                </div>
                
            </td>
        </tr>
    </table>
</div>
					    <div style="clear:both"></div>
					</div>
					<div class="Buttons">
						<a id="ctl00_cphRoblox_lbCancel" class="Button" href="/My/Inbox.aspx">Cancel</a>
						<a id="ctl00_cphRoblox_lbDelete" class="Button" href="javascript:__doPostBack('ctl00$cphRoblox$lbDelete','')">Delete</a>
						<a id="ctl00_cphRoblox_lbReply" class="Button" href="javascript:__doPostBack('ctl00$cphRoblox$lbReply','')">Reply</a>
					</div>
					<div style="clear:both"></div>
				
	</div>
				
			
</div>
			
		</div>
		<div style="clear: both;"></div>
	</div>

				</div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>