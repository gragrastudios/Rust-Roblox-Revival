<?php
$id = isset($_GET['ID']) ? (int)$_GET['ID'] : 0;

if ($id === 0) {
    if ($loggedin === 'no') {
        header('Location: /Login/Default.aspx');
        exit();
    }

    require($_SERVER['DOCUMENT_ROOT'] . '/My/home.php');
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/main/navbar.php');

$stmt = $link->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    header('Location: /Error/DoesntExist.aspx');
    exit();
}
?>
			<div id="Body">
					
	
	<div id="UserContainer">
		<div id="LeftBank">
			<div id="ProfilePane">
				
<table width="100%" bgcolor="lightsteelblue" cellpadding="6" cellspacing="0">
    <tr>
        <td>
            <span id="ctl00_cphRoblox_rbxUserPane_lUserName" class="Title"><?php echo htmlspecialchars($user['username']); ?></span><br/>
            <span id="ctl00_cphRoblox_rbxUserPane_lUserOnlineStatus" class="User<?php if($user['lastseen'] + 300 >= time()){ echo 'Online'; }else { echo 'Offline'; } ?>Message">[ <?php if($user['lastseen'] + 300 >= time()){ echo 'Online: Website'; }else { echo 'Offline'; } ?> ]</span>
        </td>
    </tr>
    <tr>
        <td>
            <span id="ctl00_cphRoblox_rbxUserPane_lUserRobloxURL"><?php echo htmlspecialchars($user['username']); ?>'s <?php echo $sitename; ?>:</span><br/>
            <a id="ctl00_cphRoblox_rbxUserPane_hlUserRobloxURL" href="User.aspx?ID=<?php echo $user['id']; ?>">https://<?php echo $sitelink; ?>/User.aspx?ID=<?php echo $user['id']; ?></a><br/>
            <br/>
            <div style="left: 0px; float: left; position: relative; top: 0px">
                <a id="ctl00_cphRoblox_rbxUserPane_Image1" disabled="disabled" title="<?php echo htmlspecialchars ($user['username']); ?>" onclick="return false" style="display:inline-block;"><img src="/Thumbs/Avatar.ashx?id=<?php echo $user['id']; ?>&rand=<?php echo rand(1,9999); ?>" width="190" height="190" border="0" alt="<?php echo htmlspecialchars($user['username']); ?>" blankurl="http://t7.roblox.com:80/blank-180x220.gif"/></a><br/>
                <div id="ctl00_cphRoblox_rbxUserPane_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
	
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_rbxUserPane_AbuseReportButton1_ReportAbuseIconHyperLink" href="AbuseReport/UserProfile.aspx?userID=<?php echo $user['id']; ?>"><img src="/images/abuse.png" alt="Report Abuse" border="0"/></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_rbxUserPane_AbuseReportButton1_ReportAbuseTextHyperLink" href="AbuseReport/UserProfile.aspx?userID=<?php echo $user['id']; ?>">Report Abuse</a></span>

</div>
            </div>
            
            

<p><?php if($loggedin == 'yes') { ?><a href="/My/PrivateMessage.aspx?RecipientID=<?php echo $user['id']; ?>">Send Message</a><?php } ?></p>
<p><?php if($loggedin == 'yes') { ?><a href="/My/FriendInvitation.aspx?RecipientID=<?php echo $user['id']; ?>">Send Friend Request</a><?php } ?></p>
<p><span id="ctl00_cphRoblox_rbxUserPane_rbxPublicUser_lBlurb"><?php echo htmlspecialchars($user['description']); ?></span></p>
        </td>
    </tr>
</table>
    <?php
    if ($user['buildersclub'] == '1') {
    $timestamp = strtotime($user['bcexpire']);
    $date = date('m/d/Y', $timestamp);
    ?>
    <div class="Header">
        <h4 style="font-size: small;">Builders Club Member until <?php echo $date; ?></h4>
    </div>
    <?php
    }
    ?>
			</div>
			<div id="UserBadgesPane">
				

