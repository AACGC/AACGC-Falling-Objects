<?php
/*
#######################################
#     e107 website system plguin      #
#     AACGC Falling Objects           #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/

require_once("../../class2.php");
if (!getperms("P"))
{
    header("location:" . e_HTTP . "index.php");
    exit;
} 
require_once(e_ADMIN . "auth.php");
require_once(e_HANDLER . "userclass_class.php");


if (isset($_POST['update']))
{ 
    $pref['fallobject_icon'] = $_POST['fallobject_icon'];
    $pref['fallobject_perpage'] = $_POST['fallobject_perpage'];
    $pref['fallobject_hide'] = $_POST['fallobject_hide'];	
    $pref['fallobject_fall'] = $_POST['fallobject_fall'];	


    save_prefs();

$fall_msgtext = "Settings Saved";
}


//--------------------------------------------------------------------

require_once(e_HANDLER . "file_class.php");

$fall_obj = new e_file;

$thumblist = $fall_obj->get_files(e_PLUGIN."aacgc_falling_objects/objects/", '');


$fallobj_text .= "<form method='post' action='".e_SELF."' id='fallobjform'>
<table class='fborder' width='97%'><tr>
<td style='width:30%' class='forumheader3'>Object to Display (Default Object):</td>
<td style='width:70%' class='forumheader3'>
<input class='tbox' type='text' id='fallobject_icon' name='fallobject_icon' size='60' value='" . $pref['fallobject_icon'] . "' maxlength='100' /> (click an object below - or add your own to the objects directory)</td><tr><td colspan=2 class='forumheader3'>";

foreach($thumblist as $icon)
{
    $fallobj_text .= "<a href=\"javascript:insertext('" . $icon['fname'] . "','fallobject_icon','newsicn')\"><img src='" . $icon['path'] . $icon['fname'] . "' style='border:0' alt='' /></a> ";
} 

$fallobj_text .= "</td></tr>";


$fallobj_text .= "
<tr>
<td style='width:30%' class='forumheader3'>Objects Per Page:</td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='10' name='fallobject_perpage' value='" . $pref['fallobject_perpage'] . "' /></td>
</tr>";
$fallobj_text .= "
<tr>
<td style='width:30%' class='forumheader3'>Stop objects after x seconds (0 = continuous) :</td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='10' name='fallobject_hide' value='" . $pref['fallobject_hide'] . "' /></td>
</tr>";
$fallobj_text .= "
<tr>
<td style='width:30%' class='forumheader3'>Objects should fall for:
</td>
<td style='width:70%' class='forumheader3'>
<input class='tbox' type='radio'  name='fallobject_fall' value='windowheight' " . 
($pref['fallobject_fall']=='windowheight'?"checked='checked'":'') . " /> Height of the users window<br />
<input class='tbox' type='radio'  name='fallobject_fall' value='pageheight' " . 
($pref['fallobject_fall']=="pageheight"?"checked='checked'":'') . " />Height of the full web site
</td>
</tr>";





$fallobj_text .= "
<tr>
<td colspan='2' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='Save Settings' class='button' />\n
</td>
</tr></table></form>";





$ns->tablerender("AACGC Falling Objects (settings)", $fallobj_text);

require_once(e_ADMIN . "footer.php");
