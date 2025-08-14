<?php 

require $_SERVER['DOCUMENT_ROOT'] . '/main/config.php';

$inttype = (int)$_POST['type'];

switch ($inttype) {
    case "4":
        $type = "hat";
        $types = "hats";
        break;
    case "10":
        $type = "pants";
        $types = "pants";
        break;
    case "8":
        $type = "shirt";
        $types = "shirts";
        break;
    case "6":
        $type = "tshirt";
        $types = "T-Shirts";
        break;
}

$records_per_page = 8;

$query = "SELECT COUNT(*) AS total_users FROM owneditems WHERE user = ? AND type = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("is", $_USER['id'], $type);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$total_users = $row['total_users'];

if($total_users <= 0) {
    exit("<center>No ".$types." have been found.</center>");
}

$total_pages = ceil($total_users / $records_per_page);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($current_page > $total_pages) {
    $current_page = $total_pages;
}
if ($current_page < 1) {
    $current_page = 1;
}

$start_from = ($current_page - 1) * $records_per_page;

$sql = "SELECT * FROM owneditems WHERE user = ? AND type = ? LIMIT $start_from, $records_per_page";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("is", $_USER['id'], $type);
$stmt->execute();
$result = $stmt->get_result();

?>
                                    <div class="TileGroup">
<?php 

while ($row = $result->fetch_assoc()) {
    
$sql = "SELECT * FROM catalog WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $row['item']);
$stmt->execute();
$itemq = $stmt->get_result();
$item = $itemq->fetch_assoc();

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $item['creator']);
$stmt->execute();
$creatorq = $stmt->get_result();
$creator = $creatorq->fetch_assoc();

// to check if they are wearing it lol
$sql = "SELECT * FROM wearing WHERE userid = ? AND itemid = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", $_USER['id'], $item['id']);
$stmt->execute();
$wearingq = $stmt->get_result();
$wearing = $wearingq->fetch_assoc();

if($wearing) {
    $weartext = "remove";
}else {
    $weartext = "wear";
}

?>                                        
                                    <div class="Asset">
                                        <div class="AssetThumbnail">
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireListView_ctrl0_ctl00_AssetThumbnailHyperLink" title="click to <?php echo $weartext; ?>" onclick="<?php echo $weartext; ?>(<?php echo $item['id']; ?>, <?php echo $inttype; ?>)" style="display:inline-block;height:110px;width:110px;cursor:pointer;"><img src="/Thumbs/Item.aspx?id=<?php echo $item['id']; ?>" width="110" height="110" border="0" onerror="return Roblox.Controls.Image.OnError(this)" alt="click to <?php echo $weartext; ?>" /></a>
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireListView_ctrl0_ctl00_WearAccoutrementButton" title="click to <?php echo $weartext; ?>" class="DeleteButtonOverlay" href="javascript:<?php echo $weartext; ?>(<?php echo $item['id']; ?>, <?php echo $inttype; ?>)">[ <?php echo $weartext; ?> ]</a>
                                            
                                        </div>
                                        <div class="AssetDetails">
                                            <div class="AssetName">
                                                <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireListView_ctrl0_ctl00_AssetNameHyperLink" title="click to view" href="/Item.aspx?ID=<?php echo $item['id']; ?>"><?php echo htmlspecialchars($item['name']); ?></a></div>
                                            <div class="AssetCreator">
                                                <span class="Label">Creator:</span> <span class="Detail">
                                                    <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireListView_ctrl0_ctl00_AssetCreatorHyperLink" href="../User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span></div>
                                        </div>
                                    </div>
<?php } ?>
                                
                                    </div>
                                
                                    </div>
                                
                            <div class="FooterPager">
                                <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireDataPager_Footer"><a disabled="disabled">First</a>&nbsp;<a disabled="disabled">Previous</a>&nbsp;<span>1</span>&nbsp;<a href="javascript:__doPostBack('ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireDataPager_Footer$ctl01$ctl01','')">2</a>&nbsp;<a href="javascript:__doPostBack('ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireDataPager_Footer$ctl01$ctl02','')">3</a>&nbsp;<a href="javascript:__doPostBack('ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireDataPager_Footer$ctl01$ctl03','')">4</a>&nbsp;<a href="javascript:__doPostBack('ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireDataPager_Footer$ctl01$ctl04','')">5</a>&nbsp;&nbsp;<a href="javascript:__doPostBack('ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireDataPager_Footer$ctl01$ctl05','')">...</a>&nbsp;<a href="javascript:__doPostBack('ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireDataPager_Footer$ctl02$ctl00','')">Next</a>&nbsp;<a href="javascript:__doPostBack('ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireDataPager_Footer$ctl02$ctl01','')">Last</a>&nbsp;</span>
                            </div>
                            
                                                </div>