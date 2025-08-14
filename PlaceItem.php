<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/main/navbar.php");

$id = (int)$_GET['ID'];
if (!$id) {
    die("<center><h1>Place doesn't exist.</h1></center>");
}

$stmt = $link->prepare("SELECT * FROM games WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$game = $result->fetch_assoc();
$stmt->close();

if (!$game) {
    die("<center><h1>Place doesn't exist.</h1></center>");
}

$stmt = $link->prepare("SELECT * FROM games LIMIT 1");
$stmt->execute();
$result = $stmt->get_result();
$game2 = $result->fetch_assoc();
$stmt->close();

$stmt = $link->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $game['creator']);
$stmt->execute();
$result = $stmt->get_result();
$creator = $result->fetch_assoc();
$stmt->close();

$datemade = $game["date_created"];
?>
<script src="/Game/PlaceLauncher.ashx?id=<?php echo $game['id']; ?>&v=<?php echo rand(1,9999); ?>" type="text/javascript"></script>
<div id="joiningGameDiag" style="display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(100,100,100,0.25);">
<div id="ctl00_cphRoblox_VisitButtons_rbxPlaceLauncher_Panel1" class="modalPopup" style="width: 27em; position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); ">
  
    <div style="margin: 1.5em">
        <div id="Spinner" style="float:left;margin:0 1em 1em 0">
            <img id="ctl00_cphRoblox_VisitButtons_rbxPlaceLauncher_Image1" src="/images/ProgressIndicator2.gif" alt="Progress" border="0"/></div>
        <div id="Requesting" style="display: inline">
            Requesting a server</div>
        <div id="Waiting" style="display: none">
            Waiting for a server</div>
        <div id="Loading" style="display: none">
            A server is loading the game</div>
        <div id="Joining" style="display: none">
            The server is ready. Joining the game...</div>
        <div id="Error" style="display: none">
            An error occured. Please try again later</div>
        <div id="Expired" style="display: none">
            There are no game servers available at this time. Please try again later</div>
        <div id="GameEnded" style="display: none">
            The game you requested has ended</div>
        <div id="GameFull" style="display: none">
            The game you requested is full. Please try again later</div>
        <div id="RateLimit" style="display: none">
            You have been rate limited.</div>
        <div style="text-align: center; margin-top: 1em">
            <input id="Cancel" type="button" class="Button" value="Cancel" onclick="closeModal()"/></div>
    </div>

</div>
</div>
<input type="hidden" name="ctl00$cphRoblox$VisitButtons$rbxPlaceLauncher$HiddenField1" id="ctl00_cphRoblox_VisitButtons_rbxPlaceLauncher_HiddenField1"/>
  <div id="ItemContainer">
    <div id="Item">
        <h2><?php echo htmlspecialchars($game['name']); ?></h2>
        <div id="Details">
          <div id="Summary">
            <h3><?=$sitename?> Place</h3>
            
            
            <div id="Creator" class="Creator">
                        <div class="Avatar">
                            <a id="ctl00_cphRoblox_AvatarImage" title="<?php echo htmlspecialchars($creator['username']); ?>" href="/User.aspx?ID=<?php echo $game['creator']; ?>" style="display:inline-block;cursor:pointer;"><img src="/api/avatar/getthumb.ashx?id=<?php echo $creator['id']; ?>&v=<?php echo rand(1,9999); ?>" width="100" height="100" border="0" alt="<?php echo htmlspecialchars( $creator['username']); ?>" blankurl="http://t6.roblox.com:80/blank-100x100.gif"/></a>
                        </div>
                        Creator: <a id="ctl00_cphRoblox_CreatorHyperLink" href="User.aspx?ID=<?php echo htmlspecialchars($creator['id']); ?>"><?php echo htmlspecialchars($creator['username']); ?></a>
                    </div>
            <div id="LastUpdate">Updated: <?php echo TimeAgo($datemade); ?></div>
            <div id="Favorited">Favorited: 0 times</div>
            <div id="ctl00_cphRoblox_VisitedPanel" class="Visited">Visited: soon times</div>
            <div id="ctl00_cphRoblox_DescriptionPanel">
  
              <div id="DescriptionLabel">Description:</div>
              <div id="Description"><?php echo htmlspecialchars($game['description']); ?></div>
            
