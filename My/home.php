<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
if($loggedin == 'no'){header('Location: /Login/Default.aspx'); exit();}
?>

          
  
  <div id="UserContainer">
    <div id="LeftBank">
      <div id="ctl00_cphRoblox_pProfile">
  
        <div id="ProfilePane">
          
<table width="100%" bgcolor="lightsteelblue" cellpadding="6" cellspacing="0">
    <tr>
        <td>
            <span id="ctl00_cphRoblox_rbxUserPane_lUserName" class="Title">Hi, <?php echo htmlspecialchars($_USER['username']); ?>!</span><br/>
        </td>
    </tr>
    <tr>
        <td>
            <span id="ctl00_cphRoblox_rbxUserPane_lUserRobloxURL">Your <?=$sitename?>:</span><br/>
            <a id="ctl00_cphRoblox_rbxUserPane_hlUserRobloxURL" href="User.aspx?ID=<?php echo $_USER['id']; ?>">http://<?=$sitelink?>/User.aspx?ID=<?php echo $_USER['id']; ?></a><br/>
            <br/>
            <div style="left: 0px; float: left; position: relative; top: 0px">
                <a id="ctl00_cphRoblox_rbxUserPane_Image1" disabled="disabled" title="<?php echo htmlspecialchars ($_USER['username']); ?>" onclick="return false" style="display:inline-block;"><img src="/Thumbs/Avatar.ashx?id=<?php echo $_USER['id']; ?>&v=<?php echo rand(1,9999); ?>" border="0" alt="<?php echo htmlspecialchars($_USER['username']); ?>" width="220" height="220" blankurl="http://t7.roblox.com:80/blank-180x220.gif"/></a><br/>
                <div id="ctl00_cphRoblox_rbxUserPane_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
	
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_rbxUserPane_AbuseReportButton1_ReportAbuseIconHyperLink" href="AbuseReport/UserProfile.aspx?userID=<?php echo $_USER['id']; ?>"><img src="/images/abuse.png" alt="Report Abuse" border="0"/></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_rbxUserPane_AbuseReportButton1_ReportAbuseTextHyperLink" href="AbuseReport/UserProfile.aspx?userID=<?php echo $_USER['id']; ?>">Report Abuse</a></span>

</div>
            </div>
     
<p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_UpgradesHyperLink" href="/My/Inbox.aspx">Inbox</a></p>
<p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyRobux" href="/My/Character.aspx">Change Character</a></p>
<p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyInbox" href="/My/Settings.aspx">Edit Profile</a>&nbsp;</p>
<p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyAvatar" href="/Upgrades/BuildersClub.aspx">Account Upgrades</a></p>
<p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyProfile_Edit" href="/My/AccountBalance.aspx">Account Balance</a></p>
<p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyProfile_View" href="/User.aspx?ID=<?php echo $_USER['id']; ?>">View Public Profile</a></p>
<p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlMyProfile_View" href="/My/CreatePlace.aspx">Create New Place</a> <br> (1 Remaining)</p>
<p><a id="ctl00_cphRoblox_rbxUserPane_rbxMyUser_hlInviteAFriend" href="/My/InviteAFriend.aspx">Share <?=$sitename?></a></p>
              </font>
              </div>
            </font></td>
          </tr>
        </tbody></table>

    <?php
    if ($_USER['buildersclub'] == '1') {
    $timestamp = strtotime($_USER['bcexpire']);
    $date = date('m/d/Y', $timestamp);
    ?>
    <div class="Header">
        <h4 style="font-size: small;">Builders Club Member until <?php echo $date; ?></h4>
    </div>
    <?php
    }
    ?>

        </td>
    </tr>
</table>

        </div>
      
</div>
      <div id="ctl00_cphRoblox_pUserBadges">
  
        <div id="UserBadgesPane">
          

