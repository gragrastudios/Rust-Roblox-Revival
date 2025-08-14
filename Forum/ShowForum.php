<?php 

$id = (int)htmlspecialchars($_GET['ForumID']);

if(!$id) {
    header("Location: /Forum/Default.aspx");
}

require($_SERVER['DOCUMENT_ROOT'].'/main/navbar.php');

?>
<link rel="stylesheet" href="/Forum/skins/default/style/default.css" type="text/css"/>
				
			<table width="100%" cellspacing="0" cellpadding="0" border="0">
				<tr>
					<td>
						</td>
				</tr>
				<tr valign="bottom">
					<td>
						<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">
							<tr valign="top">
								<!-- left column -->
								<td>&nbsp; &nbsp; &nbsp;</td>
								<!-- center column -->
								<td id="ctl00_cphRoblox_CenterColumn" width="95%" class="CenterColumn">
									<br>
									<span id="ctl00_cphRoblox_Navigationmenu1">
<table width="100%" cellspacing="1" cellpadding="0">
	<tr>
		<td align="right" valign="middle">
			<a id="ctl00_cphRoblox_Navigationmenu1_ctl00_HomeMenu" class="menuTextLink" href="/Forum/Default.aspx"><img src="/Forum/skins/default/images/icon_mini_home.gif" border="0">Home &nbsp;</a>
			<a id="ctl00_cphRoblox_Navigationmenu1_ctl00_SearchMenu" class="menuTextLink" href="/Forum/Search/default.aspx"><img src="/Forum/skins/default/images/icon_mini_search.gif" border="0">Search &nbsp;</a>
			
			
			<a id="ctl00_cphRoblox_Navigationmenu1_ctl00_RegisterMenu" class="menuTextLink" href="/Forum/User/CreateUser.aspx"><img src="/Forum/skins/default/images/icon_mini_register.gif" border="0">Register &nbsp;</a>
			
			
			
			
		</td>
	</tr>
</table>
</span>
									<span id="ctl00_cphRoblox_ThreadView1">
<table cellpadding="0" width="100%">
	<tr>
		<td colspan="2" align="left"><span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1" name="Whereami1">
<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td valign="top" align="left" width="1px">
            <nobr>
                
            </nobr>
        </td>
        <td id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_ForumGroupMenu" class="popupMenuSink" valign="top" align="left" width="1px">
            <nobr>
                
                <a id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_LinkForumGroup" class="linkMenuSink" href="/Forum/ShowForumGroup.aspx?ForumGroupID=1">ROBLOX</a>
            </nobr>
        </td>

        <td id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_ForumMenu" class="popupMenuSink" valign="top" align="left" width="1px">
            <nobr>
                <span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_ForumSeparator" class="normalTextSmallBold">&nbsp;&gt;</span>
                <a id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_LinkForum" class="linkMenuSink" href="/Forum/ShowForum.aspx?ForumID=13">General Discussion</a>
            </nobr>
        </td>

        <td id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_PostMenu" class="popupMenuSink" valign="top" align="left" width="1px">
            <nobr>
                
                
            </nobr>
        </td>

        <td valign="top" align="left" width="*">&nbsp;</td>
    </tr>
</table>