</div>
                  <div id="ReportAbuse"><div id="ctl00_cphRoblox_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
  
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseIconHyperLink" href="AbuseReport/AssetVersion.aspx?ID=4713013&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fItem.aspx%3fID%3d308396"><img src="/images/abuse.png" alt="Report Abuse" border="0"/></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseTextHyperLink" href="AbuseReport/AssetVersion.aspx?ID=4713013&amp;ReturnUrl=http%3a%2f%2fwww.roblox.com%2fItem.aspx%3fID%3d308396">Report Abuse</a></span>

</div></div>
          </div>
                    <div id="Thumbnail_Place">
                    <a id="ctl00_cphRoblox_AssetThumbnailImage_Place" disabled="disabled" title="<?php echo htmlspecialchars($game['name']); ?> " onclick="return false" style="display:inline-block;"><img src="<?php echo htmlspecialchars($game['thumbnail']); ?>" width="420" height="230" border="0" alt="<?php echo htmlspecialchars($game['name']); ?> "/></a>
                  </div>
                  <div id="Actions_Place">
                      <a id="ctl00_cphRoblox_FavoriteThisPlaceButton"<?php if($loggedin == "no"){ ?>disabled="disabled"<?php }else { ?> href="/api/favorite.ashx?id=1&type=place"<?php } ?>>Favorite</a>
                  </div>
                    <div id="ctl00_cphRoblox_PlayGames" class="PlayGames">
                        <div style="text-align: center; margin: 1em 5px;">
                                <span id="ctl00_cphRoblox_PlaceAccessIndicator_FriendsOnlyLocked" style="display: none"><img id="ctl00_cphRoblox_PlaceAccessIndicator_iFriendsOnly_Locked" src="/images/locked.png" alt="Locked" border="0"/>&nbsp;Friends-only</span>
<span id="ctl00_cphRoblox_PlaceAccessIndicator_FriendsOnlyUnlocked" style="display: none"><img id="ctl00_cphRoblox_PlaceAccessIndicator_iFriendsOnly_Unlocked" src="/images/unlocked.png" alt="Unlocked" border="0"/>&nbsp;Friends-only: You have access</span>
<span id="ctl00_cphRoblox_PlaceAccessIndicator_Public" style="display:inline;"><img id="ctl00_cphRoblox_PlaceAccessIndicator_iPublic" src="/images/public.png" alt="Public" border="0"/>&nbsp;Public</span>

                                <img id="ctl00_cphRoblox_CopyLockedIcon" src="/images/CopyLocked.png" alt="CopyLocked" border="0"/>
                                Copy Protection: CopyLocked
                            </div>


<div id="ctl00_cphRoblox_VisitButtons_VisitMPButton" style="display:inline">
    <button id="ctl00_cphRoblox_VisitButtons_hlMultiplayerVisit" class="Button" onclick="<?php if($loggedin == "no"){ echo "window.location = '/Login/Default.aspx?ReturnUrl=http%3a%2f%2fwww.rogget.xyz%2fItem.aspx%3fID%3d308396'; return false;"; }else { echo 'JoinGame();'; }  ?>">Visit Online</button>
</div>
<div id="ctl00_cphRoblox_VisitButtons_VisitButton" style="display:inline">
  &nbsp;&nbsp;&nbsp;<button id="ctl00_cphRoblox_VisitButtons_hlSoloVisit" class="Button" href="javascript:alert('not yet');">Visit Solo</button>