<div id="UserBadges">
  <h4><a id="ctl00_cphRoblox_rbxUserBadgesPane_hlHeader" href="/Badges.aspx">Badges</a></h4>
  <table id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges" cellspacing="0" align="Center" border="0" style="border-collapse:collapse;">
    <tr>
      <td>
      <div class="Badge">
        <div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_hlHeader" href="/Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_iBadge" src="/images/Badges/Homestead-70x75.jpg" alt="The homestead badge is earned by having your personal place visited 100 times. Players who achieve this have demonstrated their ability to build cool things that other Robloxians were interested enough in to check out. Get a jump-start on earning this reward by inviting people to come visit your place." style="height:75px;border-width:0px;" /></a></div>
        <div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_HyperLink1" href="/Badges.aspx">Homestead</a></div>
      </div>
    </td><td>
      <div class="Badge">
        <div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl01_hlHeader" href="/Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl01_iBadge" src="/images/Badges/Friendship-75x75.jpg" alt="This badge is given to players who have embraced the have made at least 20 friends. People who have this badge are good people to know and can probably help you out if you are having trouble." style="height:75px;border-width:0px;" /></a></div>
        <div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl01_HyperLink1" href="/Badges.aspx">Friendship</a></div>
      </div>
    </td><td>
      <div class="Badge">
        <div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl02_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl02_iBadge" src="/images/Badges/CombatInitiation-75x75.jpg" alt="This badge is given to any player who has proven his or her combat abilities by accumulating 10 victories in battle. Players who have this badge are not complete newbies and probably know how to handle their weapons." style="height:75px;border-width:0px;" /></a></div>
        <div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl02_HyperLink1" href="Badges.aspx">Combat Initiation</a></div>
      </div>
    </td><td></td>
    </tr>
  </table>
  
</div>
        </div>
      
</div>
<div id="ctl00_cphRoblox_pUserStatistics">
  
        <div id="UserStatisticsPane">
          

<div id="UserStatistics">
  <div id="ctl00_cphRoblox_rbxUserStatisticsPane_upBody" style="height: 130px;">
    
      <input name="ctl00$cphRoblox$rbxUserStatisticsPane$cpeUserStatistics_ClientState" id="ctl00_cphRoblox_rbxUserStatisticsPane_cpeUserStatistics_ClientState" value="false" type="hidden">
      <div id="ctl00_cphRoblox_rbxUserStatisticsPane_pHeader">
      
        <div class="Header">
          <h4 style="font-size: small;">Statistics</h4> 
          <span class="PanelToggle">
          </span>
        </div>        
      
    </div>
      
      <div id="ctl00_cphRoblox_rbxUserStatisticsPane_pBody" style="margin: 10px 10px 150px 10px;">
      
        
        <div id="ctl00_cphRoblox_rbxUserStatisticsPane_pResults">
        
          <div id="Results">
            <div class="Statistic">
              <div class="Label"><acronym title="The number of this user's friends.">Friends</acronym>:</div>
              <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lFriendsStatistics">? (? last week)</span></div>
            </div>
            <div class="Statistic">
              <div class="Label"><acronym title="The number of posts this user has made to the <?=$sitename?> forum.">Forum Posts</acronym>:</div>
              <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lForumPostsStatistics">? (? last week)</span></div>
            </div>
            <div class="Statistic">
              <div class="Label"><acronym title="The number of times this user's profile has been viewed.">Profile Views</acronym>:</div>
              <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lProfileViewsStatistics">? (? last week)</span></div>
            </div>
            <div class="Statistic">
              <div class="Label"><acronym title="The number of times this user's place has been visited.">Place Visits</acronym>:</div>
              <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lPlaceVisitsStatistics">? (? last week)</span></div>
            </div>
            <div class="Statistic">
              <div class="Label"><acronym title="The number of times this user's character has destroyed another user's character in-game.">Knockouts</acronym>:</div>
              <div class="Value"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lKillsStatistics">? (? last week)</span></div>
            </div>
        
      </div>
      
    </div>
    
  </div>
</div>
        </div>
      
</div>
      
</div>
    </div>
    <div id="RightBank">
      <div id="ctl00_cphRoblox_pUserPlacesPane">
  
        <div id="UserPlacesPane">
          
