<?php
require($_SERVER['DOCUMENT_ROOT'].'/main/navbar.php');

?>

          
<?php if($loggedin == 'no'){ ?>   
  <div id="SplashContainer">
    <div id="SignInPane">
      
<div id="LoginViewContainer">
  
      <div id="LoginView">
        <h5>Member Login</h5>
        
<div class="AspNet-Login">
  <form method="post" action="/Login/Default.aspx">
            <div class="AspNet-Login">
              <div class="AspNet-Login-UserPanel">
                <label for="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_UserName" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_UserNameLabel" class="Label">Character Name</label>
                <input name="username" type="text" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_UserName" tabindex="1" class="Text"/>
              </div>
              <div class="AspNet-Login-PasswordPanel">
                <label for="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_Password" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_PasswordLabel" class="Label">Password</label>
                <input name="password" type="password" id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_Password" tabindex="2" class="Text"/>
              </div>
              <!--div class="AspNet-Login-RememberMePanel"-->
                
              <!--/div-->
              <div class="AspNet-Login-SubmitPanel">
                <button id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_Login" type="submit" tabindex="4" class="Button">Login</button>
              </div>
              </form>
              <div class="AspNet-Login-PasswordRecoveryPanel">
                <a id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_hlPasswordRecovery" tabindex="5" href="Login/ResetPasswordRequest.aspx">Forgot your password?</a>
              </div>
            </div>
          
</div>
      </div>
    
</div>
<?php }else { ?>
  <div id="SplashContainer">
    <div id="SignInPane">
      

<div id="LoginViewContainer">
  
      <div id="LoginView">
        <h5>Logged In</h5>
        <div id="AlreadySignedIn">
          <a id="ctl00_cphRoblox_rbxLoginView_lvLoginView_rbxContentImage" title="<?php echo htmlspecialchars($_USER['username']); ?>" href="/User.aspx" style="display:inline-block;height:190px;width:152px;cursor:pointer;"><br><img src="/Thumbs/Avatar.ashx?id=<?php echo $_USER['id']; ?>" style="height:160px;width:162px;margin:-8px;" border="0" id="img" alt="<?php echo htmlspecialchars($_USER['username']); ?>" /></a>
        </div>
      </div>
    
    <?php if($loggedin == 'yes'){
	    echo '
	    	<br>
        	<div style="text-align: center; border: 1px solid black; background-color: #eee;">
        	<br>
        	<h3 style="color: gray;">'.$sitename.' News</h3>
        	<br>
        	<a href="https://blog.rust08.xyz/2025/02/09/new-stuff/">New Stuff!</a>
        	<br>
        	<br>
        	<br>
        	<a href="https://blog.rust08.xyz/2024/12/25/rust-blog-finally-up/">Rust blog finally up!</a>
        	<br>
        	<br>
        	<br>
        	<a href="https://blog.rust08.xyz/2025/01/17/added-the-epic-client/">Added the epic client</a>
        	<br>
        	<br>
        	<br>
        	</div>
	    ';
	}
	?>
	
</div>
<?php } ?>
      <br/>
<?php if($loggedin == 'no'){ ?>
            
            <div id="Figure">
                <a id="ctl00_cphRoblox_LoginView1_ImageFigure" disabled="disabled" title="Figure" onclick="return false" style="display:inline-block;"><img src="/images/NewFrontPageGuy.png" border="0" alt="Figure" blankurl="http://t1.roblox.com:80/blank-115x130.gif"/></a>
            </div>
          
<?php }?>
    </div>
    
            

