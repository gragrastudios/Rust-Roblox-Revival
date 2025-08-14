<?php  
$id = (int)htmlspecialchars($_GET['UserID']);
require($_SERVER['DOCUMENT_ROOT'].'/main/navbar.php');

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if(!$user) { exit('<center><h1>User was not found</h1></center>'); header('Location: /Error/DoesntExist.aspx'); }


$mysqli = $link;

$records_per_page = 12;

$query = "SELECT COUNT(*) AS total_users FROM friends WHERE (`sent_from` = ? AND `pending`='accepted') OR  (`sent_to` = ? AND `pending`='accepted')";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ii", $user['id'], $user['id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$total_users = $row['total_users'];

$total_pages = ceil($total_users / $records_per_page);

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($current_page > $total_pages) {
    $current_page = $total_pages;
}
if ($current_page < 1) {
    $current_page = 1;
}

$start_from = ($current_page - 1) * $records_per_page;

$query = "SELECT * FROM friends WHERE (`sent_from` = ? AND `pending`='accepted') OR  (`sent_to` = ? AND `pending`='accepted') LIMIT ?, ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("iiii", $user['id'], $user['id'], $start_from, $records_per_page);
$stmt->execute();
$result = $stmt->get_result();
$resultCheck = $result->num_rows;
?>
					
	<div id="FriendsContainer">
		

<div id="Friends">
	<h4><?php echo htmlspecialchars($user['username']); ?>'s Friends</h4>
    <div id="ctl00_cphRoblox_rbxFriendsPane_Pager1_PanelPages" align="center">
<?php
if ($current_page > 1) {
    ?>
<a id="ctl00_cphRoblox_rbxFriendsPane_Pager1_LinkButtonNext" href="?UserID=<?php echo $user['id']; ?>&page=<?php echo $current_page - 1; ?>">&lt;&lt; Previous</a>
    <?php
}
echo '    Pages: ';
if ($current_page < $total_pages) {
?>
<a id="ctl00_cphRoblox_rbxFriendsPane_Pager1_LinkButtonNext" href="?UserID=<?php echo $user['id']; ?>&page=<?php echo $current_page + 1; ?>">Next &gt;&gt;</a>
<?php
}
?>
</div>

	<table id="ctl00_cphRoblox_rbxFriendsPane_dlFriends" cellspacing="0" align="Center" border="0">
	<tr>
<?php
if ($resultCheck > 0) {
    
while ($row = $result->fetch_assoc()) {

    if ($row['sent_from'] == $user['id']) {
        $friendid = $row['sent_to'];
    } else {
        $friendid = $row['sent_from'];
    }
                  
    $sql = "SELECT * FROM users WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $friendid);
    $stmt->execute();
    $creatorq = $stmt->get_result();
    $creator = $creatorq->fetch_assoc();

?>

      <td>
      <div class="Friend">
        <div class="Avatar"><a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlAvatar" title="<?php echo $creator['username']; ?>" href="/User.aspx?ID=<?php echo $creator['id']; ?>" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img width="100" height="100" src="/Thumbs/Avatar.ashx?id=<?php echo $creator['id']; ?>&v=<?php echo rand(1,9999); ?>" border="0" id="img" alt="<?php echo $creator['username']; ?>" /></a></div>
        <div class="Summary">
          <span class="OnlineStatus">
    <img 
        id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_iOnlineStatus" 
        src="images/OnlineStatusIndicator_Is<?php 
            if ($creator['lastseen'] + 300 >= time()) { 
                echo 'Online'; 
            } else { 
                echo 'Offline'; 
            } 
        ?>.gif" 
        alt="<?php 
            echo $creator['username']; 
            echo ' is '; 
            if ($creator['lastseen'] + 300 >= time()) { 
                echo 'Online at Web Site'; 
            } else { 
                echo 'Offline'; 
                echo ' (last seen at ' . date('d/m/Y g:i A', (int)$creator['lastseen']) . ')';
            } 
        ?>." 
        style="border-width:0px;" 
    />
</span>

          <span class="Name"><a id="ctl00_cphRoblox_rbxFriendsPane_dlFriends_ctl00_hlFriend" href="User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo $creator['username']; ?></a></span>
        </div>
      </div>
    </td>
    
<?php 
    
        $counter++;

        if ($counter % 6 == 0) {
            echo "</tr><tr>";
        }
    }

    // Clean up any leftover row
    if ($counter % 6 !== 0) {
        echo "</tr>";
    }
        }else {
        echo '<center><p>This user doesnt have an '.$sitename.' friends.</p></center>';
    }
?>   
				</div>
			</div>
		</td>
	</tr>
</table>
	
</div>
	</div>

				</div>
<?php require($_SERVER['DOCUMENT_ROOT'].'/main/footer.php'); ?>