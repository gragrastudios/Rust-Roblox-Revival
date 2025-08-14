<?php require($_SERVER['DOCUMENT_ROOT'].'/main/navbar.php');
if($loggedin == 'no'){header('Location: /Login/Default.aspx'); }
?>
    
    <div style="margin: 150px auto 150px auto; width: 500px; border: black thin solid; padding: 22px;">
        <h2>
            Banned for 14 Days
        </h2>
        <p>
            Our content monitors have determined that your behavior at ROBLOX has been in violation of our Terms of Service. We will terminate your account if you do not abide by the rules.</p>
        <p>
            Reason:<span style="font-weight: bold">
                Profanity</span>
            <br />
            Source:<span style="font-weight: bold">
                Chat</span>
            <br />
            Reported:<span style="font-weight: bold">
                3/2/2008 8:44:55 PM</span>
        </p>
        <p>
            <span style="font-weight: bold">
                You said &quot;ffreka tihs yall s*** uck&quot;  That language is not appropriate for ROBLOX. <?php echo $_USER['banoff']; ?></span>
        </p>
        <p>
            Please abide by the <a href="http://wiki.roblox.com/index.php?title=Community_Guidelines">ROBLOX Community Guidelines</a> so that ROBLOX can be fun for users of all ages.
        </p>
        
        
        <div id="ctl00_cphRoblox_Panel3">
	
            <p>
                Your account has been disabled for 14 days. You may re-activate it after
                <span id="ctl00_cphRoblox_Label6">3/16/2008 8:48:15 PM</span><br />
            </p>
        
</div>
        <div id="ctl00_cphRoblox_UpdatePanel1">
	
                
            
</div>
    </div>

				</div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
 ?>