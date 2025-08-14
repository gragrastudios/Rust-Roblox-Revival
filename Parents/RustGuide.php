<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
?>
          
  <div class="ParentsContainer">
      <a name="top"></a>
      <div id="BreadcrumbsContainer">
          <a id="ctl00_cphRoblox_BreadcrumbsHyperLink" href="/Parents.php"><?=$sitename?> Parents</a> &gt; <?=$sitename?> Guide
      </div>
      <a id="ctl00_cphRoblox_PageImage" class="PageImage" onclick="javascript:__doPostBack('ctl00$cphRoblox$PageImage','')" style="display:inline-block;cursor:pointer;"><img src="/web/20080522171455im_/http://www.roblox.com/images/Parents/RobloxGuide.png" border="0" blankurl="http://t0.roblox.com:80/blank-283x294.gif"/></a>
      <h2><?=$sitename?> Guide</h2>
      <div class="Navigation">
          <ul>
              <li><a href="#WhatIsRoblox">What is <?=$sitename?>?</a></li>
              <li><a href="#WhatCanYouDo">What can you do in <?=$sitename?>?</a></li>
              <li><a href="#WhyDidWeCreate">Why did we create <?=$sitename?>?</a></li>
              <li><a href="#FreeToJoin"><?=$sitename?> is free to join</a></li>
              <li><a href="#GamesAndPoints">Games and points</a></li>
              <li><a href="#ThankYou">Thank you</a></li>
          </ul>
      </div>
      <div class="ContentSection">
          <p>Welcome to <?=$sitename?>, an online virtual playground and workshop where teens of all ages can safely interact, create, have fun and learn.</p>
      </div>
      <dl>
          <dt><a name="WhatIsRoblox">What is <?=$sitename?>?</a></dt>
          <dd>
              <p><?=$sitename?> is a revival of roblox in 2008.</p>
          </dd>
          <dt><a name="WhatCanYouDo">What can you do in <?=$sitename?>?</a></dt>
          <dd>
              <p><?=$sitename?> members can choose to play and create alone or, with the help of personal and customizable avatars, they can choose to be social and engage with others.  Members can explore the world with their avatars, meet and communicate with other members, visit other member-created environments, and collaborate with others on projects.</p>
              <p>There are no pre-defined goals in <?=$sitename?>.  The focus is largely on creative and open-ended play.  However, there are numerous member-created and very popular games &#151; both solo and multiplayer &#151; from head-to-head bobsledding to multiplayer paintball.</p>
          </dd>
          <dt><a name="WhyDidWeCreate">Why did we create <?=$sitename?>?</a></dt>
          <dd>
              <p>We are passionate about creating meaningful experiences that ignite the imagination and engage the mind.</p>
              <p>There are many online sites for teens. However, most of these sites are focused primarily on helping teens socialize and play games.  We wanted to build something more &#151; a place that not only satisfies teens' social and entertainment needs but that also satisfies teens' hunger for creativity and learning.</p>
          </dd>
          <dt><a name="FreeToJoin"><?=$sitename?> is free to join</a></dt>
          <dd>
              <p>Standard membership in <?=$sitename?> is free.  This option entitles teens to sign-up for <?=$sitename?> on their own and to participate on a limited basis.  Account members are given an avatar and the ability to design, build, and save only a single place.</p>
          </dd>
          <dt><a name="GamesAndPoints">Games and points</a></dt>
          <dd>
              <p>Members are recognized and earn rewards for their level of participation, the quality and popularity of their creations, and for their community spirit.  Rewards range from specialty badges, to site-wide promotion of member-created content, to actual <?=$sitename?> currency ("<?=$bux?>") that can be redeemed in the <?=$sitename?> catalog for avatar accessories and premium construction materials.</p>
          </dd>
          <dt><a name="ThankYou">Thank you</a></dt>
          <dd>
              <p>Please don't hesitate to <a href="mailto:info@rst.ct8.pl">contact us</a> if you have any questions or comments.</p>
              <p>Happy building!</p>
              <p>The <?=$sitename?> Team</p>
          </dd>
      </dl>
  </div>

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>