<div id="UserBadges">
	<h4><a id="ctl00_cphRoblox_rbxUserBadgesPane_hlHeader" href="Badges.aspx">Badges</a></h4>
	<table id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges" cellspacing="0" align="Center" border="0">
	<tr>
		<td>
			<div class="Badge">
				<div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_iBadge" src="/images/Badges/Homestead-70x75.jpg" alt="The homestead badge is earned by having your personal place visited 100 times. Players who achieve this have demonstrated their ability to build cool things that other Robloxians were interested enough in to check out. Get a jump-start on earning this reward by inviting people to come visit your place." height="75" border="0"/></a></div>
				<div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl00_HyperLink1" href="Badges.aspx">Homestead</a></div>
			</div>
		</td><td>
			<div class="Badge">
				<div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl01_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl01_iBadge" src="/images/Badges/Bricksmith-54x75.jpg" alt="The Bricksmith badge is earned by having a popular personal place. Once your place has been visited 1000 times, you will receive this award. Robloxians with Bricksmith badges are accomplished builders who were able to create a place that people wanted to explore a thousand times. They no doubt know a thing or two about putting bricks together." height="75" border="0"/></a></div>
				<div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl01_HyperLink1" href="Badges.aspx">Bricksmith</a></div>
			</div>
		</td><td>
			<div class="Badge">
				<div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl02_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl02_iBadge" src="/images/Badges/CombatInitiation-75x75.jpg" alt="This badge is given to any player who has proven his or her combat abilities by accumulating 10 victories in battle. Players who have this badge are not complete newbies and probably know how to handle their weapons." height="75" border="0"/></a></div>
				<div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl02_HyperLink1" href="Badges.aspx">Combat Initiation</a></div>
			</div>
		</td><td>
			<div class="Badge">
				<div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl03_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl03_iBadge" src="/images/Badges/Veteran-75x75.png" alt="This decoration is awarded to all citizens who have played ROBLOX for at least a year. It recognizes stalwart community members who have stuck with us over countless releases and have helped shape ROBLOX into the game that it is today. These medalists are the true steel, the core of the Robloxian history ... and its future." height="75" border="0"/></a></div>
				<div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl03_HyperLink1" href="Badges.aspx">Veteran</a></div>
			</div>
		</td>
	</tr><tr>
		<td>
			<div class="Badge">
				<div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl04_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl04_iBadge" src="/images/Badges/Warrior-75x75.jpg" alt="This badge is given to the warriors of Robloxia, who have time and time again overwhelmed their foes in battle. To earn this badge, you must rack up 100 knockouts. Anyone with this badge knows what to do in a fight!" height="75" border="0"/></a></div>
				<div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl04_HyperLink1" href="Badges.aspx">Warrior</a></div>
			</div>
		</td><td>
			<div class="Badge">
				<div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl05_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl05_iBadge" src="/images/Badges/Friendship-75x75.jpg" alt="This badge is given to players who have embraced the Roblox community and have made at least 20 friends. People who have this badge are good people to know and can probably help you out if you are having trouble." height="75" border="0"/></a></div>
				<div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl05_HyperLink1" href="Badges.aspx">Friendship</a></div>
			</div>
		</td><td>
			<div class="Badge">
				<div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl06_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl06_iBadge" src="/images/Badges/BuildersClub-75x75.png" alt="Members of the illustrious Builders Club display this badge proudly. The Builders Club is a paid premium service. Members receive several benefits: they get ten places on their account instead of one, they earn a daily income of 15 ROBUX, they can sell their creations to others in the ROBLOX Catalog, they get the ability to browse the web site without external ads, and they receive the exclusive Builders Club construction hat." height="75" border="0"/></a></div>
				<div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl06_HyperLink1" href="Badges.aspx">Builders Club</a></div>
			</div>
		</td><td>
			<div class="Badge">
				<div class="BadgeImage"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl07_hlHeader" href="Badges.aspx"><img id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl07_iBadge" src="/images/Badges/Bloxxer-75x75.jpg" alt="Anyone who has earned this badge is a very dangerous player indeed. Those Robloxians who excel at combat can one day hope to achieve this honor, the Bloxxer Badge. It is given to the warrior who has bloxxed at least 250 enemies and who has tasted victory more times than he or she has suffered defeat. Salute!" height="75" border="0"/></a></div>
				<div class="BadgeLabel"><a id="ctl00_cphRoblox_rbxUserBadgesPane_dlBadges_ctl07_HyperLink1" href="Badges.aspx">Bloxxer</a></div>
			</div>
		</td>
	</tr>
</table>
	
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
			<div id="UserPlacesPane">
				