</div>

                    </div>
          
          
          <div style="clear: both;"></div>
      </div>
      <div style="margin: 10px; width: 703px;">
          <div class="ajax__tab_xp" id="TabbedInfo">
  <div id="TabbedInfo_header">
    <span id="__tab_TabbedInfo_GamesTab">
                      <h3 style="color: #555;">Games</h3>
                  </span><span id="__tab_TabbedInfo_CommentaryTab">
                      <h3 style="color: #555;">Commentary</h3>
                  </span>
  </div><div id="TabbedInfo_body">
    <div id="TabbedInfo_GamesTab">
      
                      <div id="TabbedInfo_GamesTab_RunningGamesUpdatePanel">
        
                                    
                                    <table id="TabbedInfo_GamesTab_RunningGamesDataList" cellspacing="0" border="0" width="100%">
          <tr>
            <td>
                                            <div class="GameInstance" style="margin: 3px 0">
                                                <div style="float: right;">
                                                    
                                                            <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesDataList_ctl00_PlayersRepeater_ctl00_PlayerImage" disabled="disabled" title="Antonio97" href="/web/20080713030836/http://www.roblox.com/User.aspx?id=436406" style="display:inline-block;"><img src="https://web.archive.org/web/20080713030836im_/http://t6.roblox.com:80/bfe365246ac2b609f82fdea91581d0f9" border="0" alt="Antonio97"/></a>
                                                        
                                                            <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesDataList_ctl00_PlayersRepeater_ctl01_PlayerImage" disabled="disabled" title="yarrum22" href="/web/20080713030836/http://www.roblox.com/User.aspx?id=608135" style="display:inline-block;"><img src="https://web.archive.org/web/20080713030836im_/http://t2.roblox.com:80/39a9c554a9ce814db33cb62a8a957245" border="0" alt="yarrum22"/></a>
                                                        
                                                            <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesDataList_ctl00_PlayersRepeater_ctl02_PlayerImage" disabled="disabled" title="powerperson" href="/web/20080713030836/http://www.roblox.com/User.aspx?id=393253" style="display:inline-block;"><img src="https://web.archive.org/web/20080713030836im_/http://t3.roblox.com:80/848007be18444b70ba74816290d3b66a" border="0" alt="powerperson"/></a>
                                                        
                                                            <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesDataList_ctl00_PlayersRepeater_ctl03_PlayerImage" disabled="disabled" title="sady197" href="/web/20080713030836/http://www.roblox.com/User.aspx?id=553064" style="display:inline-block;"><img src="https://web.archive.org/web/20080713030836im_/http://t2.roblox.com:80/7dcd09e28df2adfbce1b5b1d61369741" border="0" alt="sady197"/></a>
                                                        
                                                            <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesDataList_ctl00_PlayersRepeater_ctl04_PlayerImage" disabled="disabled" title="ely101" href="/web/20080713030836/http://www.roblox.com/User.aspx?id=513545" style="display:inline-block;"><img src="https://web.archive.org/web/20080713030836im_/http://t0.roblox.com:80/059856d95b8d8dac3f45b101d0c62014" border="0" alt="ely101"/></a>
                                                        
                                                            <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesDataList_ctl00_PlayersRepeater_ctl05_PlayerImage" disabled="disabled" title="Firehawk99" href="/web/20080713030836/http://www.roblox.com/User.aspx?id=547644" style="display:inline-block;"><img src="https://web.archive.org/web/20080713030836im_/http://t3.roblox.com:80/1f285e0d85ccd8d750bfff9f72e3efcb" border="0" alt="Firehawk99"/></a>
                                                        
                                                            <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesDataList_ctl00_PlayersRepeater_ctl06_PlayerImage" disabled="disabled" title="coolmoon" href="/web/20080713030836/http://www.roblox.com/User.aspx?id=651575" style="display:inline-block;"><img src="https://web.archive.org/web/20080713030836im_/http://t4.roblox.com:80/5a2d83f284cd6188c8b5b5f69aee84ad" border="0" alt="coolmoon"/></a>
                                                        
                                                            <a id="ctl00_cphRoblox_TabbedInfo_GamesTab_RunningGamesDataList_ctl00_PlayersRepeater_ctl07_PlayerImage" disabled="disabled" title="vkbud1997" href="/web/20080713030836/http://www.roblox.com/User.aspx?id=227696" style="display:inline-block;"><img src="https://web.archive.org/web/20080713030836im_/http://t1.roblox.com:80/8da4991d024216545291a042532a04e4" border="0" alt="vkbud1997"/></a>
                                                        
                                                </div>
                                                <div style="text-align: left;">
                                                    <?php echo htmlspecialchars($game2['players']); ?> players of 8 max<br/><?php if($loggedin == 'yes'){ echo '<button class="Button" onclick="JoinGame();">Join</button>'; } ?>&nbsp;<?php if($game['creator'] == $_USER['id'] || $_USER['perms'] == 'Administrator' || $_USER['perms'] == 'Owner'){?><button class="Button" onclick="location.replace('/api/game/shutdown.ashx?ReturnUrl=<?php echo $_SERVER['REQUEST_URI']; ?>');">Shutdown</button>
                                                    <?php } ?>
                                                    &nbsp;
                                                    
                                                </div>
                                            </div>
                                        </td>
          </tr><tr>
            <td>
          </tr>
        </table>
                            <div class="RefreshRunningGames">
                                <input type="submit" value="Refresh" id="refreshButton" class="Button" />
                        </div>

                    <script>
                        document.getElementById('refreshButton').addEventListener('click', function() {
                         location.reload();
                            });
                    </script>

                                
      </div>
                        
    </div><div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab" style="display:none;">
      
                      <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsUpdatePanel">
        
        <div class="CommentsContainer">
            
                    <h3>Comments (326)</h3>
                    <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerPanel" class="HeaderPager">
                  
                  <span id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerLabel">Page 1 of 33</span>
                  <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Next" href="javascript:__doPostBack('ctl00$cphRoblox$TabbedInfo$CommentaryTab$CommentsPane$CommentsRepeater$ctl00$HeaderPageSelector_Next','')">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                </div>
                <div class="Comments">
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl01_AvatarImage" title="shadowblitz" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=652046" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t0.roblox.com:80/9455da98ed877c052cc19b6f0c679147" border="0" alt="shadowblitz" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                11 minutes ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl01_UsernameHyperLink" href="User.aspx?ID=652046">shadowblitz</a>
                            </div>
                            <div class="Content">COME ON MAN U CAN DO BETTER AND also hottboy needs to respect more girls as a guy i think thats messed up -_-LOL</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl02_AvatarImage" title="zorbon16" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=204328" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t0.roblox.com:80/a72fff372f4ad3fa32abc459292c691e" border="0" alt="zorbon16" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                12 minutes ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl02_UsernameHyperLink" href="User.aspx?ID=204328">zorbon16</a>
                            </div>
                            <div class="Content">wHEN will U shut Up Roblox Angel?!?!?!?
