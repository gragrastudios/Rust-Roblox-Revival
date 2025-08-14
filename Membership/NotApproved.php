<?php require($_SERVER['DOCUMENT_ROOT'].'/main/config.php');
if($loggedin == 'no'){header('Location: /Login/Default.aspx'); }
if($_USER['bantype'] == 'None') {
    header('Location: /Default.aspx');
}
?>
<title>
  <?=$sitename?>: A FREE Virtual World-Building Game with Avatar Chat, 3D Environments, and Physics
</title><link rel="stylesheet" type="text/css" href="/CSS/AllCSS.css?ver=4"/><link rel="Shortcut Icon" type="image/ico" href="/favicon.ico"/><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/><meta name="author" content="Gra Gra Studios"/><meta name="description" content="<?=$sitename?> is SAFE for kids! <?=$sitename?> is a FREE casual virtual world with fully constructible/desctructible environments and immersive physics. Build, battle, chat, or just hang out."/><meta name="keywords" content="game, video game, building game, contstruction game, online game, LEGO game, LEGO, MMO, MMORPG, virtual world, avatar chat"/><meta name="robots" content="all"/></head>
  <body>
<input type="hidden" name="ctl00_ScriptManager1_HiddenField" id="ctl00_ScriptManager1_HiddenField" value=""/>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTI4MDE0NDQ2MQ8WAh4JUmV0dXJuVXJsBQMlMmYWAmYPZBYCAgMPZBYEAgMPDxYGHghJbWFnZVVybAUYfi9pbWFnZXMvTG9nb18yNjdfNzAucG5nHgtDb21tYW5kTmFtZWUeD0NvbW1hbmRBcmd1bWVudGRkZAIFD2QWBgIDD2QWAmYPZBYCZg8QZGQWAWZkAgUPDxYCHgtOYXZpZ2F0ZVVybAUaRGVmYXVsdC5hc3B4P1JldHVyblVybD0lMmZkZAIHDw8WAh8EBSR+L0luc3RhbGwvRGVmYXVsdC5hc3B4P1JldHVyblVybD0lMmZkZBgBBSNjdGwwMCRyYnhHb29nbGVBbmFseXRpY3MkTXVsdGlWaWV3MQ8PZGZk2Q5q1juiu6tPwry2IM+SeV54aMo="/>


<script src="/web/20070804083927js_/http://roblox.com/ScriptResource.axd?d=hdnARt53mro8fIqbhCPqjBVj_ILfvAWszCzH5uZOKir5tftWMsOOFO-tiAQnBpGblEG-I0uAGPq6xz1F99Jx16jf6LPuyEr5-OWpWDlPJW01&amp;t=633185460322656250" type="text/javascript"></script>
<script src="/web/20070804083927js_/http://roblox.com/CombineScriptsHandler.ashx?_TSM_HiddenField_=ctl00_ScriptManager1_HiddenField&amp;_TSM_CombinedScripts_=%3b%3bRoblox.Controls%3aen-US%3a915b4e48-a08b-47e2-bc5b-cbcc62ba71aa%3a827cb342" type="text/javascript"></script>
            
      <div id="Container">
        <div id="Header">
          <div id="Banner">
            <div id="Options">
              <div id="Settings"></div>
            </div>
            <div id="Logo"><a id="ctl00_Image1" title="<?=$sitename?>" href="/Default.aspx" style="display:inline-block;cursor:hand;"><img src="/images/logo.png" border="0" id="img" blankurl="http://t2.roblox.com:80/blank-267x70.gif"/></a></div>
          </div>
        </div>
        <div id="Body">
          
    
    <div style="margin: 150px auto 150px auto; width: 500px; border: black thin solid; padding: 22px;">
        <h2>
            <?php 
            
            if($_USER['bantype'] == '1dayban') {
                echo 'Banned for 1 Day';
            }elseif ($_USER['bantype'] == '3dayban'){
                echo 'Banned for 3 Days';
            }elseif ($_USER['bantype'] == '7dayban'){
                echo 'Banned for 7 Days';
            }elseif ($_USER['bantype'] == '14dayban'){
                echo 'Banned for 14 Days';
            }elseif ($_USER['bantype'] == 'Ban'){
                echo 'Account Deleted';
            }elseif ($_USER['bantype'] == 'Reminder'){
                echo 'Reminder';
            }elseif ($_USER['bantype'] == 'Warning'){
                echo 'Warning';
            }
            
            ?>
        </h2>
        <p>
            Our content monitors have determined that your behavior at <?=$sitename?> has been in violation of our Terms of Service. We will terminate your account if you do not abide by the rules.</p>
        <p>
            Reported:<span style="font-weight: bold">
            <?php echo $createdate = $_USER['bandate']; ?></span>
        </p>
        <p>
           Moderator Note:<span style="font-weight: bold">
                <?php echo $_USER['bannote']; ?></span>
        </p>
        <p>
            Please abide by the <a href="http://wiki.roblox.com/index.php?title=Community_Guidelines"><?=$sitename?> Community Guidelines</a> so that <?=$sitename?> can be fun for users of all ages.
        </p>
        
        
        <div id="ctl00_cphRoblox_Panel3">
<?php if($_USER['bantype'] == '1dayban' or $_USER['bantype'] == '3dayban' or $_USER['bantype'] == '7dayban' or $_USER['bantype'] == '14dayban') { ?>	
            <p>
                Your account has been disabled for <?php if($_USER['bantype'] == '1dayban') { echo '1 day'; }elseif($_USER['bantype'] == '3dayban') { echo '3 days'; }elseif($_USER['bantype'] == '7dayban') { echo '7 days'; }elseif($_USER['bantype'] == '14dayban') { echo '14 days'; } ?>. You may re-activate it after
                <span id="ctl00_cphRoblox_Label6"><?php echo $createdate = date('d/m/Y H:i:s A',$_USER['unbantime']); ?></span><br />
            </p>
<?php } ?>
<?php
    if (($_USER['unbantime'] <= time()) or $_USER['bantype'] == 'Warning' or $_USER['bantype'] == 'Reminder' && ($_USER['bantype'] !== 'Ban')) {
      echo "<a href='/api/reactivate_account.ashx'>Reactivate account</a>";
    }
?>
        
</div>
        <div id="ctl00_cphRoblox_UpdatePanel1">
  
                
            
</div>
    </div>

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
 ?>