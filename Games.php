<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
?>
<?php if(htmlspecialchars($_GET['feed']) == 'rss') { ?>no rss<p><?php } ?>
        </div>
        <div id="Body">
          
    
    <div id="GamesContainer">
        
<div id="ctl00_cphRoblox_rbxGames_GamesContainerPanel">
  
    <div class="DisplayFilters">
      <h2>Games&nbsp;<a id="ctl00_cphRoblox_rbxGames_hlNewsFeed" href="/Games.aspx?feed=rss"><img src="/images/feed-icon-14x14.png" alt="RSS" border="0"/></a></h2>
      <div id="BrowseMode">
        <h4>Browse</h4>
        <ul>
          <li><img id="ctl00_cphRoblox_rbxGames_MostPopularBullet" class="GamesBullet" src="/images/games_bullet.png" alt="Bullet" border="0"/><a id="ctl00_cphRoblox_rbxGames_hlMostPopular" href="Games.aspx?m=MostPopular&amp;t=Now"><b>Most Popular</b></a></li>
          <li><a id="ctl00_cphRoblox_rbxGames_hlTopFavorites" href="Games.aspx?m=TopFavorites&amp;t=AllTime">Top Favorites</a></li>
          <li><a id="ctl00_cphRoblox_rbxGames_hlRecentlyUpdated" href="Games.aspx?m=RecentlyUpdated">Recently Updated</a></li>
          <li><a id="ctl00_cphRoblox_rbxGames_hlFeatured" href="User.aspx?id=1">Featured Games</a></li>
        </ul>
      </div>
      <div id="ctl00_cphRoblox_rbxGames_pTimespan">
    
        <div id="Timespan">
          <h4>Time</h4>
          <ul>
            <li><img id="ctl00_cphRoblox_rbxGames_TimespanNowBullet" class="GamesBullet" src="/images/games_bullet.png" alt="Bullet" border="0"/><a id="ctl00_cphRoblox_rbxGames_hlTimespanNow" href="Games.aspx?m=MostPopular&amp;t=Now"><b>Now</b></a></li>
            <li><a id="ctl00_cphRoblox_rbxGames_hlTimespanPastDay" href="Games.aspx?m=MostPopular&amp;t=PastDay">Past Day</a></li>
            <li><a id="ctl00_cphRoblox_rbxGames_hlTimespanPastWeek" href="Games.aspx?m=MostPopular&amp;t=PastWeek">Past Week</a></li>
            <li><a id="ctl00_cphRoblox_rbxGames_hlTimespanPastMonth" href="Games.aspx?m=MostPopular&amp;t=PastMonth">Past Month</a></li>
            <li><a id="ctl00_cphRoblox_rbxGames_hlTimespanAllTime" href="Games.aspx?m=MostPopular&amp;t=AllTime">All-time</a></li>
          </ul>
        </div>
      
  </div>
    </div>
    <div id="Games">
        <span id="ctl00_cphRoblox_rbxGames_lGamesDisplaySet" class="GamesDisplaySet">Most Popular (Now)</span>
        <div id="ctl00_cphRoblox_rbxGames_HeaderPagerPanel" class="HeaderPager">
            
          <span id="ctl00_cphRoblox_rbxGames_HeaderPagerLabel">Page 1 of 1:</span>
          <a id="ctl00_cphRoblox_rbxGames_hlHeaderPager_Next" href="Games.aspx?m=MostPopular&amp;t=Now&amp;p=2">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
      </div>
        <table id="ctl00_cphRoblox_rbxGames_dlGames" cellspacing="0" align="Center" border="0" width="550">
    <tr>
                <?php
                $stmt = $mysqli->prepare("SELECT * FROM games");
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                  /*$visitq = mysqli_query($link, "SELECT * FROM `gamesvisits` WHERE gameid = '".$row['id']."'");
                  $visits = mysqli_num_rows($visitq);*/
                  $creatorStmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
                  $creatorStmt->bind_param("i", $row['creator']);
                  $creatorStmt->execute();
                  $creatorResult = $creatorStmt->get_result();
                  $creator = $creatorResult->fetch_assoc();
                  
                  $datemade = $row["date_created"];
                  
                  ?>
      <td class="Game" valign="top">
          <div style="padding-bottom:5px">
            <div class="GameThumbnail">
              <a id="ctl00_cphRoblox_rbxGames_dlGames_ctl00_ciGame" title="<?php echo htmlspecialchars($row['name']); ?>" href="PlaceItem.aspx?ID=<?php echo htmlspecialchars($row['id']); ?>" style="display:inline-block;cursor:pointer;"><img src="<?php echo $row['thumbnail']; ?>" width="160" height="100" border="0" alt="<?php echo htmlspecialchars($row['name']); ?>"/></a>
            </div>
            <div class="GameDetails">
              <div class="GameName"><a id="ctl00_cphRoblox_rbxGames_dlGames_ctl00_hlGameName" href="PlaceItem.aspx?ID=<?php echo htmlspecialchars($row['id']); ?>"><?php echo htmlspecialchars($row['name']); ?></a></div>
              <div class="GameLastUpdate"><span class="Label">Updated:</span> <span class="Detail"> <?php echo TimeAgo($datemade); ?></span></div>
              <div class="GameCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxGames_dlGames_ctl00_hlGameCreator" href="User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo htmlspecialchars ($creator['username']); ?></a></span></div>
              <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail">soon times</span></div>
              <div class="GamePlays"><span class="Label">Played:</span> <span class="Detail">soon times</span></div>
              <div id="ctl00_cphRoblox_rbxGames_dlGames_ctl00_pGameCurrentPlayers">
        
                <?php if($row['players'] > 0) { ?><div class="GameCurrentPlayers"><span class="DetailHighlighted"><?php echo htmlspecialchars($row['players']); ?> players online</span></div> <?php } ?>
              
      </div>
            </div>
        </div>
          </td>      
     <?php         
                }
            }
  
          
            ?>
    </tr>
  </table>
        <div id="ctl00_cphRoblox_rbxGames_FooterPagerPanel" class="HeaderPager">
            
            <span id="ctl00_cphRoblox_rbxGames_FooterPagerLabel">Page 1 of 1:</span>
            <a id="ctl00_cphRoblox_rbxGames_hlFooterPager_Next" href="Games.aspx?m=MostPopular&amp;t=Now&amp;p=2">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
        </div>
    </div>

</div>
        
<div class="Ads_WideSkyscraper">
    
    

            <script type="text/javascript"><!--
                google_ad_client = "pub-2247123265392502";
                /* Old Games Side Banner */
                google_ad_slot = "7010215018";
                google_ad_width = 160;
                google_ad_height = 600;
                //-->
            </script>

            <script type="text/javascript" src="">
            </script>

        
</div>

        <div style="clear: both;"></div>
    </div>

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>