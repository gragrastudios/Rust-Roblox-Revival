<?php 
require($_SERVER['DOCUMENT_ROOT'].'/main/navbar.php'); 

$id = (int)$_GET['ID'];
if (!$id) {
    header("Location: /Error/DoesntExist.aspx");
    exit;
}

$stmt = $link->prepare("SELECT * FROM catalog WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$catalog = $result->fetch_assoc();
$stmt->close();

if (!$catalog) {
    header("Location: /Error/DoesntExist.aspx");
    exit;
}

$stmt = $link->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $catalog['creator']);
$stmt->execute();
$result = $stmt->get_result();
$creator = $result->fetch_assoc();
$stmt->close();

$datemade = $catalog["datemade"];

$sql = "SELECT * FROM owneditems WHERE user = ? AND item = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", $_USER['id'], $id);
$stmt->execute();
$ownedyuhq = $stmt->get_result();
$ownedyuh = $ownedyuhq->fetch_assoc();

$types = [
    "hat" => "Hat",
    "head" => "Head",
    "face" => "Face",
    "shirt" => "Shirt",
    "pants" => "Pants",
    "tshirt" => "T-Shirt"
];
?>

<div id="Body">
<div id="ItemContainer">
  <div id="Item">
    <h2><?php echo htmlspecialchars($catalog['name']); ?></h2>
    <div id="Details">
      <div id="Thumbnail">
        <a title="<?php echo htmlspecialchars($catalog['name']); ?>" style="display:inline-block;height:250px;width:250px;"><img src="/Thumbs/Item.ashx?id=<?php echo $catalog['id']; ?>" border="0" id="img" alt="/Thumbs/Item.ashx?id=<?php echo $catalog['id']; ?>" style="display:inline-block;height:250px;width:250px;"></a>
      </div>
 			    <div id="Summary">
				    <h3><?=$sitename?> <?php echo $types[$catalog["type"]]; ?></h3>
				   
	    <?php 
    if(!$ownedyuh) {
	    
	    //if the buywith is tix show this
        if ($catalog['buywith'] === 'tix') { ?>
    
        <div id="ctl00_cphRoblox_TicketsPurchasePanel">
            <div id="TicketsPurchase">
                <div id="PriceInTickets">Tx: <?php echo htmlspecialchars($catalog['price']); ?></div>
                <div id="BuyWithTickets">
                <a id="ctl00_cphRoblox_PurchaseWithTicketsButton" class="Button" href="/api/buyitem.ashx?ID=<?php echo htmlspecialchars($catalog['id']); ?>&type=<?php echo htmlspecialchars($catalog['type']); ?>">Buy with Tx</a>
            </div>
        </div>
        <?php 
	    //if the buywith is robux aka rustbux show this
        } elseif ($catalog['buywith'] === 'robux') { ?>
         <div id="ctl00_cphRoblox_RobuxPurchasePanel">
        
            <div id="RobuxPurchase">
                <div id="PriceInRobux">R$: <?php echo htmlspecialchars($catalog['price']); ?></div>
                <div id="BuyWithRobux">
                    <a id="ctl00_cphRoblox_PurchaseWithRobuxButton" class="Button" href="/api/buyitem.ashx?ID=<?php echo         htmlspecialchars($catalog['id']); ?>&type=<?php echo htmlspecialchars($catalog['type']); ?>">Buy with R$</a>
                    </div>
                </div>
            <?php 
            //if the buywith is not rustbux or tix show this
            } elseif ($catalog['buywith'] === 'free') { ?>
            <div id="ctl00_cphRoblox_FreePurchasePanel">
        
                <div id="PublicDomainPurchase">
                        <div id="PricePublicDomain">Free</div>
                        <div id="BuyWithFree">
                            <a id="ctl00_cphRoblox_PurchaseWithFreeButton" class="Button" href="/api/buyitem.ashx?ID=<?php echo htmlspecialchars($catalog['id']); ?>&type=<?php echo htmlspecialchars($catalog['type']); ?>">Take One!</a>
                            </div>
                        </div>
            <?php
            } 
            ?>
</div>
            <?php
            } 
            ?>
				    <div id="Creator" class="Creator">
                        <div class="Avatar">
                            <a id="ctl00_cphRoblox_AvatarImage" title="<?php echo htmlspecialchars($creator['username']); ?>" href="/User.aspx?ID=<?php echo $catalog['creator']; ?>" style="display:inline-block;cursor:pointer;"><img src="/Thumbs/Avatar.ashx?id=<?php echo $creator['id']; ?>&v=<?php echo rand(1,9999); ?>" width="100" height="100" border="0" alt="<?php echo htmlspecialchars($creator['username']); ?>" blankurl="http://t6.roblox.com:80/blank-100x100.gif"/></a>
                        </div>
                        Creator: <a id="ctl00_cphRoblox_CreatorHyperLink" href="User.aspx?ID=<?php echo $catalog['creator']; ?>"><?php echo htmlspecialchars($creator['username']); ?></a>
                    </div>
				    <div id="LastUpdate">Updated: <?php echo TimeAgo($datemade); ?></div>
				    <div id="Favorited">Favorited: 0 times</div>
				    
				    <div id="ctl00_cphRoblox_DescriptionPanel">
	
					    <div id="DescriptionLabel">Description:</div>
					    <div id="Description"><?php echo htmlspecialchars($catalog['description']); ?></div>
				    