<div id="UserPlaces">
    <h4>Showcase</h4>
    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion">
  <input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ShowcasePlacesAccordion_AccordionExtender_ClientState" id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion_AccordionExtender_ClientState" value="0"/><div class="AccordionHeader">
    
      <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl04_lPlaceName">test game</span>
        
    </div><div style="display:block;">
      
      

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/images/locked.png" style="border-width:0px;" />&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/images/unlocked.png" style="border-width:0px;" />&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="images/public.png" style="border-width:0px;" />&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_VisitMPButton">
    
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_PlaceLauncher1_Panel1" class="modalPopup" style="width:300px;display: none;">
        
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_PlaceLauncher1_Image1" src="/images/ProgressIndicator2.gif" style="border-width:0px;" /></div>
        <div id="Requesting" style="display: inline">
            Requesting a server</div>
        <div id="Waiting" style="display: none">
            Waiting for a server</div>
        <div id="Loading" style="display: none">
            A server is loading the game</div>
        <div id="Joining" style="display: none">
            The server is ready. Joining the game...</div>
        <div id="Error" style="display: none">
            An error occured. Please try again later</div>
        <div id="Expired" style="display: none">
            There are no game servers available at this time. Please try again later</div>
        <div id="GameEnded" style="display: none">
            The game you requested has ended</div>
        <div id="GameFull" style="display: none">
            The game you requested is full. Please try again later</div>
        <div style="text-align: center; margin-top: 1em">
            <input id="Cancel" type="button" class="Button" value="Cancel" /></div>
    </div>

      </div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl05$rbxPlatform$rbxVisitButtons$PlaceLauncher1$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_PlaceLauncher1_HiddenField1" />


    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="Roblox.Launch.RequestGame('ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_PlaceLauncher1_ModalPopupExtender1', 71761); return false;">Visit Online</button>
</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_VisitButton">
  &nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="Roblox.Launch.StartGame('http://www.roblox.com/Game/visit.ashx?PlaceID=71761&amp;upload=71761', 'http://www.roblox.com/Login/Negotiate.ashx', 'visit.ashx', 29757); return false;">Visit Solo</button>
</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_EditButton" style="display:none">
  &nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_hlEdit" class="Button" onclick="Roblox.Launch.StartGame('http://www.roblox.com/Game/edit.ashx?PlaceID=71761&amp;upload=71761', 'http://www.roblox.com/Login/Negotiate.ashx', 'edit.ashx', 29757); return false;">Edit</button>
</span>
    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_lStatistics">Visited 572 times (20 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="test game" href="/Place.aspx?ID=71761" style="display:inline-block;height:230px;width:420px;"><img src="http://t3.roblox.com:80/Place-420x230-4d9f24d8b0d079b60f666419d478d58d.Png" border="0" id="img" alt="test game" /></a>
    </div>
    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_pDescription">
        
        <div class="Description">
            <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_lDescription">what</span>
        </div>
    
      </div>
    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_pConfiguration">
        
        <div class="Configuration">
            <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_hlConfigurePlace" href="My/Place.aspx?PlaceID=71761">Configure this Place</a>
        </div>
    
      </div>
</div>
      
    
    </div>
  </div>
 </div>
        </div>
      
</div>
      <div id="ctl00_cphRoblox_pFriends">
  
        <div id="FriendsPane">
          
<?php 

$sql = "SELECT * FROM friends WHERE (`sent_from` = ? AND `pending`='accepted') OR  (`sent_to` = ? AND `pending`='accepted');";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", $_USER['id'], $_USER['id']);
$stmt->execute();
$result = $stmt->get_result();
$resultCheck = $result->num_rows;

?>
<div id="Friends">
  <h4>My Friends <a href='/Friends.aspx?UserID=<?php echo $_USER['id']; ?>'>See all <?php echo $resultCheck; ?></a> (<a href='My/EditFriends.aspx'>Edit</a>)</h4>
    
  <table id="ctl00_cphRoblox_rbxFriendsPane_dlFriends" cellspacing="0" align="Center" border="0" style="border-collapse:collapse;">
    <tr>
        
<?php
$counter = 0;

if ($resultCheck > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($counter >= 6) {
            break; // Stop after 6 friends
        }

        if ($row['sent_from'] == $_USER['id']) {
            $friendid = $row['sent_to'];
        } else {
            $friendid = $row['sent_from'];
        }

        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i", $friendid);
        $stmt->execute();
        $creatorq = $stmt->get_result();
        $creator = $creatorq->fetch_assoc();
        $stmt->close();

        if (!$creator) continue;
?>

<td>
    <div class="Friend">
        <div class="Avatar">
            <a title="<?php echo htmlspecialchars($creator['username']); ?>" href="/User.aspx?ID=<?php echo $creator['id']; ?>" style="display:inline-block;height:100px;width:100px;cursor:pointer;">
                <img width="100" height="100" src="/Thumbs/Avatar.ashx?id=<?php echo $creator['id']; ?>&v=<?php echo rand(1, 9999); ?>" border="0" alt="<?php echo htmlspecialchars($creator['username']); ?>" />
            </a>
        </div>
        <div class="Summary">
            <span class="OnlineStatus">
                <img 
                    src="images/OnlineStatusIndicator_Is<?php 
                        echo ($creator['lastseen'] + 300 >= time()) ? 'Online' : 'Offline'; 
                    ?>.gif"
                    alt="<?php 
                        echo $creator['username'] . ' is ';
                        echo ($creator['lastseen'] + 300 >= time()) 
                            ? 'online' 
                            : 'offline (last seen at ' . date('d/m/Y g:i A', (int)$creator['lastseen']) . ')';
                    ?>" 
                    style="border-width:0px;" 
                />
            </span>
            <span class="Name">
                <a href="User.aspx?ID=<?php echo $creator['id']; ?>">
                    <?php echo htmlspecialchars($creator['username']); ?>
                </a>
            </span>
        </div>
    </div>
</td>

<?php
        $counter++;

        if ($counter % 3 == 0) {
            echo "</tr><tr>";
        }
    }
}
?>  
    </tr>
  </table>
  
