<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
?>
       
    <div id="BuildersClubContainer">
        <div id="JoinBuildersClubNow"><img id="ctl00_cphRoblox_HeaderImage" src="/images/JoinBuildersClubNow.png" alt="Join Builders Club Now!" style="border-width:0px;" /></div>
        <div id="MembershipOptions">
            <div id="OneMonth">
                <div class="BuildersClubButton"><a id="ctl00_cphRoblox_GetMonthlyImageLink" href="PaymentMethods.aspx?id=1"><img src="/images/BuyBCMonthly.png" style="border-width:0px;" /></a></div>
                <div class="Label"><a id="ctl00_cphRoblox_GetMonthlyHyperLink" href="PaymentMethods.aspx?id=1">Get Monthly</a></div>
            </div>
            <div id="SixMonths">
                <div class="BuildersClubButton"><a id="ctl00_cphRoblox_Get6MonthsImageLink" href="PaymentMethods.aspx?id=2"><img src="/images/BuyBC6Months.png" style="border-width:0px;" /></a></div>
                <div class="Label"><a id="ctl00_cphRoblox_Get6MonthsHyperLink" href="PaymentMethods.aspx?id=2">Get 6 Months</a></div>
            </div>
            <div id="TwelveMonths">
                <div class="BuildersClubButton"><a id="ctl00_cphRoblox_Get12MonthsImageLink" href="PaymentMethods.aspx?id=3"><img src="/images/BuyBC12Months.png" style="border-width:0px;" /></a></div>
                <div class="Label"><a id="ctl00_cphRoblox_Get12MonthsHyperLink" href="PaymentMethods.aspx?id=3">Get 12 Months</a></div>
            </div>
        </div>
        <div id="WhyJoin">
            <h3>Why Join Builders Club?</h3>
            <ul id="MembershipBenefits">
                <li id="Benefit_MultiplePlaces">Create up to 10 places on a single account</li>
                <li id="Benefit_RobuxAllowance">Earn a daily income of 15 <?=$bux?></li>
                <li id="Benefit_SellContent">Sell your creations to others in the <?=$sitename?> Catalog</li>
                <li id="Benefit_SuppressAds">Never see any outside ads on <?=$sitelink2?></li>
                <li id="Benefit_ExclusiveHat">Receive the exclusive Builders Club construction hard hat</li>
            </ul>
            <p>Product is Windows-only. For more information, read our <a id="ctl00_cphRoblox_FAQHyperLink" href="../Parents/BuildersClub.aspx">Builders Club FAQs</a>.</p>
        <h3>Not Ready Yet?</h3>
        <ul id="MembershipBenefits">
            <li id="Benefit_RobuxAllowance">You can also <a href="Rustbux.aspx">buy RUSTBUX</a> directly for cash.</li>
        </ul>
    </ul></ul></div>
<?php if($loggedin == 'yes') { 
        if($_USER['buildersclub'] == '1') {?>
        <div id="Cancellation">
            <h4>Cancel Membership</h4>
            <p>Cancel automatic monthly card charges anytime within billing cycle</p>
            <p>Memberships are non-refundable</p>
            <div class="CancelButton"><a id="ctl00_cphRoblox_CancelMembershipButton" class="Button" href="../My/AccountUpgrades/Manage.aspx">Cancel Membership</a></div>
        </div>
<?php } } ?>
        <div style="clear:both;"></div>
    </div>

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>

