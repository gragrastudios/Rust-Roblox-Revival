<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/navbar.php");

$mysqli = $link;

$records_per_page = 10;

$query = "SELECT COUNT(*) AS total_users FROM users";
$stmt = $mysqli->prepare($query);
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

$query = "SELECT * FROM users ORDER BY lastseen DESC LIMIT ?, ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ii", $start_from, $records_per_page);
$stmt->execute();
$result = $stmt->get_result();
?>


          
    
    <div id="ctl00_cphRoblox_Panel1">
  
      <div id="BrowseContainer" style="text-align:center">
        <input name="ctl00$cphRoblox$FormSubmitWithoutOnClickEventWorkaround" type="text" value="http://aspnet.4guysfromrolla.com/articles/060805-1.aspx" id="ctl00_cphRoblox_FormSubmitWithoutOnClickEventWorkaround" style="visibility:hidden;display:none;"/>
        <input name="ctl00$cphRoblox$tbSearch" type="text" maxlength="100" id="ctl00_cphRoblox_tbSearch"/>&nbsp;<a id="ctl00_cphRoblox_lbSearch" href="javascript:__doPostBack('ctl00$cphRoblox$lbSearch','')">Search</a>
        <br/><br/>
        
            
            <div>
<table class="Grid" cellspacing="0" cellpadding="4" border="0" id="ctl00_cphRoblox_gvUsersBrowsed">
      <tr class="GridHeader">
        <th scope="col">Avatar</th><th scope="col"><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Sort$userName')">Name</a></th><th scope="col">Status</th><th scope="col"><a href="javascript:__doPostBack('ctl00$cphRoblox$gvUsersBrowsed','Sort$lastActivity')">Location / Last Seen</a></th>
      </tr>
<?php

while ($user = $result->fetch_assoc()) {
?>

<tr class="GridItem">
        <td>
                                   <a id="ctl00_cphRoblox_gvUsersBrowsed_ctl02_hlAvatar" title="<?php echo htmlspecialchars($user['username']); ?>" href="User.aspx?ID=<?php echo $user['id']; ?>" style="display:inline-block;cursor:pointer;"><img src="/Thumbs/Avatar.ashx?id=<?php echo $user['id']; ?>&rand=<?php echo rand(1,9999); ?>" width="48"  height="48" border="0" alt="<?php echo htmlspecialchars($user['username']); ?>"/></a>
                  </td><td>
                    <a id="ctl00_cphRoblox_gvUsersBrowsed_ctl02_hlName" href="User.aspx?ID=<?php echo $user['id']; ?>"><?php echo htmlspecialchars($user['username']); ?></a><br/>
                    <span id="ctl00_cphRoblox_gvUsersBrowsed_ctl02_lBlurb"><?php echo htmlspecialchars_decode($user['description']); ?></span>
                  </td><td>
                    <span id="ctl00_cphRoblox_gvUsersBrowsed_ctl02_lblUserOnlineStatus"><?php if($user['lastseen'] + 300 >= time()){ echo 'Online'; }else { echo 'Offline'; } ?></span><br/>
                  </td><td>
                    <span id="ctl00_cphRoblox_gvUsersBrowsed_ctl02_lblUserLocationOrLastSeen"><?php if($user['lastseen'] + 300 >= time()){ echo 'Website'; }else { echo date('d/m/Y g:i A', (int)$user['lastseen']); } ?></span>
                  </td>
      </tr>
<?php
}

echo '<tr class="GridPager">
        <td colspan="4"><table border="0">
          <tr>';
for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
        echo "<td><span>".$i."</span></td>";
    } else {
        echo '<td><a href="?page='.$i.'">'.$i.'</a></td>';
    }
}
if ($current_page < $total_pages) {
    echo '<td><a href="?page='.$i.'">...</a></td>';
}
echo "          </tr>
        </table></td>
      </tr>
    </table>
  </div>
          
      </div>
  
</div>

        </div>";
?>
        

<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
 ?>