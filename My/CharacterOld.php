<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
if($loggedin == 'no'){header('Location: /Login/Default.aspx'); exit();}
?>

    <p><a href="/api/render.ashx?id=<?php echo $_USER['id']; ?>">&nbsp;render your avatar</a>
    <br>
    
                <div style="left: 0px; float: left; position: relative; top: 0px">
                <a id="ctl00_cphRoblox_rbxUserPane_Image1" disabled="disabled" title="<?php echo htmlspecialchars ($_USER['username']); ?>" onclick="return false" style="display:inline-block;"><img src="/Thumbs/Avatar.ashx?id=<?php echo $_USER['id']; ?>&v=<?php echo rand(1,9999); ?>" border="0" alt="<?php echo htmlspecialchars($_USER['username']); ?>" width="220" height="220" blankurl="http://t7.roblox.com:80/blank-180x220.gif"/></a><br/>