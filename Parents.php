<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
?>
          
  <div class="ParentsContainer">
    <div id="LeftColumn">
        <h2><?=$sitename?> Parents</h2>
        <div class="ParentsSection" id="<?=$sitename?>Guide">
            <a id="ctl00_cphRoblox_RobloxGuideImageHyperLink" class="SectionIcon" text="<?=$sitename?> Guide" href="/Parents/RustGuide.aspx" style="display:inline-block;cursor:pointer;"><img src="/images/Parents/RustGuide-110x115.png" border="0" blankurl="http://t3.roblox.com:80/blank-110x115.gif"/></a>
            <h3><a id="ctl00_cphRoblox_RobloxGuideHyperLink" href="Parents/RustGuide.aspx"><?=$sitename?> Guide</a></h3>
            <p>Background information on the world of <?=$sitename?>, especially for parents.</p>
        </div>
        <div class="ParentsSection" id="KeepingKidsSafe">
            <a id="ctl00_cphRoblox_KeepingKidsSafeImageHyperLink" class="SectionIcon" text="Keeping Kids Safe" href="/Parents/KeepingKidsSafe.aspx" style="display:inline-block;cursor:pointer;"><img src="/images/Parents/KeepingKidsSafe-110x112.png" border="0" blankurl="http://t4.roblox.com:80/blank-110x112.gif"/></a>
            <h3><a id="ctl00_cphRoblox_KeepingKidsSafeHyperLink" href="Parents/KeepingKidsSafe.aspx">Keeping Kids Safe</a></h3>
            <p>Information on how to keep your kids safe while online.</p>
        </div>
        <div class="ParentsSection" id="FAQs">
            <a id="ctl00_cphRoblox_FAQsImageHyperLink" class="SectionIcon" text="FAQs" href="/Parents/FAQs.aspx" style="display:inline-block;cursor:pointer;"><img src="/images/Parents/FAQs-110x110.png" border="0" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
            <h3><a id="ctl00_cphRoblox_FAQsHyperLink" href="Parents/FAQs.aspx">FAQs</a></h3>
            <p>Questions and answers just for parents.</p>
        </div>
    </div>
    <div id="RightColumn">
        <h2>&nbsp;</h2>
        <div class="ParentsSection" id="BuildersClub">
            <a id="ctl00_cphRoblox_BuildersClubImageHyperLink" class="SectionIcon" text="Builders Club" href="/Parents/BuildersClub.aspx" style="display:inline-block;cursor:pointer;"><img src="/images/Parents/BuildersClub-110x110.png" border="0" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
            <h3><a id="ctl00_cphRoblox_BuildersClubHyperLink" href="Parents/BuildersClub.aspx">Builders Club</a></h3>
            <p>Play for free, or enhance your experience with Builders Club.</p>
        </div>
        <div class="ParentsSection" id="<?=$sitename?>AndLearning">
            <a id="ctl00_cphRoblox_ROBLOXAndLearningImageHyperLink" class="SectionIcon" text="<?=$sitename?> and Learning" href="/Parents/RUSTAndLearning.aspx" style="display:inline-block;cursor:pointer;"><img src="/images/Parents/RustAndLearning-110x110.png" border="0" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
            <h3><a id="ctl00_cphRoblox_ROBLOXAndLearningHyperLink" href="Parents/RobloxAndLearning.aspx"><?=$sitename?> and Learning</a></h3>
            <p><?=$sitename?> kids learn engineering, design, science and programming while playing.</p>
        </div>
        <div class="ParentsSection" id="WhatParentsAreSaying">
            <a id="ctl00_cphRoblox_WhatParentsAreSayingImageHyperLink" class="SectionIcon" text="What Parents are Saying" href="/Parents/WhatParentsAreSaying.aspx" style="display:inline-block;cursor:pointer;"><img src="/images/Parents/WhatParentsAreSaying-110x110.png" border="0" blankurl="http://t6.roblox.com:80/blank-110x110.gif"/></a>
            <h3><a id="ctl00_cphRoblox_WhatParentsAreSayingHyperLink" href="Parents/WhatParentsAreSaying.aspx">What Parents are Saying</a></h3>
            <p>Hear what other parents are saying about <?=$sitename?>.</p>
        </div>
    </div>
    <div style="clear: both;"></div>
  </div>

        </div>
        

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>