</div>
	                <div id="ReportAbuse"><div id="ctl00_cphRoblox_AbuseReportButton1_AbuseReportPanel" class="ReportAbusePanel">
	
    <span class="AbuseIcon"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseIconHyperLink" href="AbuseReport/AssetVersion.aspx?ID=<?php echo htmlspecialchars($catalog['id']); ?>"><img src="/images/abuse.png"alt="Report Abuse" border="0"/></a></span>
    <span class="AbuseButton"><a id="ctl00_cphRoblox_AbuseReportButton1_ReportAbuseTextHyperLink" href="AbuseReport/AssetVersion.aspx?ID=<?php echo htmlspecialchars($catalog['id']); ?>">Report Abuse</a></span>

</div></div>
			    </div>
<?php if($loggedin == 'yes') { ?>
			        <div id="Actions" style="width:240px;">
      <?php $_1 = mysqli_num_rows(mysqli_query($link, "SELECT * FROM favorites WHERE uid='".$_USER['id']."' AND itemid='".$catalog['id']."'"));
if ($_1 == 0){?>
                      <a href="/api/favorite.php?id=<?=$itemid;?>">Favorite</a>
      <?}else{?>
      <a href="/api/unfavorite.php?id=<?=$itemid;?>">Unfavorite</a>
      <?}?>
                              </div>
<?php } ?>
		<?php if($ownedyuh) { ?>
            <div id="Ownership">
        You own this item
      </div>
	    <?php } ?>
			    
			    
			    <div style="clear: both;"></div>
			</div>
			<div style="margin: 10px; width: 703px;">
			    <div class="ajax__tab_xp" id="TabbedInfo">
	<div id="TabbedInfo_header">
		<span id="__tab_TabbedInfo_CommentaryTab">
			                <h3 style="color: #555;">Commentary</h3>
			            </span>
	</div><div id="TabbedInfo_body">
		<div id="TabbedInfo_CommentaryTab" style="display:block;">
			
			                <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsUpdatePanel">
				
        <div class="CommentsContainer">
            
                    <h3>Comments (2705)</h3>
                    <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerPanel" class="HeaderPager">
			            
			            <span id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPagerLabel">Page 1 of 271</span>
			            <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl00_HeaderPageSelector_Next" href="javascript:__doPostBack('ctl00$cphRoblox$TabbedInfo$CommentaryTab$CommentsPane$CommentsRepeater$ctl00$HeaderPageSelector_Next','')">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
		            </div>
		            <div class="Comments">
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl01_AvatarImage" title="richy6987" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=614038" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t6.roblox.com:80/9cb40bdf4c6f93696345878db3cb6024" border="0" alt="richy6987" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                1 hour ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl01_UsernameHyperLink" href="User.aspx?ID=614038">richy6987</a>
                            </div>
                            <div class="Content">i dont know how to enter contest</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl02_AvatarImage" title="kathyriolu" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=402546" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t6.roblox.com:80/eea84c54cdb01610841825e6d8c0e2ae" border="0" alt="kathyriolu" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                1 hour ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl02_UsernameHyperLink" href="User.aspx?ID=402546">kathyriolu</a>
                            </div>
                            <div class="Content">i dot know wat will happen if u won a vid contest yet ur not a builder club member</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl03_AvatarImage" title="barry4276" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=402560" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t2.roblox.com:80/7852eb8d9b2294628f4b647cfb07a7be" border="0" alt="barry4276" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                1 hour ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl03_UsernameHyperLink" href="User.aspx?ID=402560">barry4276</a>
                            </div>
                            <div class="Content">i wonder how much tx and robux roblox has.......................
