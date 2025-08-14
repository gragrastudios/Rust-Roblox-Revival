<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");

if(!(int)$_GET['c']) {
    $catagoryid = "8";
}else {
    $catagoryid = (int)$_GET['c'];
}

switch ($catagoryid) {
    case "2":
        $catagory = "tshirt";
        break;
    case "11":
        $catagory = "shirt";
        break;
    case "12":
        $catagory = "pants";
        break;
    case "8":
        $catagory = "hat";
        break;
    case "13":
        $catagory = "decal";
        break;
    case "10":
        $catagory = "model";
        break;
}

$mysqli = $link;

$records_per_page = 20;

$query = "SELECT COUNT(*) AS total_users FROM catalog WHERE type = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $catagory);
$stmt->execute();
$result = $stmt->get_result();
$thing = $result->fetch_assoc();
$total_users = $thing['total_users'];

$total_pages = ceil($total_users / $records_per_page);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($current_page > $total_pages) {
    $current_page = $total_pages;
}
if ($current_page < 1) {
    $current_page = 1;
}

$start_from = ($current_page - 1) * $records_per_page;

$query = "SELECT * FROM catalog WHERE type = '".$catagory."' LIMIT $start_from, $records_per_page";
$result = $mysqli->query($query);

?>
<div id="CatalogContainer">
    <div id="SearchBar" class="SearchBar">
        <span class="SearchBox"><input name="ctl00$cphRoblox$rbxCatalog$SearchTextBox" type="text" maxlength="100" id="ctl00_cphRoblox_rbxCatalog_SearchTextBox" class="TextBox"/></span>
        <span class="SearchButton"><input type="submit" name="ctl00$cphRoblox$rbxCatalog$SearchButton" value="Search" id="ctl00_cphRoblox_rbxCatalog_SearchButton"/></span>
    </div>
    <div class="DisplayFilters">
      <h2>Catalog</h2>
      <div id="BrowseMode">
      <h4><a id="" target="_blank">Buy <?=$sitename?> Stuff!</a></h4>
        <h4>Browse</h4>
        <ul>
            <li><img id="ctl00_cphRoblox_rbxCatalog_BrowseModeTopFavoritesBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeTopFavoritesSelector" href="/Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=PastWeek&amp;d=All"><b>Top Favorites</b></a></li>
            <li><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeBestSellingSelector" href="Catalog.aspx?m=BestSelling&amp;c=8&amp;t=PastWeek&amp;d=All">Best Selling</a></li>
            <li><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeRecentlyUpdatedSelector" href="Catalog.aspx?m=RecentlyUpdated&amp;c=8">Recently Updated</a></li>
          <li><a id="ctl00_cphRoblox_rbxCatalog_BrowseModeForSaleSelector" href="Catalog.aspx?m=ForSale&amp;c=8&amp;d=All">For Sale</a></li>
          <li><a id="ctl00_cphRoblox_rbxCatalog_BrowseModePublicDomainSelector" href="Catalog.aspx?m=PublicDomain&amp;c=8">Public Domain</a></li>
        </ul>
      </div>
      <div id="Category">
        <h4>Category</h4>
        
            <ul>
          
            <li>
              
              <?php if($catagory == 'tshirt') {
                        echo '<img id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl04_SelectedCategoryBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/>';
                    }
              ?><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl01_AssetCategorySelector" href="Catalog.aspx?m=TopFavorites&amp;c=2&amp;t=PastWeek&amp;d=All">T-Shirts</a>
            </li>
          
            <li>
              
              <?php if($catagory == 'shirt') {
                        echo '<img id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl04_SelectedCategoryBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/>';
                    }
              ?><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl02_AssetCategorySelector" href="Catalog.aspx?m=TopFavorites&amp;c=11&amp;t=PastWeek&amp;d=All">Shirts</a>
            </li>
          
            <li>
              
              <?php if($catagory == 'pants') {
                        echo '<img id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl04_SelectedCategoryBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/>';
                    }
              ?><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl03_AssetCategorySelector" href="Catalog.aspx?m=TopFavorites&amp;c=12&amp;t=PastWeek&amp;d=All">Pants</a>
            </li>
          
            <li>
              <?php if($catagory == 'hat') {
                        echo '<img id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl04_SelectedCategoryBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/>';
                    }
              ?><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl04_AssetCategorySelector" href="Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=PastWeek&amp;d=All">Hats</a>
            </li>
          
            <li>
              <?php if($catagory == 'decal') {
                        echo '<img id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl04_SelectedCategoryBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/>';
                    }
              ?><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl05_AssetCategorySelector" href="Catalog.aspx?m=TopFavorites&amp;c=13&amp;t=PastWeek&amp;d=All">Decals</a>
            </li>
          
            <li>
             <?php if($catagory == 'model') {
                        echo '<img id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl04_SelectedCategoryBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/>';
                    }
              ?><a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl06_AssetCategorySelector" href="Catalog.aspx?m=TopFavorites&amp;c=10&amp;t=PastWeek&amp;d=All">Models</a>
            </li>
          
            <li>
              
              <a id="ctl00_cphRoblox_rbxCatalog_AssetCategoryRepeater_ctl07_AssetCategorySelector" href="Catalog.aspx?m=TopFavorites&amp;c=9&amp;t=PastWeek&amp;d=All">Places</a>
            </li>
          
            </ul>
          
      </div>
      
      <div id="ctl00_cphRoblox_rbxCatalog_Timespan">
        <h4>Time</h4>
        <ul>
          <li><a id="ctl00_cphRoblox_rbxCatalog_TimespanPastDaySelector" href="Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=PastDay&amp;d=All">Past Day</a></li>
          <li><img id="ctl00_cphRoblox_rbxCatalog_TimespanPastWeekBullet" class="GamesBullet" src="/images/games_bullet.png" border="0"/><a id="ctl00_cphRoblox_rbxCatalog_TimespanPastWeekSelector" href="Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=PastWeek&amp;d=All"><b>Past Week</b></a></li>
          <li><a id="ctl00_cphRoblox_rbxCatalog_TimespanPastMonthSelector" href="Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=PastMonth&amp;d=All">Past Month</a></li>
          <li><a id="ctl00_cphRoblox_rbxCatalog_TimespanAllTimeSelector" href="Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=AllTime&amp;d=All">All-time</a></li>
        </ul>
      </div>
    </div>
    <div class="Assets">
        <span id="ctl00_cphRoblox_rbxCatalog_AssetsDisplaySetLabel" class="AssetsDisplaySet">Favorite Hats, Past Week</span>