<span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami1_ctl00_MenuScript"></span></span></td>
	</tr>
	<tr>
		<td>
			&nbsp;
		</td>
	</tr>
	<tr>
		<td valign="bottom" align="left"><a id="ctl00_cphRoblox_ThreadView1_ctl00_NewThreadLinkTop" href="/Forum/AddPost.aspx?ForumID=13"><img id="ctl00_cphRoblox_ThreadView1_ctl00_NewThreadImageTop" src="/Forum/skins/default/images/newtopic.gif" border="0"/></a></td>
		<td align="right"><span class="normalTextSmallBold">Search 
      this forum: </span>
			<input name="ctl00$cphRoblox$ThreadView1$ctl00$Search" type="text" id="ctl00_cphRoblox_ThreadView1_ctl00_Search"/>
			<input type="submit" name="ctl00$cphRoblox$ThreadView1$ctl00$SearchButton" value=" Go " id="ctl00_cphRoblox_ThreadView1_ctl00_SearchButton"/></td>
	</tr>
	<tr>
		<td valign="top" colspan="2"><table id="ctl00_cphRoblox_ThreadView1_ctl00_ThreadList" class="tableBorder" cellspacing="1" cellpadding="3" border="0" width="100%">
	<tr>
		<th class="tableHeaderText" align="left" colspan="2" height="25">&nbsp;Thread&nbsp;</th><th class="tableHeaderText" align="center" nowrap="nowrap">&nbsp;Started By&nbsp;</th><th class="tableHeaderText" align="center">&nbsp;Replies&nbsp;</th><th class="tableHeaderText" align="center">&nbsp;Views&nbsp;</th><th class="tableHeaderText" align="center" nowrap="nowrap">&nbsp;Last Post&nbsp;</th>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Popular post" src="/Forum/skins/default/images/topic-popular.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1756333">Teh Rulez</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Stealth Pilot">Stealth Pilot</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">-</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">330</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Pinned Post</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Stealth Pilot">Stealth Pilot</a><a href="/Forum/ShowPost.aspx?PostID=1756333#1756333"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Popular post" src="/Forum/skins/default/images/topic-popular.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1589414">Reminder: Make thread titles related to the thread!</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=MrDoomBringer">MrDoomBringer</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">-</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">956</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Pinned Post</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=MrDoomBringer">MrDoomBringer</a><a href="/Forum/ShowPost.aspx?PostID=1589414#1589414"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Popular post" src="/Forum/skins/default/images/topic-popular.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=521113">INFO: How reporting works</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=MrDoomBringer">MrDoomBringer</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">-</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">5,550</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Pinned Post</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=MrDoomBringer">MrDoomBringer</a><a href="/Forum/ShowPost.aspx?PostID=521113#521113"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Popular post" src="/Forum/skins/default/images/topic-popular.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1635040">Chain Spam (REMINDER)</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Stealth Pilot">Stealth Pilot</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">-</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">1,137</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Pinned Post</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Stealth Pilot">Stealth Pilot</a><a href="/Forum/ShowPost.aspx?PostID=1635040#1635040"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Post (Not Read)" src="/Forum/skins/default/images/topic_notread.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1764390"> i hope they have a special hat for the olympics</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=frostbite46">frostbite46</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">8</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">39</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Today @ 10:23 AM</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=tommy123456789">tommy123456789</a><a href="/Forum/ShowPost.aspx?PostID=1764390#1764464"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Post (Not Read)" src="/Forum/skins/default/images/topic_notread.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1764463">Its a Dream Come True!!!!!</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=vinceyoung66">vinceyoung66</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">-</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">3</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Today @ 10:23 AM</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=vinceyoung66">vinceyoung66</a><a href="/Forum/ShowPost.aspx?PostID=1764463#1764463"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Post (Not Read)" src="/Forum/skins/default/images/topic_notread.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1764400">Is copying another's shirt illegal, even if you give them credit?</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=ZoaZao">ZoaZao</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">8</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">42</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Today @ 10:23 AM</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=vinny1sabatini">vinny1sabatini</a><a href="/Forum/ShowPost.aspx?PostID=1764400#1764462"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Post (Not Read)" src="/Forum/skins/default/images/topic_notread.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1764408">Can I get donations now?</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Samta">Samta</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">10</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">39</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Today @ 10:22 AM</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Samta">Samta</a><a href="/Forum/ShowPost.aspx?PostID=1764408#1764458"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Post (Not Read)" src="/Forum/skins/default/images/topic_notread.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1763972">A NEW AWP MAP?</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Xenxe">Xenxe</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">14</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">107</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Today @ 10:22 AM</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Xenxe">Xenxe</a><a href="/Forum/ShowPost.aspx?PostID=1763972#1764450"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Post (Not Read)" src="/Forum/skins/default/images/topic_notread.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1764072">What would you like to see?</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Yuntah">Yuntah</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">11</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">67</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Today @ 10:21 AM</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Yuntah">Yuntah</a><a href="/Forum/ShowPost.aspx?PostID=1764072#1764440"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Popular post" src="/Forum/skins/default/images/topic-popular.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1720571">200 ROBUX GIVE AWAY!</a><span class="normalTextSmall"> (Page: </span><a class="linkSmall" href="/Forum/ShowPost.aspx?PostID=1720571&amp;PageIndex=1">1</a><span class="normalTextSmall">, </span><a class="linkSmall" href="/Forum/ShowPost.aspx?PostID=1720571&amp;PageIndex=2">2</a><span class="normalTextSmall">, </span><a class="linkSmall" href="/Forum/ShowPost.aspx?PostID=1720571&amp;PageIndex=3">3</a><span class="normalTextSmall">, </span><a class="linkSmall" href="/Forum/ShowPost.aspx?PostID=1720571&amp;PageIndex=4">4</a><span class="normalTextSmall">)</span></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Xena218">Xena218</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">81</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">416</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Today @ 10:21 AM</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=frostbite46">frostbite46</a><a href="/Forum/ShowPost.aspx?PostID=1720571#1764438"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Post (Not Read)" src="/Forum/skins/default/images/topic_notread.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1747308">Meet DarkPH33R</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=DarkPH33R">DarkPH33R</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">19</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">101</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Today @ 10:20 AM</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=Garty983chub">Garty983chub</a><a href="/Forum/ShowPost.aspx?PostID=1747308#1764437"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumRow" align="center" valign="middle" width="25"><img title="Post (Not Read)" src="/Forum/skins/default/images/topic_notread.gif" border="0"/></td><td class="forumRow" height="25"><a class="linkSmallBold" href="/Forum/ShowPost.aspx?PostID=1764403">I found this</a></td><td class="forumRowHighlight" align="left" width="100">&nbsp;<a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=robloxofme">robloxofme</a></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">2</span></td><td class="forumRowHighlight" align="center" width="50"><span class="normalTextSmaller">27</span></td><td class="forumRowHighlight" align="center" width="140" nowrap="nowrap"><span class="normalTextSmaller"><b>Today @ 10:19 AM</b><br>by </span><a class="linkSmall" href="/Forum/User/UserProfile.aspx?UserName=robloxofme">robloxofme</a><a href="/Forum/ShowPost.aspx?PostID=1764403#1764419"><img border="0" src="/Forum/skins/default/images/icon_mini_topic.gif"></a></td>
	</tr><tr>
		<td class="forumHeaderBackgroundAlternate" colspan="6">&nbsp;</td>
	</tr>