<div id="UserPlaces">
    <h4>Showcase</h4>
    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion">
	<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ShowcasePlacesAccordion_AccordionExtender_ClientState" id="ctl00_cphRoblox_rbxUserPlacesPane_ShowcasePlacesAccordion_AccordionExtender_ClientState" value="0"/><div class="AccordionHeader">
		
			Crossroads
        
	</div><div style="display:block;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl02$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_lStatistics">Visited 33,806 times (1,651 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl02_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Crossroads" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=1818" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t1.roblox.com:80/3a8d03f28257426014ddb257897584e2" border="0" alt="Crossroads"/></a>
    </div>
    
    
</div>
			
		
	</div><div class="AccordionHeader">
		
			Community Construction
        
	</div><div style="display:none;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/web/20080711054342im_/http://www.roblox.com/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl05$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_lStatistics">Visited 12,607 times (420 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl05_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Community Construction" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=3271" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t0.roblox.com:80/Place-420x230-90b1f18c580b2d85c1f640abd07de36d.Png" border="0" alt="Community Construction"/></a>
    </div>
    
    
</div>
			
		
	</div><div class="AccordionHeader">
		
			Chaos Canyon
        
	</div><div style="display:none;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/web/20080711054342im_/http://www.roblox.com/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl08$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_lStatistics">Visited 13,128 times (382 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl08_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Chaos Canyon" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=14403" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t2.roblox.com:80/Place-420x230-c1b0bc79177b66797cb0347e4d5cd3db.Png" border="0" alt="Chaos Canyon"/></a>
    </div>
    
    
</div>
			
		
	</div><div class="AccordionHeader">
		
			Santa's Winter Stronghold
        
	</div><div style="display:none;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/web/20080711054342im_/http://www.roblox.com/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl11$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_lStatistics">Visited 26,081 times (965 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl11_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Santa's Winter Stronghold" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=23522" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t0.roblox.com:80/Place-420x230-cb32fac3de6a36ff29e11ade62d79f0f.Png" border="0" alt="Santa's Winter Stronghold"/></a>
    </div>
    
    
</div>
			
		
	</div><div class="AccordionHeader">
		
			Rocket Arena
        
	</div><div style="display:none;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/web/20080711054342im_/http://www.roblox.com/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl14$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_lStatistics">Visited 42,567 times (1,405 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Rocket Arena" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=25415" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t5.roblox.com:80/2f3e0f5d5f8dc630609f2d623b4fcabf" border="0" alt="Rocket Arena"/></a>
    </div>
    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_pDescription">
			
        <div class="Description">
            <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl14_rbxPlatform_lDescription">This map goes back to the basics: rockets, jetboots, and blowing up bridges. Out-maneuver your foes using your jetboots, cut off their escape by nuking the bridges, and rain doom down upon them using a rapid-fire rocket launcher. But don't fall in the lava - ouch!</span>
        </div>
    
		</div>
    
</div>
			
		
	</div><div class="AccordionHeader">
		
			Haunted Mansion
        
	</div><div style="display:none;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/web/20080711054342im_/http://www.roblox.com/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl17$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_lStatistics">Visited 15,556 times (705 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl17_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Haunted Mansion" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=28522" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t2.roblox.com:80/Place-420x230-80e086305104ab72cbb17ed82b6db026.Png" border="0" alt="Haunted Mansion"/></a>
    </div>
    
    
</div>
			
		
	</div><div class="AccordionHeader">
		
			Glass Houses
        
	</div><div style="display:none;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/web/20080711054342im_/http://www.roblox.com/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl20$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_lStatistics">Visited 25,982 times (838 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl20_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Glass Houses" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=33913" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t5.roblox.com:80/Place-420x230-63d6c91416f29d9a14294ed73045bc80.Png" border="0" alt="Glass Houses"/></a>
    </div>
    
    
</div>
			
		
	</div><div class="AccordionHeader">
		
			Happy Home in Robloxia
        
	</div><div style="display:none;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/web/20080711054342im_/http://www.roblox.com/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl23$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_lStatistics">Visited 7,189 times (335 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Happy Home in Robloxia" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=65033" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t5.roblox.com:80/Place-420x230-a2450b0aa54744d7ab199b4ee96f1fc5.Png" border="0" alt="Happy Home in Robloxia"/></a>
    </div>
    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_pDescription">
			
        <div class="Description">
            <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl23_rbxPlatform_lDescription">A nice peaceful starting place with a house and some bricks to build with.</span>
        </div>
    
		</div>
    
</div>
			
		
	</div><div class="AccordionHeader">
		
			Empty Baseplate
        
	</div><div style="display:none;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/web/20080711054342im_/http://www.roblox.com/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl26$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_lStatistics">Visited 15,450 times (1,089 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Empty Baseplate" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=65036" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t2.roblox.com:80/Place-420x230-a67675f3c46d54fa166edaf4e2e8d6e2.Png" border="0" alt="Empty Baseplate"/></a>
    </div>
    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_pDescription">
			
        <div class="Description">
            <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl26_rbxPlatform_lDescription">Tabula Rasa.</span>
        </div>
    
		</div>
    
</div>
			
		
	</div><div class="AccordionHeader">
		
			Starting BrickBattle Map
        
	</div><div style="display:none;">
		
			

<div class="Place">
    <div class="PlayStatus">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Locked" src="/web/20080711054342im_/http://www.roblox.com/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxPlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxPlaceAccessIndicator_iFriendsOnly_Unlocked" src="/web/20080711054342im_/http://www.roblox.com/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxPlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxPlaceAccessIndicator_iPublic" src="/web/20080711054342im_/http://www.roblox.com/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

    </div>
    <div class="PlayOptions">
        
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="display: none">
			
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_Image1" src="/web/20080711054342im_/http://www.roblox.com/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
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
            <input id="Cancel" type="button" class="Button" value="Cancel"/></div>
    </div>

		</div>
<input type="hidden" name="ctl00$cphRoblox$rbxUserPlacesPane$ctl29$rbxPlatform$rbxVisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxVisitButtons_rbxPlaceLauncher_HiddenField1"/>


<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxVisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxVisitButtons_hlMultiplayerVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxVisitButtons_VisitButton" style="display:inline">
	&nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxVisitButtons_hlSoloVisit" class="Button" onclick="window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.roblox.com%2fUser.aspx%3fID%3d1'; return false;">Visit Solo</button>
</div>

    </div>
    <div class="Statistics">
        <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_lStatistics">Visited 5,801 times (315 last week)</span></div>
    <div class="Thumbnail">
        <a id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_rbxPlaceThumbnail" disabled="disabled" title="Starting BrickBattle Map" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=68911" style="display:inline-block;"><img src="https://web.archive.org/web/20080711054342im_/http://t7.roblox.com:80/Place-420x230-d573a1bb3ee3bc14f535026e8c234671.Png" border="0" alt="Starting BrickBattle Map"/></a>
    </div>
    <div id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_pDescription">
			
        <div class="Description">
            <span id="ctl00_cphRoblox_rbxUserPlacesPane_ctl29_rbxPlatform_lDescription">A basic map with weapons, teams, and the leaderboard. Use this as a base to build BrickBattle maps. This map is still pretty empty - add your own scenery to personalize your battles!</span>
        </div>
    
		</div>
    
</div>
			
		
	</div>
</div>
	
 </div>
			</div>
			<div id="FriendsPane">
				
<?php 

//$sql = "SELECT * FROM friends WHERE (`sent_from` = {$user['id']} AND `pending`='accepted') OR  (`sent_to` = {$user['id']} AND `pending`='accepted') LIMIT 6;";
//$result = mysqli_query($link, $sql);
//$resultCheck = mysqli_num_rows($result);

$stmt = $link->prepare("
    SELECT * FROM friends 
    WHERE 
        (`sent_from` = ? AND `pending` = 'accepted') 
        OR 
        (`sent_to` = ? AND `pending` = 'accepted') 
    LIMIT 6
");
$stmt->bind_param("ii", $user['id'], $user['id']);
$stmt->execute();
$result = $stmt->get_result();
$resultCheck = $result->num_rows;


?>
<div id="Friends">
	<h4><?php echo $user['username']; ?>'s Friends <a href="Friends.aspx?UserID=<?php echo $user['id']; ?>">See all</a></h4>
    
	<table id="ctl00_cphRoblox_rbxFriendsPane_dlFriends" cellspacing="0" align="Center" border="0">
<tr>
<?php
$counter = 0;

if ($resultCheck > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($counter >= 6) break;

        $friendid = ($row['sent_from'] == $user['id']) ? $row['sent_to'] : $row['sent_from'];

        $stmt = $link->prepare("SELECT * FROM users WHERE id = ?");
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
                        <img width="100" height="100" src="/Thumbs/Avatar.ashx?id=<?php echo $creator['id']; ?>&v=<?php echo rand(1,9999); ?>" border="0" alt="<?php echo htmlspecialchars($creator['username']); ?>" />
                    </a>
                </div>
                <div class="Summary">
                    <span class="OnlineStatus">
                        <img 
                            src="images/OnlineStatusIndicator_Is<?php echo ($creator['lastseen'] + 300 >= time()) ? 'Online' : 'Offline'; ?>.gif" 
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
                        <a href="User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo htmlspecialchars($creator['username']); ?></a>
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

    if ($counter % 3 !== 0) {
        echo "</tr>";
    }
} else {
    echo '</tr></table>';
    echo '<p>This user doesn’t have any ' . htmlspecialchars($sitename) . ' friends.</p>';
}
?>
</table>

	
</div>
			</div>
			<div id="FavoritesPane">
			    <div id="ctl00_cphRoblox_rbxFavoritesPane_FavoritesPane">
	
		<div id="Favorites">
			<h4>Favorites</h4>
			<div id="FavoritesContent">
				
				
				<div id="ctl00_cphRoblox_rbxFavoritesPane_NoResultsPanel" class="NoResults">
		
				    <span id="ctl00_cphRoblox_rbxFavoritesPane_NoResultsLabel" class="NoResults"><?php echo $user['username']; ?> has not chosen any favorite places.</span>
				
	</div>
				
			</div>
			<div class="PanelFooter">
			    Category:&nbsp;
			    <select name="ctl00$cphRoblox$rbxFavoritesPane$AssetCategoryDropDownList" id="ctl00_cphRoblox_rbxFavoritesPane_AssetCategoryDropDownList">
		<option value="2">T-Shirts</option>
		<option value="11">Shirts</option>
		<option value="12">Pants</option>
		<option value="8">Hats</option>
		<option value="13">Decals</option>
		<option value="10">Models</option>
		<option selected="selected" value="9">Places</option>

	</select>
			</div>
		</div>
	
</div>
			</div>
			  <br />

		</div>
		
		
		<div id="UserAssetsPane">
			<div id="ctl00_cphRoblox_rbxUserAssetsPane_upUserAssetsPane">
	
		<div id="UserAssets">
			<h4>Stuff</h4>
			<div id="AssetsMenu">
				
						<div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl00_AssetCategorySelectorPanel" class="AssetsMenuItem">
		<a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl00_AssetCategorySelector" class="AssetsMenuButton" href="javascript:__doPostBack('ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl00$AssetCategorySelector','')">T-Shirts</a>
	</div>
					
						<div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl01_AssetCategorySelectorPanel" class="AssetsMenuItem">
		<a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl01_AssetCategorySelector" class="AssetsMenuButton" href="javascript:__doPostBack('ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl01$AssetCategorySelector','')">Shirts</a>
	</div>
					
						<div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl02_AssetCategorySelectorPanel" class="AssetsMenuItem">
		<a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl02_AssetCategorySelector" class="AssetsMenuButton" href="javascript:__doPostBack('ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl02$AssetCategorySelector','')">Pants</a>
	</div>
					
						<div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl03_AssetCategorySelectorPanel" class="AssetsMenuItem_Selected">
		<a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl03_AssetCategorySelector" class="AssetsMenuButton_Selected" href="javascript:__doPostBack('ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl03$AssetCategorySelector','')">Hats</a>
	</div>
					
						<div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl04_AssetCategorySelectorPanel" class="AssetsMenuItem">
		<a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl04_AssetCategorySelector" class="AssetsMenuButton" href="javascript:__doPostBack('ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl04$AssetCategorySelector','')">Decals</a>
	</div>
					
						<div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl05_AssetCategorySelectorPanel" class="AssetsMenuItem">
		<a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl05_AssetCategorySelector" class="AssetsMenuButton" href="javascript:__doPostBack('ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl05$AssetCategorySelector','')">Models</a>
	</div>
					
						<div id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl06_AssetCategorySelectorPanel" class="AssetsMenuItem">
		<a id="ctl00_cphRoblox_rbxUserAssetsPane_AssetCategoryRepeater_ctl06_AssetCategorySelector" class="AssetsMenuButton" href="javascript:__doPostBack('ctl00$cphRoblox$rbxUserAssetsPane$AssetCategoryRepeater$ctl06$AssetCategorySelector','')">Places</a>
	</div>
					
			</div>
			<div id="AssetsContent">
				
				<table id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList" cellspacing="0" border="0">
		<tr>
			<td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetThumbnailHyperLink" title="The Golden Robloxian" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=2799053&amp;UserAssetID=5772015" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t5.roblox.com:80/16a5746199819bd70e25b72758332bb9" border="0" alt="The Golden Robloxian" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetNameHyperLink" href="Item.aspx?ID=2799053&amp;UserAssetID=5772015">The Golden Robloxian</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl00_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl01_AssetThumbnailHyperLink" title="USA Baseball Cap" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=2715685&amp;UserAssetID=5478914" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t1.roblox.com:80/3e70da4334f771ff04d975a4c8b170d8" border="0" alt="USA Baseball Cap" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl01_AssetNameHyperLink" href="Item.aspx?ID=2715685&amp;UserAssetID=5478914">USA Baseball Cap</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl01_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl02_AssetThumbnailHyperLink" title="Uncle Sam's Hat" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=2711557&amp;UserAssetID=5465096" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t3.roblox.com:80/4d031491cd83927bb2ed75f9d84b2675" border="0" alt="Uncle Sam's Hat" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl02_AssetNameHyperLink" href="Item.aspx?ID=2711557&amp;UserAssetID=5465096">Uncle Sam's Hat</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl02_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl03_AssetThumbnailHyperLink" title="The Lolcat Bible" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=2708252&amp;UserAssetID=5453672" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t4.roblox.com:80/0143ce6703d90f0e8d38b00a017b1688" border="0" alt="The Lolcat Bible" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl03_AssetNameHyperLink" href="Item.aspx?ID=2708252&amp;UserAssetID=5453672">The Lolcat Bible</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl03_AssetCreatorHyperLink" href="User.aspx?ID=19358">clockwork</a></span></div>
							    
						        
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl04_AssetThumbnailHyperLink" title="The Crown of Warlords" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=2264398&amp;UserAssetID=3972783" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t1.roblox.com:80/490182ba74bad7086dda0e975a217444" border="0" alt="The Crown of Warlords" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl04_AssetNameHyperLink" href="Item.aspx?ID=2264398&amp;UserAssetID=3972783">The Crown of Warlords</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl04_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        <div class="AssetPrice"><span class="PriceInTickets">Tx: 50,000</span></div>
						    </div>
						</div>
					</td>
		</tr><tr>
			<td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl05_AssetThumbnailHyperLink" title="Security Camera" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=2093290&amp;UserAssetID=3425433" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t1.roblox.com:80/d46e83c925257b00ad35d79a99e4d9f3" border="0" alt="Security Camera" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl05_AssetNameHyperLink" href="Item.aspx?ID=2093290&amp;UserAssetID=3425433">Security Camera</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl05_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetThumbnailHyperLink" title="PhD Hat" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=2062347&amp;UserAssetID=3333907" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t2.roblox.com:80/8b8800b29f6a85e932805e047b597f65" border="0" alt="PhD Hat" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetNameHyperLink" href="Item.aspx?ID=2062347&amp;UserAssetID=3333907">PhD Hat</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl06_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        <div class="AssetPrice"><span class="PriceInTickets">Tx: 60</span></div>
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl07_AssetThumbnailHyperLink" title="Teddy Bear Hat" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=1861997&amp;UserAssetID=2724362" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t4.roblox.com:80/aaa8aa76ce67c334a723f9575d342ded" border="0" alt="Teddy Bear Hat" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl07_AssetNameHyperLink" href="Item.aspx?ID=1861997&amp;UserAssetID=2724362">Teddy Bear Hat</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl07_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        <div class="AssetPrice"><span class="PriceInTickets">Tx: 10,000</span></div>
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl08_AssetThumbnailHyperLink" title="Party Hat" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=1779045&amp;UserAssetID=2492184" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t6.roblox.com:80/d272c49d80bccc1ff96ef6582e33a9c3" border="0" alt="Party Hat" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl08_AssetNameHyperLink" href="Item.aspx?ID=1779045&amp;UserAssetID=2492184">Party Hat</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl08_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl09_AssetThumbnailHyperLink" title="Mining Helmet" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=1609609&amp;UserAssetID=2070764" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t7.roblox.com:80/4cd08551c47d1eb10ef6bd4355fea986" border="0" alt="Mining Helmet" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl09_AssetNameHyperLink" href="Item.aspx?ID=1609609&amp;UserAssetID=2070764">Mining Helmet</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl09_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        
						    </div>
						</div>
					</td>
		</tr><tr>
			<td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl10_AssetThumbnailHyperLink" title="Golden Teapot of Pwnage" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=1594180&amp;UserAssetID=2032738" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t5.roblox.com:80/fe13a18ae5c2663b74f31ae876ab91c8" border="0" alt="Golden Teapot of Pwnage" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl10_AssetNameHyperLink" href="Item.aspx?ID=1594180&amp;UserAssetID=2032738">Golden Teapot of Pwnage</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl10_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        <div class="AssetPrice"><span class="PriceInTickets">Tx: 13,337</span></div>
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl11_AssetThumbnailHyperLink" title="Football Helmet" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=1590045&amp;UserAssetID=1447831" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t2.roblox.com:80/c4eb0a3d7df48e0a5cab326318ed23db" border="0" alt="Football Helmet" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl11_AssetNameHyperLink" href="Item.aspx?ID=1590045&amp;UserAssetID=1447831">Football Helmet</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl11_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        <div class="AssetPrice"><span class="PriceInTickets">Tx: 102</span></div>
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl12_AssetThumbnailHyperLink" title="Ushanka" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=1569260&amp;UserAssetID=1400985" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t7.roblox.com:80/5de0f47cbc60df9298207729683f20d9" border="0" alt="Ushanka" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl12_AssetNameHyperLink" href="Item.aspx?ID=1569260&amp;UserAssetID=1400985">Ushanka</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl12_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    <div class="AssetPrice"><span class="PriceInRobux">R$: 89</span></div>
						        
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl13_AssetThumbnailHyperLink" title="Verified Sign" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=1567446&amp;UserAssetID=1396101" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t2.roblox.com:80/9bfab0b9a6dc1d902ed7ce8b05791781" border="0" alt="Verified Sign" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl13_AssetNameHyperLink" href="Item.aspx?ID=1567446&amp;UserAssetID=1396101">Verified Sign</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl13_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    
						        
						    </div>
						</div>
					</td><td class="Asset" valign="top">
					    <div style="padding:5px">
						    <div class="AssetThumbnail">
							    <a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl14_AssetThumbnailHyperLink" title="Green Banded Top Hat" href="/web/20080711054342/http://www.roblox.com/Item.aspx?ID=1563352&amp;UserAssetID=1386484" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711054342im_/http://t1.roblox.com:80/09caf06f2604da1c78ab56ed30a6eb01" border="0" alt="Green Banded Top Hat" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
						    </div>
						    <div class="AssetDetails">
							    <div class="AssetName"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl14_AssetNameHyperLink" href="Item.aspx?ID=1563352&amp;UserAssetID=1386484">Green Banded Top Hat</a></div>
							    <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxUserAssetsPane_UserAssetsDataList_ctl14_AssetCreatorHyperLink" href="User.aspx?ID=1">ROBLOX</a></span></div>
							    <div class="AssetPrice"><span class="PriceInRobux">R$: 3,000</span></div>
						        
						    </div>
						</div>
					</td>
		</tr>
	</table>
				<div id="ctl00_cphRoblox_rbxUserAssetsPane_FooterPagerPanel" class="FooterPager">
					
					<span id="ctl00_cphRoblox_rbxUserAssetsPane_FooterPagerLabel">Page 1 of 12</span>
					<a id="ctl00_cphRoblox_rbxUserAssetsPane_FooterPageSelector_Next" href="javascript:__doPostBack('ctl00$cphRoblox$rbxUserAssetsPane$FooterPageSelector_Next','')">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
				</div>
			</div>
			<div style="clear:both;"></div>
		</div>
	
</div>
		</div>
	</div>
	

				</div>
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/main/footer.php');
?>