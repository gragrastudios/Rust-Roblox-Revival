<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
?>
          
  <div class="ParentsContainer">
      <a name="top"></a>
      <div id="BreadcrumbsContainer">
          <a id="ctl00_cphRoblox_BreadcrumbsHyperLink" href="/Parents.php"><?=$sitename?> Parents</a> &gt; Frequently Asked Questions
      </div>
      <a id="ctl00_cphRoblox_PageImage" class="PageImage" onclick="javascript:__doPostBack('ctl00$cphRoblox$PageImage','')" style="display:inline-block;cursor:pointer;"><img src="/images/Parents/FAQs.png" border="0" blankurl="http://t6.roblox.com:80/blank-128x128.gif"/></a>
      <h2>Frequently Asked Questions (FAQs)</h2>
      <div class="Navigation">
          <ul>
              <li><a href="#WhatIsRoblox">What is <?=$sitename?>?</a></li>
              <li><a href="#WhatsTheObject">What's the object of the game?</a></li>
              <li><a href="#WhoIsRobloxFor">Who is <?=$sitename?> for?</a></li>
              <li><a href="#HowIsItEducational">How is <?=$sitename?> educational?</a></li>
              <li><a href="#WhatDoesItCost">Does it cost anything to join <?=$sitename?>?</a></li>
              <li><a href="#BuildersClubSignUp">How do I sign my child up for Builders Club?</a></li>
          </ul>
      </div>
      <dl>
          <dt><a name="WhatIsRoblox">What is <?=$sitename?>?</a></dt>
          <dd>
              <p><?=$sitename?> is an online virtual playground and workshop &#151; where gamers of all ages can safely interact, create, have fun, and learn.  It's unique in that practically everything in this infinite playground is designed and constructed by individual members of the <?=$sitename?> community.</p>
              <p>Each player starts by chosing an avatar and giving it an identity.  They can then explore <?=$sitename?> &#151; interacting with others by chatting, playing games, or collaborating on creative projects.</p>
              <p>Each player is also given their own piece of undeveloped real estate along with a virtual toolbox with which to design and build anything desired &#151; be it a navigable skyscraper, a working helicopter, a giant pinball machine, a multiplayer "Capture the Flag" game or some other, yet-to-be-dreamed-up object or activity.</p>
              <p>By participating and by building cool stuff, <?=$sitename?> members can earn specialty badges as well as <?=$sitename?> dollars ("<?=$bux?>").  In turn, they can shop the online catalog to purchase avatar clothing and accessories as well as premium building materials, interactive components, and working mechanisms.</p>
          </dd>
          <dt><a name="WhatsTheObject">What's the object of the game?</a></dt>
          <dd>
              <p>There are no pre-defined goals in <?=$sitename?>.  The focus is largely on creative and open-ended play.  However, there are numerous member-created games &#151; both solo and multiplayer &#151; from head-to-head bobsledding to multiplayer paintball.</p>
          </dd>
          <dt><a name="WhoIsRobloxFor">Who is <?=$sitename?> for?</a></dt>
          <dd>
              <p><?=$sitename?> is designed for 13-18 year olds, but it is open to gamers of all ages.</p>
          </dd>
          <dt><a name="HowIsItEducational">How is <?=$sitename?> educational?</a></dt>
          <dd>
              <p>We believe in the theory that gamers learn best by making things &#151; by engaging in the creative and complex process of imagining, designing, and constructing.  Provide them with a safe place to build, give them the requisite tools, and let them play.</p>
              <p>We're particularly inspired by the educational theory pioneered by Seymour Papert of the MIT Media Lab.  This theory &#151; labeled "Constructionism" &#151; holds not only that gamers learn best when they are in the active roles of designer and builder, but that their learning is optimized when they're assuming these roles in a public forum.</p>
              <p>This makes good sense to us &#151; particularly after observing some of our members who know that the fruits of their labor may be seen, critiqued, and used by others.  These are motivated gamers who become deeply engaged with building complex structures and solving difficult problems.  Their level of creativity, the amount of time and care spent building, and the extent and high quality of their discourse never fails to astonish us.</p>
          </dd>
          <dt><a name="WhatDoesItCost">Does it cost anything to join <?=$sitename?>?</a></dt>
          <dd>
              <p>Anyone can enjoy <?=$sitename?> free of charge, but they won't have the same privileges as paying members.</p>
              <p>For example, teens whose parents sign them up for the Builders Club will be given the ability to build and manage multiple environments.  They'll also be given the ability to purchase premium items in the <?=$sitename?> catalog that enable greater (i.e. cooler!) customization of both their avatars and their interactive creations.  Finally, Builders Club members will no longer be exposed to on screen advertisements.</p>
              <p>Builders Club memberships start at $5.95 per month.  (That's less than 20 cents per day!)  Lower rates are available for 6-month and year-long subscriptions.</p>
          </dd>
          <dt><a name="BuildersClubSignUp">How do I sign my gamer up for Builders Club?</a></dt>
          <dd>
              <p>Click on the Builder's Club menu button on the home page to start the step-by-step process (or start the process right now by clicking <a id="ctl00_cphRoblox_BuildersClubHyperLink" href="/Upgrades/BuildersClub.aspx">here</a>).</p>
              <p>If your child already has an account on <?=$sitename?> the process is straightforward.  You'll simply need to sign in to his or her account to complete the enrollment process.</p>
              <p>If your gamer doesn't already have an account, you'll need to set her or him up with a username and a temporary password.</p>
          </dd>
      </dl>
  </div>

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>