<?php

echo '<div id="ctl00_cphRoblox_rbxCatalog_HeaderPagerPanel" class="HeaderPager">';
if ($current_page > 1) {
    ?>
<a id="ctl00_cphRoblox_rbxCatalog_HeaderPagerHyperLink_Previous" href="Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=PastWeek&amp;d=All&amp;q=&amp;page=<?php echo $current_page - 1; ?>"><span class="NavigationIndicators">&lt;&lt;</span> Previous</a>
    <?php
}
echo '<span id="ctl00_cphRoblox_rbxCatalog_HeaderPagerLabel">Page '.$current_page.' of '.$total_pages.'</span>';
if ($current_page < $total_pages) {
?>
    <a id="ctl00_cphRoblox_rbxCatalog_HeaderPagerHyperLink_Next" href="Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=PastWeek&amp;d=All&amp;q=&amp;page=<?php echo $current_page + 1; ?>">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
<?php
}
?>
      </div>
      <table id="ctl00_cphRoblox_rbxCatalog_AssetsDataList" cellspacing="0" style="margin-left: -10px;" align="center" border="0" width="735">
  <tr>
<?php

while ($row = $result->fetch_assoc()) {

$stmt1 = $link->prepare("SELECT * FROM users WHERE id = ?");
$stmt1->bind_param("i", $row['creator']);
$stmt1->execute();
$creator = $stmt1->get_result()->fetch_assoc();
$stmt1->close();
$datemade = $row["datemade"];
?>
                  
<td valign="top" style="display: inline-block; padding: 11px;">
            <div class="Asset">
              <div class="AssetThumbnail">
                <a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl06_AssetThumbnailHyperLink" title="<?php echo htmlspecialchars($row['name']); ?>" href="/Item.aspx?ID=<?php echo $row['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/Thumbs/Item.ashx?id=<?php echo (int)$row['id']; ?>" width="120" height="120" border="0" alt="<?php echo htmlspecialchars($row['name']); ?>" blankurl="http://t6.roblox.com:80/blank-120x120.gif"/></a>
              </div>
              <div class="AssetDetails">
                <div class="AssetName"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl06_AssetNameHyperLink" href="Item.aspx?ID=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></a></div>
                <div class="AssetLastUpdate"><span class="Label">Updated:</span> <span class="Detail"><?php echo TimeAgo($datemade); ?></span></div>
                <div class="AssetCreator"><span class="Label">Creator:</span> <span class="Detail"><a id="ctl00_cphRoblox_rbxCatalog_AssetsDataList_ctl06_CreatorHyperLink" href="User.aspx?ID=<?php echo $row['creator']; ?>"><?php echo htmlspecialchars($creator['username']); ?></a></span></div>
                <div class="AssetsSold"><span class="Label">Number Sold:</span> <span class="Detail">soon</span></div>
                <div class="AssetFavorites"><span class="Label">Favorited:</span> <span class="Detail">soon times</span></div>
                <?php if ($row['buywith'] === 'tix') { ?>
                <div class="AssetPrice"><span class="PriceInTickets">Tx: <?php echo htmlspecialchars($row['price']); ?></span></div>
                <?php } elseif ($row['buywith'] === 'robux') { ?>
                <div class="AssetPrice"><span class="PriceInRobux">R$: <?php echo htmlspecialchars($row['price']); ?></span></div>
                <?php } elseif ($row['buywith'] === 'free') { ?>
                <?php } ?>
              </div>
          </div>
        </td>
<?php } ?>
                
                
  </tr>
</table>
        <br>
<?php

echo '<div id="ctl00_cphRoblox_rbxCatalog_HeaderPagerPanel" class="HeaderPager">';
if ($current_page > 1) {
    ?>
<a id="ctl00_cphRoblox_rbxCatalog_FooterPagerHyperLink_Previous" href="Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=PastWeek&amp;d=All&amp;q=&amp;page=<?php echo $current_page - 1; ?>"><span class="NavigationIndicators">&lt;&lt;</span> Previous</a>
    <?php
}
echo '<span id="ctl00_cphRoblox_rbxCatalog_FooterPagerLabel">Page '.$current_page.' of '.$total_pages.'</span>';
if ($current_page < $total_pages) {
?>
    <a id="ctl00_cphRoblox_rbxCatalog_HeaderPagerHyperLink_Next" href="Catalog.aspx?m=TopFavorites&amp;c=8&amp;t=PastWeek&amp;d=All&amp;q=&amp;page=<?php echo $current_page + 1; ?>">Next <span class="NavigationIndicators">&gt;&gt;</span></a>
<?php
}
?>
        </div>
    </div>
    <div style="clear: both;"/>
</div>

        </div>
        

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
 ?>