<br/>ಠ_ಠ Stares !</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl03_AvatarImage" title="robo1337" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=459340" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t4.roblox.com:80/196a29db2483e882f8016496203e1c87" border="0" alt="robo1337" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                18 minutes ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl03_UsernameHyperLink" href="User.aspx?ID=459340">robo1337</a>
                            </div>
                            <div class="Content">lol this isnt favorite this was uploaded 4 hours ago</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl04_AvatarImage" title="HawiiBoo123" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=214682" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t1.roblox.com:80/b6f68aba2d26d5daa4f4a4798d96fe39" border="0" alt="HawiiBoo123" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                25 minutes ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl04_UsernameHyperLink" href="User.aspx?ID=214682">HawiiBoo123</a>
                            </div>
                            <div class="Content">robloxangel
<br/>l
<br/>l
<br/>l
<br/>V i seen hottboy and hes really annoying</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl05_AvatarImage" title="tyler222" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=568235" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t2.roblox.com:80/384294e96974f9809488a02fe4695cc9" border="0" alt="tyler222" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                25 minutes ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl05_UsernameHyperLink" href="User.aspx?ID=568235">tyler222</a>
                            </div>
                            <div class="Content">dude i love it here so is it ok if i make a moive here but i need some one to put it on u tube</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl06_AvatarImage" title="RobloxAngel08" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=569955" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t0.roblox.com:80/55ba512ed4fd2b8eb75102a6784c9cbd" border="0" alt="RobloxAngel08" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                52 minutes ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl06_UsernameHyperLink" href="User.aspx?ID=569955">RobloxAngel08</a>
                            </div>
                            <div class="Content">some dudes we're being preverted around me and 1 of those guys (which is one of them named hottboy) said robloxangel be my mom im only 10 and steven (another one of them) said robloxangel wanna go out anxd im taken and im too young for him (im trying to say this place is full of preverts!!!!)</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl07_AvatarImage" title="cesar777" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=475272" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t0.roblox.com:80/c474b4ca8dab7cb3cf9cbc4fc57cb29b" border="0" alt="cesar777" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                1 hour ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl07_UsernameHyperLink" href="User.aspx?ID=475272">cesar777</a>
                            </div>
                            <div class="Content">nice.