</div>
    <style>
fix {
    display: table-cell;
    vertical-align: inherit;
}
</style></div>
      </div>
      
      <div id="UserContainer">
      
      <div id="FavoritesPane" style="clear: right; margin: 10px 0 0 0; border: solid 1px #000;">
        <div>
        <div id="Favorites">
          <h4>Favorites</h4>
          <div id="FavoritesContent"></div>
          <div class="PanelFooter">
            Category:&nbsp;
            <select id="FavCategories">
              <option value="7">Heads</option>
              <option value="8">Faces</option>
              <option value="2">T-Shirts</option>
              <option value="5">Shirts</option>
              <option value="6">Pants</option>
              <option value="1">Hats</option>
              <option value="4">Decals</option>
              <option value="3">Models</option>
              <option selected="selected" value="0">Places</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br />

  </div>
  
<?php 

$sql = "SELECT * FROM friends WHERE sent_to = ? AND pending = 'pending'";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_USER['id']);
$stmt->execute();

$result = $stmt->get_result();
$resultCheck = $result->num_rows;

if ($resultCheck > 0) {
?>


  
      <div id="ctl00_cphRoblox_pFriends">
  
        <div id="FriendsPane">
        
<div id="Friends">
<center><h4>Friend Requests (<?php echo $resultCheck; ?>)</h4></center></span>
<center>
	<table id="ctl00_cphRoblox_rbxFriendRequestsPane_dlFriendRequests" cellspacing="0" border="0" style="border-collapse:collapse;">
		<tr>
		 <?php
              
            if ($resultCheck > 0) {
                while ($row = $result->fetch_assoc()) {
                  $stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
                  $stmt->bind_param("i", $row['sent_from']);
                  $stmt->execute();
                  $creatorq = $stmt->get_result();
                  $creator = $creatorq->fetch_assoc();
                  
                  $datemade = $row["date_created"];
                  
        ?>
		<td>
			<div class="Friend">
				<div class="Avatar"><a id="ctl00_cphRoblox_rbxFriendRequestsPane_dlFriendRequests_ctl01_hlAvatar" title="<?php echo $creator['username']; ?>" href="/My/FriendInvitation.aspx?InvitationID=<?php echo $row['id']; ?>" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img width="100" height="100" src="/Thumbs/Avatar.ashx?id=<?php echo $creator['id']; ?>&v=<?php echo rand(1,9999); ?>" border="0" id="img" alt="<?php echo $creator['username']; ?>" /></a></div>
				<div class="Summary">
					<span class="OnlineStatus"><img id="ctl00_cphRoblox_rbxFriendRequestsPane_dlFriendRequests_ctl01_iOnlineStatus" src="images/OnlineStatusIndicator_Is<?php if($creator['lastseen'] + 300 >= time()){ echo 'Online'; }else { echo 'Offline'; } ?>.gif" alt="<?php echo $creator['username']; ?> is <?php if($creator['lastseen'] + 300 >= time()){ echo 'online'; }else { echo 'offline'; } ?>" style="border-width:0px;" /></span>
					<span class="Name"><a id="ctl00_cphRoblox_rbxFriendRequestsPane_dlFriendRequests_ctl01_hlRequester" title="Click to view this invitation." href="My/FriendInvitation.aspx?InvitationID=<?php echo $row['id']; ?>"><?php echo $creator['username']; ?></a></span>
				</div>
			</div>
		</td>
<?php } } ?>
		</tr>
	</table>
</center>
	
</div>
<center>
<div id="ctl00_cphRoblox_rbxFriendRequestsPane_PopupMenu" class="PopupMenu">
		
    <a id="ctl00_cphRoblox_rbxFriendRequestsPane_AcceptAllLinkButton" class="Button" href="/api/acceptall.ashx">Accept All</a>
    <a id="ctl00_cphRoblox_rbxFriendRequestsPane_DeclineAllLinkButton" class="Button" href="/api/declineall.ashx">Decline All</a>

	</div>
</center>


			</div>
</div>
<?php } ?>
  
  
    <div id="ctl00_cphRoblox_pUserAssets">
  
      <div id="UserAssetsPane">
        <div id="ctl00_cphRoblox_rbxUserAssetsPane_upUserAssetsPane">
    
    <div id="UserAssets">
      <h4>Stuff</h4>
      <div id="AssetsMenu">
          <?php
          $categories = [
    "2"  => "tshirt",
    "11" => "shirt",
    "12" => "pants",
    "8"  => "hat",
    "13" => "decal",
    "10" => "model",
    "9"  => "place"
];

