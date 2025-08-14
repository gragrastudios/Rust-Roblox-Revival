<?php require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php"); ?>
			<div id="Body">
					
	<div id="FriendsContainer">
		
		<?php 

$sql = "SELECT * FROM friends WHERE (`sent_from` = ? AND `pending` = 'accepted') OR (`sent_to` = ? AND `pending` = 'accepted')";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", $_USER['id'], $_USER['id']);
$stmt->execute();
$result = $stmt->get_result();
$resultCheck = $result->num_rows;

?>

<div id="Friends">
	<h4>My Friends (<?php echo $resultCheck; ?>)</h4>
    <div id="ctl00_cphRoblox_rbxEditFriendsPane_Pager1_PanelPages" style="text-align:center;">
	
    Pages:
    
    
</div>

	<table id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends" cellspacing="0" align="Center" border="0" style="border-collapse:collapse;">
	<tr>
		<td>
		    <?php
$counter = 0;

if ($resultCheck > 0) {
    while ($row = $result->fetch_assoc()) {

        if ($row['sent_from'] == $_USER['id']) {
            $friendid = $row['sent_to'];
        } else {
            $friendid = $row['sent_from'];
        }

        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i", $friendid);
        $stmt->execute();
        $creatorq = $stmt->get_result();
        $creator = $creatorq->fetch_assoc();
        $stmt->close();

        if (!$creator) continue;
?>

			<div class="Friend" onmouseover="this.style.borderStyle='outset';this.style.margin='6px'" onmouseout="this.style.borderStyle='none';this.style.margin='10px'">
				<div class="Avatar">
				    <a id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends_ctl00_hlAvatar" title="<?php echo htmlspecialchars($creator['username']); ?>" href="/User.aspx?ID=<?php echo $creator['id']; ?>" style="display:inline-block;height:100px;width:100px;cursor:pointer;"><img width="100" height="100" src="/Thumbs/Avatar.ashx?id=<?php echo $creator['id']; ?>&v=<?php echo rand(1, 9999); ?>" border="0" alt="<?php echo htmlspecialchars($creator['username']); ?>" /></a>
				</div>
				<div class="Summary">
					<span class="OnlineStatus"><img id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends_ctl00_iOnlineStatus" src="../images/OnlineStatusIndicator_Is<?php 
                        echo ($creator['lastseen'] + 300 >= time()) ? 'Online' : 'Offline'; 
                    ?>.gif" alt="<?php 
                        echo $creator['username'] . ' is ';
                        echo ($creator['lastseen'] + 300 >= time()) 
                            ? 'online' 
                            : 'offline (last seen at ' . date('d/m/Y g:i A', (int)$creator['lastseen']) . ')';
                    ?>" style="border-width:0px;" /></span>
					<span class="Name"><a id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends_ctl00_hlFriend" href="../User.aspx?ID=<?php echo $creator['id']; ?>"><?php echo htmlspecialchars($creator['username']); ?></a></span>
				</div>
				<div class="Options"><input type="submit" name="ctl00$cphRoblox$rbxEditFriendsPane$dlFriends$ctl00$bDelete" value="Delete" id="ctl00_cphRoblox_rbxEditFriendsPane_dlFriends_ctl00_bDelete" /></div>
			</div>
	<?php
    }
}
?>  
		</td><td></td><td></td><td></td>
	</tr>
</table>
</div>
	</div>
	

				</div>
<?php require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php"); ?>