<br/></div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl08_AvatarImage" title="2BING8" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=552143" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t6.roblox.com:80/00ec9aa3549277700abb53c21de7ae4a" border="0" alt="2BING8" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                1 hour ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl08_UsernameHyperLink" href="User.aspx?ID=552143">2BING8</a>
                            </div>
                            <div class="Content">why do you advertise imyourbuilder(well kinda advertise)but still?!</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl09_AvatarImage" title="Imyourbuilder" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=368270" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t0.roblox.com:80/86690cc6cbd34cd8a0bf2eeb428c100d" border="0" alt="Imyourbuilder" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                1 hour ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl09_UsernameHyperLink" href="User.aspx?ID=368270">Imyourbuilder</a>
                            </div>
                            <div class="Content">come to my place</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl10_AvatarImage" title="Imyourbuilder" href="/web/20080713030836/http://www.roblox.com/User.aspx?ID=368270" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080713030836im_/http://t0.roblox.com:80/86690cc6cbd34cd8a0bf2eeb428c100d" border="0" alt="Imyourbuilder" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                1 hour ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl10_UsernameHyperLink" href="User.aspx?ID=368270">Imyourbuilder</a>
                            </div>
                            <div class="Content">come to my place</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    </div>
                    <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl11_FooterPagerPanel" class="FooterPager">
                  
                  <span id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl11_FooterPagerLabel">Page 1 of 33</span>
                  <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl11_FooterPageSelector_Next" href="javascript:__doPostBack('ctl00$cphRoblox$TabbedInfo$CommentaryTab$CommentsPane$CommentsRepeater$ctl11$FooterPageSelector_Next','')">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
                </div>
                
            
        </div>
    
      </div>
                      
                  
    </div>
  </div>
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

      <div style="clear: both;"/>
  </div>
  
  <div id="ctl00_cphRoblox_ItemPurchasePopupPanel" class="modalPopup" style="display: none">
  
    <div id="ctl00_cphRoblox_ItemPurchasePopupUpdatePanel">
    
        
      
  </div>
  
</div>
  
  <input type="hidden" name="ctl00$cphRoblox$HiddenField1" id="ctl00_cphRoblox_HiddenField1"/>
  <input type="hidden" name="ctl00$cphRoblox$HiddenField2" id="ctl00_cphRoblox_HiddenField2"/>
  <input type="hidden" name="ctl00$cphRoblox$HiddenField3" id="ctl00_cphRoblox_HiddenField3"/>
  

        </div>
        

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>