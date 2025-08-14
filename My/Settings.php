<?php
$id = (int)htmlspecialchars($_GET['ID']);
if(!$id) { if($loggedin == 'no'){header('Location: /Login/Default.aspx'); exit();}
require($_SERVER['DOCUMENT_ROOT'].'/main/navbar.php');

if($loggedin == 'no'){header('Location: /Login/Default.aspx'); exit();}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $blurb = htmlspecialchars($_POST['ctl00$cphRoblox$tbBlurb']);
    $theme = htmlspecialchars($_POST['theme']);
    
    if($blurb) {
        if(strlen($blurb) > 1000) {
            exit("Your blurb exceeds the max number of characters.");
        }
    
        $sql = "UPDATE `users` SET `description` = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("si", $blurb, $_USER['id']);
        $stmt->execute();
    }
    
    if($theme) {
        $sql = "UPDATE `users` SET `theme` = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("si", $theme, $_USER['id']);
        $stmt->execute();
    }
}
?>

          
  <div id="EditProfileContainer">
    <h2>Edit Profile</h2>
    <div id="AgeGroup">
      <fieldset title="Update your age-group">
        <legend>Update your age-group</legend>
        <div class="Suggestion">
          This is used to customize your <?=$sitename?> experience.  Users under 13 years are only shown pre-approved images.
        </div>
        <div class="AgeGroupRow">
          <table id="ctl00_cphRoblox_rblAgeGroup" border="0">
  <tr>
    <td><input id="ctl00_cphRoblox_rblAgeGroup_0" type="radio" name="ctl00$cphRoblox$rblAgeGroup" value="1" tabindex="1" /><label for="ctl00_cphRoblox_rblAgeGroup_0">Under 13 years</label></td>
  </tr><tr>
    <td><input id="ctl00_cphRoblox_rblAgeGroup_1" type="radio" name="ctl00$cphRoblox$rblAgeGroup" value="2" checked="checked" tabindex="1" /><label for="ctl00_cphRoblox_rblAgeGroup_1">13 years or older</label></td>
  </tr>
</table>
        </div>
      </fieldset>
        </div>
        <div id="ChatMode">
      <fieldset title="Update your chat mode">
        <legend>Update your chat mode</legend>
        <div class="Suggestion">
          All in-game chat is subject to profanity filtering and moderation.  For enhanced chat safety, choose SuperSafe Chat; only chat from pre-approved menus will be shown to you.
        </div>
        <div class="ChatModeRow">
          <table id="ctl00_cphRoblox_rblChatMode" border="0">
  <tr>
    <td><input id="ctl00_cphRoblox_rblChatMode_0" type="radio" name="ctl00$cphRoblox$rblChatMode" value="False" checked="checked" tabindex="2" /><label for="ctl00_cphRoblox_rblChatMode_0">Safe Chat</label></td>
  </tr><tr>
    <td><input id="ctl00_cphRoblox_rblChatMode_1" type="radio" name="ctl00$cphRoblox$rblChatMode" value="True" tabindex="2" /><label for="ctl00_cphRoblox_rblChatMode_1">SuperSafe Chat</label></td>
  </tr>
</table>
        </div>
      </fieldset>
        </div>
        <div id="ResetPassword">
      <fieldset title="Reset your password">
        <legend>Change your password</legend>
        <div class="Suggestion">Click the button below to change your password.</div>
        <div class="ResetPasswordRow">
                    &nbsp;<a id="ctl00_cphRoblox_ChangePassword" href="/My/ChangePassword.aspx">Change Password</a></div>
      </fieldset>
        </div>
        <div id="EnterEmail">
        <fieldset title="Update Email Address">
          <legend>Update Email Address</legend>
          <div class="Validators">
            <div><span id="ctl00_cphRoblox_RegularExpressionValidator2" style="color:Red;display:none;">Please enter a valid email address.</span></div>
            <div><span id="ctl00_cphRoblox_RequiredFieldValidator1" style="color:Red;display:none;">Email is required.</span></div>
            <div><span id="ctl00_cphRoblox_CustomValidatorEmail" style="color:Red;display:none;">An account with this email address already exists.</span></div>
          </div>
          <div class="EmailRow">
            <label for="ctl00_cphRoblox_TextBoxEMail" id="ctl00_cphRoblox_LabelEmail" class="Label">Email:</label>&nbsp;<input name="ctl00$cphRoblox$TextBoxEMail" type="text" value="<?php echo $_USER['email']; ?>" id="ctl00_cphRoblox_TextBoxEMail" tabindex="4" class="TextBox" />
          </div>
        </fieldset>
    </div>
        <div id="Blurb">
    <form action="/api/updatesettings.php" method="post">
      <fieldset title="Update your personal blurb">
        <legend>Update your personal blurb</legend>
        <div class="Suggestion">
          Describe yourself here (max. 1000 characters).  Make sure not to provide any details that can be used to identify you outside <?=$sitename?>.
        </div>
        <div class="BlurbRow">
          <textarea name="ctl00$cphRoblox$tbBlurb" rows="2" cols="20" id="ctl00_cphRoblox_tbBlurb" tabindex="3" class="MultilineTextBox"><?php echo $_USER['description']; ?></textarea>
        </div>
      </fieldset>
        </div>
        
    <div id="AgeGroup">
      <fieldset title="Choose a theme">
        <legend>Choose a theme</legend>
        <div class="Suggestion">
          This is used to customize your <?=$sitename?> experience.  Can change images, logos, and your desire year!
        </div>
        <div class="AgeGroupRow">
          <table id="ctl00_cphRoblox_rblAgeGroup" border="0">
  <tr>
    <td><input id="normal" type="radio" name="theme" value="Normal" <?php if($_USER['theme'] == "Normal" || empty($_USER['theme'])) { echo 'checked="checked"'; } ?> tabindex="1" /><label for="normal">Normal</label></td>
  </tr><tr>
    <td><input id="roblox2008" type="radio" name="theme" value="Roblox 2008" <?php if($_USER['theme'] == "Roblox 2008") { echo 'checked="checked"'; } ?> tabindex="1" /><label for="roblox2008">Roblox 2008</label></td>
  </tr>
</table>
        </div>
      </fieldset>
        
        <div class="Buttons">
      <button id="ctl00_cphRoblox_lbSubmit" tabindex="4" class="Button" type="submit" href="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$cphRoblox$lbSubmit&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))">Update</button>&nbsp;<a id="ctl00_cphRoblox_lbCancel" tabindex="5" class="Button" href="/User.aspx">Cancel</a>
        </div>
    </form>
  </div>

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php"); }
?>