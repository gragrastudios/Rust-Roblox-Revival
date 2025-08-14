<?php 

require('config.php'); 

if($loggedin == 'yes') {
    if($_USER['bantype'] !== 'None'){
        header("Location: /Membership/NotApproved.aspx");
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" id="www-roblox-com">
<title>
  <?=$sitename?>: A FREE Virtual World-Building Game with Avatar Chat, 3D Environments, and Physics
</title><link id="ctl00_Imports" rel="stylesheet" type="text/css" href="/CSS/AllCSS.css?v=<?php echo rand(1,9999); ?>"/><link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico"/>
            </script>
<script src="/ScriptResource.axd" type="text/javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/CSS/Tabs.css?v=<?php echo rand(1,9999); ?>" />
    <script src="/CSS/Tabs.js" type="text/javascript"></script>
        </head>
  <body>

<?php if ($_USER['perms'] == 'Owner' || $_USER['perms'] == 'Administrator') { 
$output = shell_exec('top -bn1 | grep "Cpu(s)"');

//if (!$output) {
//    echo "Failed to execute top.\n";
//    exit;
//}

$active_cores = 0;
$total_cores = 0;

$lines = explode("\n", $output);

foreach ($lines as $line) {
    if (preg_match('/(\d+\.\d+)\s+us,\s+(\d+\.\d+)\s+sy,\s+(\d+\.\d+)\s+ni,\s+(\d+\.\d+)\s+id/', $line, $matches)) {
        $user_usage = (float)$matches[1];
        $system_usage = (float)$matches[2];
        $nice_usage = (float)$matches[3];
        $idle_usage = (float)$matches[4];

        if ($user_usage > 0 || $system_usage > 0 || $nice_usage > 0) {
            $active_cores++;
        }
        $total_cores++;
    }
}

$output = shell_exec('top -bn1 | grep "Cpu(s)"');

if (!$output) {
    echo "Failed to execute top.\n";
    exit;
}

if (preg_match('/(\d+\.\d+)\s+us,\s+(\d+\.\d+)\s+sy,\s+(\d+\.\d+)\s+ni,\s+(\d+\.\d+)\s+id/', $output, $matches)) {
    $user = (float)$matches[1];
    $system = (float)$matches[2];
    $nice = (float)$matches[3];
    $idle = (float)$matches[4];

    $cpu_usage = 100 - $idle;
}

$sql = "SELECT * FROM inserver";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$adminplayersq = $stmt->get_result();
$adminplayers = $adminplayersq->num_rows;

$sql = "SELECT * FROM servers";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$admingamesq = $stmt->get_result();
$admingames = $admingamesq->num_rows;

$sql = "SELECT * FROM users";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$totaluq = $stmt->get_result();
$totalu = $totaluq->num_rows;
                  
?>
<div class="Adminbox">
    <p><a href="/Admi/Default.aspx">&nbsp; Machines:</a> <strong><?php echo $cpu_usage; ?></strong>% of <strong>1</strong>
    <br>
    <a href="/Admi/Default.aspx">&nbsp; Cores:</a> <strong><?php echo $active_cores; ?></strong> in use of<strong> <?php echo shell_exec("nproc"); ?></strong>
    <br>
    &nbsp;&nbsp;<strong>0</strong> running, <strong>0</strong> waiting</p>
    <hr style="width: 170px;">
    <p>&nbsp; <strong><?php echo $adminplayers; ?></strong></a> <a href="/Admi/Users/ModerateUser.aspx"> players</a> in <strong><?php echo $admingames; ?></strong> </strong></a> <a href="/Admi/">games</a><br>
    &nbsp;&nbsp;(<strong>4.2:1</strong>)
    <br>
    &nbsp; <strong>N/A</strong> </a> <a href="/Admi/Thumbs.aspx"> thumb requests</a></p>
    <hr style="width: 170px;">
    <p style="margin-top: 5px;">&nbsp; <strong>?</strong> <a href="/Admi/Moderation/Default.aspx">abuse reports,</a> <strong>?</strong> <a href="/Admi/Moderation/AssetReview.aspx">images,</a> <strong><?php echo $totalu; ?></strong> <a href="/Admi/Users/UserAdmin.aspx">&nbsp;&nbsp;users</a></a></p>
    <a href="/">&nbsp;&nbsp;Rust</a> <a href="/Admi/Users/Find.aspx">&nbsp;FindUser</a>
</div>

<?php } ?>

      <div id="Container">
        
        <div id="AdvertisingLeaderboard">

</div>
          
    
<?php if($loggedin == 'no'){ ?>
        <div id="Header">
          <div id="Banner">
            
                    

<div id="Options">
  <div id="Authentication">
    <span><a id="ctl00_BannerOptionsLoginView_BannerOptions_Anonymous_LoginHyperLink" href="/Login/Default.aspx">Login</a></span>
  </div>
  <div id="Settings"></div>
</div>
                
            <div id="Logo">
                <a id="ctl00_rbxImage_Logo" title="<?=$sitename?>" href="/" style="display:inline-block;cursor:pointer;"><img src="<?php echo $logo; ?>" border="0" alt="<?=$sitename?>" blankurl="http://t6.roblox.com:80/blank-224x59.gif"/></a>
            </div>
            
                    

<div id="Alerts">
    <table style="width:100%;height:100%">
        <tr>
            <td valign="middle"><a id="ctl00_BannerAlertsLoginView_BannerAlerts_Anonymous_rbxAlerts_SignupAndPlayHyperLink" class="SignUpAndPlay" text="Sign-up and Play!" href="/Login/New.aspx?ReturnUrl=%2fGames.aspx" style="display:inline-block;cursor:pointer;"><img src="/images/BannerPlay.png" border="0" blankurl="http://t1.roblox.com:80/blank-210x40.gif"/></a>

</td>
        </tr>
    </table>
</div>
                
          </div>
<?php }else { ?>
        <div id="Header">
          <div id="Banner">
            <div id="Options">
              <div id="Authentication">
                <span><span id="ctl00_lnLoginName">Logged in as <?php echo htmlspecialchars($_USER['username']); ?> | </span><a id="ctl00_lsLoginStatus" href="/Login/Logout.aspx">Logout</a></span>
              </div>
              <div id="Settings">
                <span id="ctl00_lSettings">Age: 13+, Chat Mode: Safe</span>
              </div>
            </div>
            <div id="Logo">
                <a id="ctl00_rbxImage_Logo" title="<?=$sitename?>" href="/" style="display:inline-block;cursor:pointer;"><img src="<?php echo $logo; ?>" border="0" alt="<?=$sitename?>" blankurl="http://t6.roblox.com:80/blank-224x59.gif"/></a>
            </div>
            <div id="Alerts"><table style="width:100%;height:100%"><tr><td valign="middle">

<div id="ctl00_rbxAlerts_AlertSpacePanel">
  
      <div id="AlertSpace">
        
        <div id="ctl00_rbxAlerts_MessageAlertPanel">
          <div id="MessageAlert">
              <a id="ctl00_rbxAlerts_MessageAlertIconHyperLink" class="MessageAlertIcon" href="/My/Inbox.aspx"><img src="/images/Message.gif" style="border-width:0px;" /></a>&nbsp;
            <a id="ctl00_rbxAlerts_RobuxAlertCaptionHyperLink" class="MessageAlertCaption" href="/My/Inbox.aspx">1 new message</a>
          </div>
        </div>
    <?php if($_USER['bux'] > 0) { ?>
        <div id="ctl00_rbxAlerts_RobuxAlertPanel">
          <div id="RobuxAlert">
              <a id="ctl00_rbxAlerts_RobuxAlertIconHyperLink" class="RobuxAlertIcon" href="/My/AccountBalance.aspx"><img src="/images/Robux.png" style="border-width:0px;" /></a>&nbsp;
            <a id="ctl00_rbxAlerts_RobuxAlertCaptionHyperLink" class="RobuxAlertCaption" href="/My/AccountBalance.aspx"><?php echo $_USER['bux']; ?> <?php echo $bux; ?></a>
          </div>
        </div>
     <?php } ?>
     
        <div id="ctl00_rbxAlerts_TicketsAlertPanel">
    
          <div id="TicketsAlert">
              <a id="ctl00_rbxAlerts_TicketsAlertIconHyperLink" class="TicketsAlertIcon" href="/My/AccountBalance.aspx"><img src="/images/Tickets.png" style="border-width:0px;" /></a>&nbsp;
            <a id="ctl00_rbxAlerts_TicketsAlertCaptionHyperLink" class="TicketsAlertCaption" href="/My/AccountBalance.aspx"><?php echo $_USER['tix']; ?> <?php echo $tickets; ?></a>
          </div>
        
  </div>
      </div>

</div></td></tr></table></div>
          </div>
<?php } ?>
          

<div class="Navigation">
  <span><a id="ctl00_Menu_hlMyRoblox" class="MenuItem" href="/User.aspx">My <?=$sitename?></a></span>
  <span class="Separator">&nbsp;|&nbsp;</span>
  <span><a id="ctl00_Menu_hlGames" class="MenuItem" href="/Games.aspx">Games</a></span>
  <span class="Separator">&nbsp;|&nbsp;</span>
  <span><a id="ctl00_Menu_hlCatalog" class="MenuItem" href="/Catalog.aspx">Catalog</a></span>
  <span class="Separator">&nbsp;|&nbsp;</span>
  <span><a id="ctl00_Menu_hlBrowse" class="MenuItem" href="/Browse.aspx">People</a></span>
  <span class="Separator">&nbsp;|&nbsp;</span>
    <span><a id="ctl00_Menu_hlBuildersClub" class="MenuItem" href="/Upgrades/BuildersClub.aspx">Builders Club</a></span>
  <span class="Separator">&nbsp;|&nbsp;</span>
  <span><a id="ctl00_Menu_hlForum" class="MenuItem" href="/Forum/Default.aspx">Forum</a></span>
  <span class="Separator">&nbsp;|&nbsp;</span>
  <span><a id="ctl00_Menu_hlNews" class="MenuItem" href="https://blog.rust08.xyz/" target="_blank">News</a>&nbsp;<a id="ctl00_Menu_hlNewsFeed" href="https://blog.rust08.xyz/?feed=rss"><img src="/images/feed-icon-14x14.png" alt="RSS" border="0"/></a></span>
  <span class="Separator">&nbsp;|&nbsp;</span>
  <span><a id="ctl00_Menu_hlParents" class="MenuItem" href="/Parents.aspx">Parents</a></span>
  <span class="Separator">&nbsp;|&nbsp;</span>
  <span><a id="ctl00_Menu_hlHelp" class="MenuItem" href="https://wiki.rust08.xyz/" target="_blank">Help</a></span>
</div>
</div>
        <div id="Body">