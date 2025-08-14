<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
if($loggedin == 'no'){header('Location: /Login/Default.aspx'); exit();}

$RecipientID = (int)htmlspecialchars($_GET['RecipientID']);

if((int)htmlspecialchars($_GET['InvitationID'])) {
    require('invite.php');
    exit();
}

if(!$RecipientID) {
    die("Error: RecipientID is required.");
}

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $RecipientID);
$stmt->execute();
$userq = $stmt->get_result();
$user = $userq->fetch_assoc();

if(!$user) {
    die("User not found.");
}

if($user['id'] == $_USER['id']) {
    die("You can't friend yourself.");
}

?>
          
  <div class="MessageContainer">
        <div id="MessagePane">
      <div id="ctl00_cphRoblox_pPrivateMessage">
  
        
        <div id="ctl00_cphRoblox_pPrivateMessageEditor">
    
          <h3>Your Friend Request</h3>
          <div id="MessageEditorContainer">
            
<form action="/api/friendrequest.ashx?id=<?php echo $user['id']; ?>" method="post">
            
<div class="MessageEditor">
    <table width="100%">
        <tr valign="top">
           <td style="width:12em">
                <div id="From">
                    <span class="Label">
                        <span id="ctl00_cphRoblox_rbxMessageEditor_lblFrom">From:</span></span> <span class="Field">
                            <span id="ctl00_cphRoblox_rbxMessageEditor_lblAuthor"><?php echo $_USER['username']; ?></span></span>
                </div>
                <div id="To">
                    <span class="Label">
                        <span id="ctl00_cphRoblox_rbxMessageEditor_lblTo">Send To:</span></span> <span class="Field">
                            <span id="ctl00_cphRoblox_rbxMessageEditor_lblRecipient"><?php echo $user['username']; ?></span></span>
                </div>
                
            </td>
            <td style="padding:0 24px 6px 12px">
                <div class="Body">
                    <div class="Label">
                        <label for="ctl00_cphRoblox_rbxMessageEditor_txtBody" id="ctl00_cphRoblox_rbxMessageEditor_lblBody">Message:</label></div>
                    <textarea name="message" rows="2" cols="20" id="ctl00_cphRoblox_rbxMessageEditor_txtBody" class="MultilineTextBox" style="width:100%;"></textarea>
                </div>
                
            </td>
        </tr>
    </table>
</div>

            <div style="clear:both"></div>
          </div>
          <div class="Buttons">
            <button id="ctl00_cphRoblox_lbSend" class="Button" type="submit">Send</button>
            
          </div>
        
  </div>
      
</div>
      
    </div>
    
</form>
    
    <div style="clear: both;"></div>
  </div>

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>