<br/>
<br/>lioke 10000000000 of each</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl04_AvatarImage" title="SuperJasonDB" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=283353" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t7.roblox.com:80/99f0fcc888b0ac8fe6799c4f9392a09b" border="0" alt="SuperJasonDB" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                2 hours ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl04_UsernameHyperLink" href="User.aspx?ID=283353">SuperJasonDB</a>
                            </div>
                            <div class="Content">you know im not a noob and all but if they do sell it it should be like over 100,000 tix</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl05_AvatarImage" title="blabmovies" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=131876" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t6.roblox.com:80/acec9962cde437c9c923574f93d80c61" border="0" alt="blabmovies" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                2 hours ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl05_UsernameHyperLink" href="User.aspx?ID=131876">blabmovies</a>
                            </div>
                            <div class="Content">If you post "How do I get this?!" Or "Please give me one!" past this I am gonna have proof that no one reads</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl06_AvatarImage" title="cymru792" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=172346" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t3.roblox.com:80/d007e45fe26a8ddd67d23a75f69a325b" border="0" alt="cymru792" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                2 hours ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl06_UsernameHyperLink" href="User.aspx?ID=172346">cymru792</a>
                            </div>
                            <div class="Content">sell it, like the teddy bear hat. i forgot to enter the contest :(</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl07_AvatarImage" title="valitini94" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=66571" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t2.roblox.com:80/5ec88b75ebdca11262591c3045e21e60" border="0" alt="valitini94" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                3 hours ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl07_UsernameHyperLink" href="User.aspx?ID=66571">valitini94</a>
                            </div>
                            <div class="Content">Don't sell it like the teddy bear hat. </div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl08_AvatarImage" title="Rebeltopi" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=224228" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t4.roblox.com:80/9f09a853cb7b3e9d2edf4c8ab593ef6f" border="0" alt="Rebeltopi" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                3 hours ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl08_UsernameHyperLink" href="User.aspx?ID=224228">Rebeltopi</a>
                            </div>
                            <div class="Content">i pay 105 tickets For it</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="Comment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl09_AvatarImage" title="kongking85" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=638517" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t0.roblox.com:80/bef0c2c2c8f9afbb3638d5e9f5894451" border="0" alt="kongking85" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                3 hours ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl09_UsernameHyperLink" href="User.aspx?ID=638517">kongking85</a>
                            </div>
                            <div class="Content">its a cool hat man
<br/></div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    <div class="AlternateComment">
                        <div class="Commenter">
                            <div class="Avatar">
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl10_AvatarImage" title="sadboyboy" href="/web/20080711105533/http://www.roblox.com/User.aspx?ID=284966" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711105533im_/http://t0.roblox.com:80/2a4e722483cbc03d0ca9ed8d9294493f" border="0" alt="sadboyboy" blankurl="http://t6.roblox.com:80/blank-64x64.gif"/></a></div>
                        </div>
                        <div class="Post">
                            <div class="Audit">
                                Posted
                                4 hours ago
                                by
                                <a id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl10_UsernameHyperLink" href="User.aspx?ID=284966">sadboyboy</a>
                            </div>
                            <div class="Content">cool hat just can,t get it</div>
                            
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                
                    </div>
                    <div id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl11_FooterPagerPanel" class="FooterPager">
			            
			            <span id="ctl00_cphRoblox_TabbedInfo_CommentaryTab_CommentsPane_CommentsRepeater_ctl11_FooterPagerLabel">Page 1 of 271</span>
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
      </div>
  <div style="clear: both;"></div>
  </div>
<?php require($_SERVER['DOCUMENT_ROOT'].'/main/footer.php'); ?>