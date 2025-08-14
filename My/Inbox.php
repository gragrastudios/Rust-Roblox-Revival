<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");
if($loggedin == 'no'){header('Location: /Login/Default.aspx'); exit();}

$mysqli = $link;

$records_per_page = 10;

$query = "SELECT COUNT(*) AS total_users FROM messages WHERE sent_to = '".$_USER['id']."'";
$result = $mysqli->query($query);
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

$query = "SELECT * FROM messages WHERE sent_to = '".$_USER['id']."' ORDER BY date_created DESC LIMIT $start_from, $records_per_page";
$result = $mysqli->query($query);
?>
					
	<div id="InboxContainer">
	    <div id="InboxPane">
            <h2>Inbox</h2>
		    <div id="Inbox">
			    
			    <div>
	<table cellspacing="0" cellpadding="3" border="0" id="ctl00_cphRoblox_InboxGridView" style="width:726px;border-collapse:collapse;">
		<tr class="InboxHeader">
			<th align="left" scope="col">
							    <input id="ctl00_cphRoblox_InboxGridView_ctl01_SelectAllCheckBox" type="checkbox" name="ctl00$cphRoblox$InboxGridView$ctl01$SelectAllCheckBox" onclick="javascript:setTimeout('__doPostBack(\'ctl00$cphRoblox$InboxGridView$ctl01$SelectAllCheckBox\',\'\')', 0)" />
						    </th><th align="left" scope="col"><a href="javascript:__doPostBack('ctl00$cphRoblox$InboxGridView','Sort$m.[Subject]')">Subject</a></th><th align="left" scope="col"><a href="javascript:__doPostBack('ctl00$cphRoblox$InboxGridView','Sort$u.[userName]')">From</a></th><th align="left" scope="col"><a href="javascript:__doPostBack('ctl00$cphRoblox$InboxGridView','Sort$m.[Created]')">Date</a></th>
		</tr>
		
<?php

while ($message = $result->fetch_assoc()) {
    
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $message['sent_from']);
$stmt->execute();
$userq = $stmt->get_result();
$user = $userq->fetch_assoc();
?>
		
		<tr class="InboxRow">
			<td>
							    <span style="display:inline-block;width:25px;"><input id="ctl00_cphRoblox_InboxGridView_ctl02_DeleteCheckbox" type="checkbox" name="ctl00$cphRoblox$InboxGridView$ctl02$DeleteCheckbox" /></span>
						    </td><td align="left"><a href="PrivateMessage.aspx?MessageID=<?php echo $message['id']; ?>" style="display:inline-block;width:325px;"><?php echo $message['subject']; ?></a></td><td align="left">
							    <a id="ctl00_cphRoblox_InboxGridView_ctl02_hlAuthor" title="Visit <?php echo $user['username']; ?>'s Home Page" href="../User.aspx?ID=<?php echo $user['id']; ?>" style="display:inline-block;width:175px;"><?php echo $user['username']; ?></a>
						    </td><td align="left"><?php echo $message['date_created']; ?></td>
		</tr>

<?php } ?>	

		<tr class="InboxPager">
			<td colspan="4"><table border="0">
				<tr>
				    
<?php

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
        echo "<td><span>".$i."</span></td>";
    } else {
        echo '<td><a href="?page='.$i.'">'.$i.'</a></td>';
    }
}
?>				    
				</tr>
			</table></td>
		</tr>
	</table>
</div>
		    </div>
		    <div class="Buttons">
			    <a id="ctl00_cphRoblox_DeleteButton" class="Button" href="javascript:__doPostBack('ctl00$cphRoblox$DeleteButton','')">Delete</a>
			    <a id="ctl00_cphRoblox_CancelHyperLink" class="Button" href="../User.aspx">Cancel</a>
		    </div>
		</div>
</div>
		<div style="clear: both;"></div>
	</div>

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>