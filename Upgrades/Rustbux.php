<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
?>
    <div style="border: solid black thin;">
    <div id="RustCentralBank"><img id="ctl00_cphRoblox_HeaderImage" src="/images/RobloxCentralBank.png" alt="Rust Central Bank" border="0"/></div>
    <div class="StandardBox">
    <div id="ctl00_cphRoblox_BuildersClubContainer" class="BuyRobuxOptions">
  
        <p style="text-align: center; font-size: large;">Click a link below to choose the quantity of <?=$bux?> you wish to purchase.</p>
        <p style="text-align: center; color: Red;">NOTE: Please allow up to 5 minutes for your account to be credited.</p>
        <div id="OptionsMatrix" style="margin: 10px 0;">
            <table cellpadding="7" style="margin: 0 auto;">
                <tr>
                    <td align="center"><strong>Price</strong></td>
                    <td align="center"><strong>Standard Members</strong></td>
                    <td align="center"><strong>Builders Club Members</strong></td>
                </tr>
                <tr>
                    <td align="center">$4.95 USD</td>
                    <td align="center">
                        Not Available
                    </td>
                    <td align="center">
                        450 <?=$bux?>
                        
                    </td>
                </tr>
                <tr>
                    <td align="center">$9.95 USD</td>
                    <td align="center">
                      Not Available
                    </td>
                    <td align="center">
                        1,000 <?=$bux?>
                        
                    </td>
                </tr>
                <tr>
                    <td align="center">$24.95 USD</td>
                    <td align="center">
                        
                        <a id="ctl00_cphRoblox_Tier3StandardHyperLink" href="PaymentMethods.aspx?id=4">2,000 <?=$bux?></a>
                    </td>
                    <td align="center">
                        2,750 <?=$bux?>
                        
                    </td>
                </tr>
                <tr>
                    <td align="center">$49.95 USD</td>
                    <td align="center">
                        
                        <a id="ctl00_cphRoblox_Tier4StandardHyperLink" href="PaymentMethods.aspx?id=5">4,500 <?=$bux?></a>
                    </td>
                    <td align="center">
                        6,000 <?=$bux?>
                        
                    </td>
                </tr>
                <tr>
                    <td align="center">$99.95 USD</td>
                    <td align="center">
                        
                        <a id="ctl00_cphRoblox_Tier5StandardHyperLink" href="PaymentMethods.aspx?id=6">10,000 <?=$bux?></a>
                    </td>
                    <td align="center">
                        15,000 <?=$bux?>
                        
                    </td>
                </tr>
                <tr>
                    <td align="center">$199.95 USD</td>
                    <td align="center">
                        
                        <a id="ctl00_cphRoblox_Tier6StandardHyperLink" href="PaymentMethods.aspx?id=7">22,500 <?=$bux?></a>
                    </td>
                    <td align="center">
                        35,000 <?=$bux?>
                        
                    </td>
                </tr>
            </table>
        </div>
        
        <p style="text-align: center; color: Red;">Prices for Turbo and Outrageous Builders Club are the same as for regular Builders Club.</p>
        <p style="text-align: center; color: Red;">* For higher quantities, please call us at team@<?=$sitelink?></p>
    
</div>
    <div id="ctl00_cphRoblox_rbxGetBCPane_GetBCPanel" class="RightColumnBox">
  
    <a href="BuildersClub.aspx" style="text-decoration:none; cursor: pointer"><img style="float:left; vertical-align:top; border: none;" src="/images/HardHatBullet.png" width="32px" height="32px"/><h1>Builders Club!</h1></a>
    <p style="clear: left">
        <?=$sitename?> is free to play, but you can upgrade your account for greater enjoyment.  Take a look at all the fabulous benefits your receive when you join <a href="BuildersClub.aspx">Builders Club</a>!
    </p>

</div>

    </div>
    
    
    <br clear="all"/>

            </div>
</div>
            
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>
    