$catagory = isset($_GET["c"]) ? htmlspecialchars($_GET["c"]) : "8";
$currentCategory = $categories[$catagory];
?>
        
            <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl00_AssetCategorySelectorPanel" class="AssetsMenuItem">
    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl00_AssetCategorySelector" class="AssetsMenuButton" href="User.aspx?c=2">T-Shirts</a>
  </div>
          
            <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl01_AssetCategorySelectorPanel" class="AssetsMenuItem">
    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl01_AssetCategorySelector" class="AssetsMenuButton" href="User.aspx?c=11">Shirts</a>
  </div>
          
            <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl02_AssetCategorySelectorPanel" class="AssetsMenuItem">
    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl02_AssetCategorySelector" class="AssetsMenuButton" href="User.aspx?c=12">Pants</a>
  </div>
          
            <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl03_AssetCategorySelectorPanel" class="AssetsMenuItem_Selected">
    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl03_AssetCategorySelector" class="AssetsMenuButton_Selected" href="User.aspx?c=8">Hats</a>
  </div>
          
            <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl04_AssetCategorySelectorPanel" class="AssetsMenuItem">
    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl04_AssetCategorySelector" class="AssetsMenuButton" href="User.aspx?c=13">Decals</a>
  </div>
          
            <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl05_AssetCategorySelectorPanel" class="AssetsMenuItem">
    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl05_AssetCategorySelector" class="AssetsMenuButton" href="User.aspx?c=10">Models</a>
  </div>
          
            <div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl06_AssetCategorySelectorPanel" class="AssetsMenuItem">
    <a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl06_AssetCategorySelector" class="AssetsMenuButton" href="User.aspx?c=9">Places</a>
  </div>
          
      </div>
      <div id="AssetsContent">
        
        <table id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList" cellspacing="0" border="0" style="border-collapse:collapse;">
      <tr>
<?php 

//echo $currentCategory;

$sql = "SELECT * FROM owneditems WHERE type = ? AND user = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("si", $currentCategory, $_USER['id']);
$stmt->execute();
$result121212 = $stmt->get_result();

while ($row = $result121212->fetch_assoc()) {
    $sql = "SELECT * FROM catalog WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $row['item']);
    $stmt->execute();
    $catalogq = $stmt->get_result();
    $catalog = $catalogq->fetch_assoc();
    
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $catalog['creator']);
    $stmt->execute();
    $creatorq = $stmt->get_result();
    $creator = $creatorq->fetch_assoc();
?>
        <td class="Asset" valign="top">
              <div style="padding:5px">
            <div class="AssetThumbnail">
              <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetThumbnailHyperLink" title="<?php echo $catalog['name']; ?>" href="/Item.aspx?ID=<?php echo $catalog['id']; ?>&amp;UserAssetID=641607" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="/Thumbs/Item.aspx?id=<?php echo $catalog['id']; ?>" border="0" id="img" alt="<?php echo $catalog['name']; ?>" /></a>
            </div>
            <div class="AssetDetails">
              <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetNameHyperLink" href="/Item.aspx?ID=<?php echo $catalog['id']; ?>&amp;UserAssetID=641607"><?php echo $catalog['name']; ?></a></div>
              <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_GameCreatorHyperLink" href="/User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
              
                
            </div>
          </td>
<?php } ?>
              
                
            </div>
          </td><td></td><td></td><td></td>
      </tr>
    </table>
        
      </div>
      <div style="clear:both;"></div>
    </div>
  
  </div>
      </div>
    
</div>
  </div>
  

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>