</table><span id="ctl00_cphRoblox_ThreadView1_ctl00_Pager"><table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr>
		<td><span class="normalTextSmallBold">Page 1 of 2,520</span></td><td align="right"><span><span class="normalTextSmallBold">Goto to page: </span><a id="ctl00_cphRoblox_ThreadView1_ctl00_Pager_Page0" class="normalTextSmallBold" href="javascript:__doPostBack('ctl00$cphRoblox$ThreadView1$ctl00$Pager$Page0','')">1</a><span class="normalTextSmallBold">, </span><a id="ctl00_cphRoblox_ThreadView1_ctl00_Pager_Page1" class="normalTextSmallBold" href="javascript:__doPostBack('ctl00$cphRoblox$ThreadView1$ctl00$Pager$Page1','')">2</a><span class="normalTextSmallBold">, </span><a id="ctl00_cphRoblox_ThreadView1_ctl00_Pager_Page2" class="normalTextSmallBold" href="javascript:__doPostBack('ctl00$cphRoblox$ThreadView1$ctl00$Pager$Page2','')">3</a><span class="normalTextSmallBold"> ... </span><a id="ctl00_cphRoblox_ThreadView1_ctl00_Pager_Page2518" class="normalTextSmallBold" href="javascript:__doPostBack('ctl00$cphRoblox$ThreadView1$ctl00$Pager$Page2518','')">2,519</a><span class="normalTextSmallBold">, </span><a id="ctl00_cphRoblox_ThreadView1_ctl00_Pager_Page2519" class="normalTextSmallBold" href="javascript:__doPostBack('ctl00$cphRoblox$ThreadView1$ctl00$Pager$Page2519','')">2,520</a><span class="normalTextSmallBold">&nbsp;</span><a id="ctl00_cphRoblox_ThreadView1_ctl00_Pager_Next" class="normalTextSmallBold" href="javascript:__doPostBack('ctl00$cphRoblox$ThreadView1$ctl00$Pager$Next','')">Next</a></span></td>
	</tr>
