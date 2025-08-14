<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
if($loggedin == 'no'){header('Location: /Login/Default.aspx'); exit();}
 ?>

          
          
    <div id="MyAccountBalanceContainer">
    <h2>My Account Balance</h2>
    <div id="AboutRobux">
      <h3>What are <?=$bux?>?</h3>
      <p><?=$bux?> are the principle currency of <?=$sitename2?>ia. Citizens in the Builders Club receive a daily allowance of <?=$bux?> to help them live a comfortable life of leisure. For this and other benefits, consider joining the Builders Club!</p>
      <h3>What are Tickets?</h3>
      <p><?=$sitename2?>ian Tickets are similar to tickets you win in an arcade. You play the game, get tickets, and are rewarded with fabulous prizes. Tickets are granted to citizens who are helping to expand and improve <?=$sitename2?>ia. The primary way to get tickets is to make a cool place, and then get people to visit it. You can also get the daily login bonus, just by showing up!</p>
      <h3>Where do I buy things?</h3>
      <p>Browse the <a id="ctl00_cphRoblox_CatalogHyperLink" href="../Catalog.aspx"><?=$sitename?> Catalog</a></p>
    </div>
    <div id="Earnings">
      <h3>Earnings</h3>
      <div>
                <div class="Label"></div>
        <div class="Field"><img id="ctl00_cphRoblox_RobuxIcon" src="../images/Robux.png" alt="Rustbux" style="border-width:0px;" /></div>
        <div class="Field"><img id="ctl00_cphRoblox_TicketsIcon" src="../images/Tickets.png" alt="Tickets" style="border-width:0px;" /></div>
      </div>
      <div class="Earnings_Period">
        <h4>Past Day</h4>
        <div class="Earnings_LoginAward">
          <div class="Label">Login Award</div>
          <div class="Field"></div>
          <div class="Field">0</div>
        </div>
        <div id="ctl00_cphRoblox_Earnings_PastDay_PlaceTrafficAward" class="Earnings_PlaceTrafficAward">
          <div class="Label">Place Traffic Award</div>
          <div class="Field"></div>
          <div class="Field">0</div>
        </div>
        <div id="ctl00_cphRoblox_Earnings_PastDay_SaleOfGoods" class="Earnings_SaleOfGoods">
          <div class="Label">Sale of Goods</div>
          <div class="Field"></div>
          <div class="Field">0</div>
        </div>
        <div class="Earnings_PeriodTotal">
          <div class="Label">Total:</div>
          <div class="Field">0</div>
          <div class="Field">0</div>
        </div>
      </div>
      <div class="Earnings_Period">
        <h4>Past Week</h4>
        <div class="Earnings_LoginAward">
          <div class="Label">Login Award</div>
          <div class="Field"></div>
          <div class="Field">0</div>
        </div>
        <div id="ctl00_cphRoblox_Earnings_PastWeek_PlaceTrafficAward" class="Earnings_PlaceTrafficAward">
          <div class="Label">Place Traffic Award</div>
          <div class="Field"></div>
          <div class="Field">0</div>
        </div>
        <div id="ctl00_cphRoblox_Earnings_PastWeek_SaleOfGoods" class="Earnings_SaleOfGoods">
          <div class="Label">Sale of Goods</div>
          <div class="Field"></div>
          <div class="Field">0</div>
        </div>
        <div class="Earnings_PeriodTotal">
          <div class="Label">Total:</div>
          <div class="Field">0</div>
          <div class="Field">0</div>
        </div>
      </div>
      <div class="Earnings_Period">
        <h4>Past Month</h4>
        <div class="Earnings_LoginAward">
          <div class="Label">Login Award</div>
          <div class="Field"></div>
          <div class="Field">0</div>
        </div>
        <div id="ctl00_cphRoblox_Earnings_PastMonth_PlaceTrafficAward" class="Earnings_PlaceTrafficAward">
          <div class="Label">Place Traffic Award</div>
          <div class="Field"></div>
          <div class="Field">0</div>
        </div>
        <div id="ctl00_cphRoblox_Earnings_PastMonth_SaleOfGoods" class="Earnings_SaleOfGoods">
          <div class="Label">Sale of Goods</div>
          <div class="Field">0</div>
          <div class="Field">0</div>
        </div>
        <div class="Earnings_PeriodTotal">
          <div class="Label">Total:</div>
          <div class="Field">0</div>
          <div class="Field">0</div>
        </div>
      </div>
      <div class="Earnings_Period">
        <h4>All Time</h4>
        <div class="Earnings_LoginAward">
          <div class="Label">Login Award</div>
          <div class="Field">0</div>
          <div class="Field">0</div>
        </div>
        <div id="ctl00_cphRoblox_Earnings_AllTime_PlaceTrafficAward" class="Earnings_PlaceTrafficAward">
          <div class="Label">Place Traffic Award</div>
          <div class="Field">0</div>
          <div class="Field">0</div>
        </div>
        <div id="ctl00_cphRoblox_Earnings_AllTime_SaleOfGoods" class="Earnings_SaleOfGoods">
          <div class="Label">Sale of Goods</div>
          <div class="Field">0</div>
          <div class="Field">0</div>
        </div>
        <div class="Earnings_PeriodTotal">
          <div class="Label">Total:</div>
          <div class="Field"><?php echo $_USER['bux']; ?></div>
          <div class="Field"><?php echo $_USER['tix']; ?></div>
        </div>
      </div>
      <br><br><br>
    </div>
      <br><br>
  </div>
<br><br>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
 ?>