<div id="RobloxAtAGlance">
  <h2><?=$sitename?> Virtual Playworld</h2>
  <h3><?=$sitename?> is Free!</h3>
  <ul id="ThingsToDo">
    <li id="Point1">
      <h3>Build your personal Place</h3>
      <div>Create buildings, vehicles, scenery, and traps with thousands of virtual bricks.</div>
    </li>
    <li id="Point2">
      <h3>Meet new friends online</h3>
      <div>Visit your friend's place, chat in 3D, and build together.</div>
    </li>
    <li id="Point3">
      <h3>Battle in the Brick Arenas</h3>
      <div>Play with the slingshot, rocket, or other brick battle tools.  Be careful not to get "bloxxed".</div>
    </li>
  </ul>
    <div id="Showcase">
      <iframe width="400" height="326" src="https://www.youtube.com/embed/oDVAjvNeGA8" frameborder="0"></iframe>
            </div>
  <div id="Install">
    <div id="CompatibilityNote">Works with your<br/>Windows PC!</div>
    <div id="DownloadAndPlay"><a id="ctl00_cphRoblox_RobloxAtAGlanceLoginView_RobloxAtAGlance_Anonymous_hlDownloadAndPlay" href="Login/New.aspx?ReturnUrl=%2fGames.aspx"><img src="/images/DownloadAndPlay.png" alt="FREE - Download and Play!" border="0"/></a></div>
  </div>
  <div id="ForParents">
    <a id="ctl00_cphRoblox_RobloxAtAGlanceLoginView_RobloxAtAGlance_Anonymous_hlKidSafe" title="RUST is kid-safe!" href="Parents.aspx" style="display:inline-block;"><img title="RUST is kid-safe!" src="/images/COPPASeal-125x125.jpg" border="0"/></a>
  </div>
</div>
        
    
<div id="UserPlacesPane">
  <div id="UserPlaces_Content">
    <table id="ctl00_cphRoblox_CoolPlaces_CoolPlacesDataList" cellspacing="0" border="0" width="100%">
  <tr>
    <td class="UserPlace">
        <a id="ctl00_cphRoblox_CoolPlaces_CoolPlacesDataList_ctl00_rbxContentImage" title="Helicopter Wars: Winter Mayhem " href="/web/20080711150648/http://www.roblox.com/Item.aspx?ID=483634" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711150648im_/http://t4.roblox.com:80/ef841267467a535450dd594ef6379cb1" border="0" alt="Helicopter Wars: Winter Mayhem "/></a>
      </td><td class="UserPlace">
        <a id="ctl00_cphRoblox_CoolPlaces_CoolPlacesDataList_ctl01_rbxContentImage" title="Journey to the Center of the Earth *Updates*" href="/web/20080711150648/http://www.roblox.com/Item.aspx?ID=2367023" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711150648im_/http://t7.roblox.com:80/d10d9d9bada218245ad0f918e97a007e" border="0" alt="Journey to the Center of the Earth *Updates*"/></a>
      </td><td class="UserPlace">
        <a id="ctl00_cphRoblox_CoolPlaces_CoolPlacesDataList_ctl02_rbxContentImage" title="space coaster finish 2 be admin" href="/web/20080711150648/http://www.roblox.com/Item.aspx?ID=531660" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711150648im_/http://t7.roblox.com:80/7d0b8ef96e2f9a582f93cee87cb5a6a1" border="0" alt="space coaster finish 2 be admin"/></a>
      </td><td class="UserPlace">
        <a id="ctl00_cphRoblox_CoolPlaces_CoolPlacesDataList_ctl03_rbxContentImage" title="The Underground War!" href="/web/20080711150648/http://www.roblox.com/Item.aspx?ID=193177" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711150648im_/http://t0.roblox.com:80/ab18c4f6350c8364c06c186a28559410" border="0" alt="The Underground War!"/></a>
      </td><td class="UserPlace">
        <a id="ctl00_cphRoblox_CoolPlaces_CoolPlacesDataList_ctl04_rbxContentImage" title="Avatar: Count Down to The Comet" href="/web/20080711150648/http://www.roblox.com/Item.aspx?ID=199135" style="display:inline-block;cursor:pointer;"><img src="https://web.archive.org/web/20080711150648im_/http://t6.roblox.com:80/45d3a974a0a9821c24c666ad8db5a2ef" border="0" alt="Avatar: Count Down to The Comet"/></a>
      </td>
  </tr>
</table>
  </div>
  <div id="UserPlaces_Header">
    <h3>Cool Places</h3>
    <p>Check out some of our favorite <?=$sitename?> places!</p>
  </div>
  <div id="ctl00_cphRoblox_CoolPlaces_ie6_peekaboo" style="clear: both"></div>
</div>
  </div>

        </div>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/main/footer.php");
?>