</table></span></td>
	</tr>
	<tr>
		<td colspan="2">
			&nbsp;
		</td>
	</tr>
	<tr>
		<td align="left" valign="top">
			<span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2" name="Whereami2">
<table cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td valign="top" align="left" width="1px">
            <nobr>
                <a id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2_ctl00_LinkHome" class="linkMenuSink" href="/Forum/Default.aspx">ROBLOX Forum</a>
            </nobr>
        </td>
        <td id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2_ctl00_ForumGroupMenu" class="popupMenuSink" valign="top" align="left" width="1px">
            <nobr>
                <span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2_ctl00_ForumGroupSeparator" class="normalTextSmallBold">&nbsp;&gt;</span>
                <a id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2_ctl00_LinkForumGroup" class="linkMenuSink" href="/Forum/ShowForumGroup.aspx?ForumGroupID=1">ROBLOX</a>
            </nobr>
        </td>

        <td id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2_ctl00_ForumMenu" class="popupMenuSink" valign="top" align="left" width="1px">
            <nobr>
                <span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2_ctl00_ForumSeparator" class="normalTextSmallBold">&nbsp;&gt;</span>
                <a id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2_ctl00_LinkForum" class="linkMenuSink" href="/Forum/ShowForum.aspx?ForumID=13">General Discussion</a>
            </nobr>
        </td>

        <td id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2_ctl00_PostMenu" class="popupMenuSink" valign="top" align="left" width="1px">
            <nobr>
                
                
            </nobr>
        </td>

        <td valign="top" align="left" width="*">&nbsp;</td>
    </tr>
</table>

<span id="ctl00_cphRoblox_ThreadView1_ctl00_Whereami2_ctl00_MenuScript"></span></span>
			
		</td>
		<td align="right">
			<span class="normalTextSmallBold">Display threads for: </span><select name="ctl00$cphRoblox$ThreadView1$ctl00$DisplayByDays" id="ctl00_cphRoblox_ThreadView1_ctl00_DisplayByDays">
	<option selected="selected" value="0">All Days</option>
	<option value="1">Today</option>
	<option value="3">Past 3 Days</option>
	<option value="7">Past Week</option>
	<option value="14">Past 2 Weeks</option>
	<option value="30">Past Month</option>
	<option value="90">Past 3 Months</option>
	<option value="180">Past 6 Months</option>
	<option value="360">Past Year</option>

</select>
			<br>
			<a id="ctl00_cphRoblox_ThreadView1_ctl00_MarkAllRead" class="linkSmallBold" href="javascript:__doPostBack('ctl00$cphRoblox$ThreadView1$ctl00$MarkAllRead','')">Mark all threads as read</a>
			<br>
			<span class="normalTextSmallBold">
				
			</span>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;
		</td>
	</tr>
</table>
</span>
								</td>

								<td class="CenterColumn">&nbsp;&nbsp;&nbsp;</td>
								<!-- right margin -->
								<td class="RightColumn">&nbsp;&nbsp;&nbsp;</td>
								
							</tr>
						</table>
					</td>
				</tr>
				</table>

				</div>
<?php require($_SERVER['DOCUMENT_ROOT'].'/main/footer.php'); ?>