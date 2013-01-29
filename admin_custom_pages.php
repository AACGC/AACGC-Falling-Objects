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
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;

if (isset($_POST['update']))
{ 
	

    $pref['fallobject_cicon1'] = $_POST['fallobject_cicon1'];
    $pref['fallobject_cicon2'] = $_POST['fallobject_cicon2'];
    $pref['fallobject_cicon3'] = $_POST['fallobject_cicon3'];
    $pref['fallobject_cicon4'] = $_POST['fallobject_cicon4'];
    $pref['fallobject_cicon5'] = $_POST['fallobject_cicon5'];


    $pref['fallobject_custompage1'] = $_POST['fallobject_custompage1'];
    $pref['fallobject_custompage2'] = $_POST['fallobject_custompage2'];
    $pref['fallobject_custompage3'] = $_POST['fallobject_custompage3'];
    $pref['fallobject_custompage4'] = $_POST['fallobject_custompage4'];
    $pref['fallobject_custompage5'] = $_POST['fallobject_custompage5'];

	
    save_prefs();

$fall_msgtext = "Settings Saved";
}


//--------------------------------------------------------------------

require_once(e_HANDLER . "file_class.php");

$fall_obj = new e_file;

$thumblist = $fall_obj->get_files(e_PLUGIN."aacgc_falling_objects/objects/", '');


$fallobj_text .= "<form method='post' action='".e_SELF."' id='fallobjform'>
<table class='fborder' width='100%'>
<tr>
<td class='fcaption' style='text-align: left;'><b>Only Use File Name, Do Not Use http or www (Example: news.php or forum.php)</b></td>
</tr>
</table><br><br>";


//---------#Page1#
$fallobj_text .= "<table class='fborder' width='100%'><tr>
<td style='width:30%' class='forumheader3'>Custom Page #1:</td>
<td style='width:70%' class='forumheader3'>
<input class='tbox' type='text' size='100' name='fallobject_custompage1' value='" . $tp->toFORM($pref['fallobject_custompage1']) . "' /></td>
</tr><tr>
<td style='width:30%' class='forumheader3'>Object to Display:</td>
<td style='width:70%' class='forumheader3'><form>
".$rs -> form_text("fallobject_cicon1", 50, $pref['fallobject_cicon1'], 100)."
".$rs -> form_button("button", '', "Show Objects", "onclick=\"expandit('plcico1')\"")."
<div id='plcico1' style='{head}; display:none'>";
foreach($thumblist as $icon)
{$fallobj_text .= "<a href=\"javascript:insertext('" . $icon['fname'] . "','fallobject_cicon1','newsicn')\"><img src='" . $icon['path'] . $icon['fname'] . "' style='border:0' alt='' /></a> ";} 
$fallobj_text .= "</div></td></tr></table><br><br>";
//----------------


//---------#Page2#
$fallobj_text .= "<table class='fborder' width='100%'><tr>
<td style='width:30%' class='forumheader3'>Custom Page #2:</td>
<td style='width:70%' class='forumheader3'>
<input class='tbox' type='text' size='100' name='fallobject_custompage2' value='" . $tp->toFORM($pref['fallobject_custompage2']) . "' /></td>
</tr><tr>
<td style='width:30%' class='forumheader3'>Object to Display:</td>
<td style='width:70%' class='forumheader3'><form>
".$rs -> form_text("fallobject_cicon2", 50, $pref['fallobject_cicon2'], 100)."
".$rs -> form_button("button", '', "Show Objects", "onclick=\"expandit('plcico2')\"")."
<div id='plcico2' style='{head}; display:none'>";
foreach($thumblist as $icon)
{$fallobj_text .= "<a href=\"javascript:insertext('" . $icon['fname'] . "','fallobject_cicon2','newsicn')\"><img src='" . $icon['path'] . $icon['fname'] . "' style='border:0' alt='' /></a> ";} 
$fallobj_text .= "</div></td></tr></table><br><br>";
//----------------


//---------#Page3#
$fallobj_text .= "<table class='fborder' width='100%'><tr>
<td style='width:30%' class='forumheader3'>Custom Page #3:</td>
<td style='width:70%' class='forumheader3'>
<input class='tbox' type='text' size='100' name='fallobject_custompage3' value='" . $tp->toFORM($pref['fallobject_custompage3']) . "' /></td>
</tr><tr>
<td style='width:30%' class='forumheader3'>Object to Display:</td>
<td style='width:70%' class='forumheader3'><form>
".$rs -> form_text("fallobject_cicon3", 50, $pref['fallobject_cicon3'], 100)."
".$rs -> form_button("button", '', "Show Objects", "onclick=\"expandit('plcico3')\"")."
<div id='plcico3' style='{head}; display:none'>";
foreach($thumblist as $icon)
{$fallobj_text .= "<a href=\"javascript:insertext('" . $icon['fname'] . "','fallobject_cicon3','newsicn')\"><img src='" . $icon['path'] . $icon['fname'] . "' style='border:0' alt='' /></a> ";} 
$fallobj_text .= "</div></td></tr></table><br><br>";
//----------------



//---------#Page4#
$fallobj_text .= "<table class='fborder' width='100%'><tr>
<td style='width:30%' class='forumheader3'>Custom Page #4:</td>
<td style='width:70%' class='forumheader3'>
<input class='tbox' type='text' size='100' name='fallobject_custompage4' value='" . $tp->toFORM($pref['fallobject_custompage4']) . "' /></td>
</tr><tr>
<td style='width:30%' class='forumheader3'>Object to Display:</td>
<td style='width:70%' class='forumheader3'><form>
".$rs -> form_text("fallobject_cicon4", 50, $pref['fallobject_cicon4'], 100)."
".$rs -> form_button("button", '', "Show Objects", "onclick=\"expandit('plcico4')\"")."
<div id='plcico4' style='{head}; display:none'>";
foreach($thumblist as $icon)
{$fallobj_text .= "<a href=\"javascript:insertext('" . $icon['fname'] . "','fallobject_cicon4','newsicn')\"><img src='" . $icon['path'] . $icon['fname'] . "' style='border:0' alt='' /></a> ";} 
$fallobj_text .= "</div></td></tr></table><br><br>";
//----------------


//---------#Page5#
$fallobj_text .= "<table class='fborder' width='100%'><tr>
<td style='width:30%' class='forumheader3'>Custom Page #5:</td>
<td style='width:70%' class='forumheader3'>
<input class='tbox' type='text' size='100' name='fallobject_custompage5' value='" . $tp->toFORM($pref['fallobject_custompage5']) . "' /></td>
</tr><tr>
<td style='width:30%' class='forumheader3'>Object to Display:</td>
<td style='width:70%' class='forumheader3'><form>
".$rs -> form_text("fallobject_cicon5", 50, $pref['fallobject_cicon5'], 100)."
".$rs -> form_button("button", '', "Show Objects", "onclick=\"expandit('plcico5')\"")."
<div id='plcico5' style='{head}; display:none'>";
foreach($thumblist as $icon)
{$fallobj_text .= "<a href=\"javascript:insertext('" . $icon['fname'] . "','fallobject_cicon5','newsicn')\"><img src='" . $icon['path'] . $icon['fname'] . "' style='border:0' alt='' /></a> ";} 
$fallobj_text .= "</div></td></tr></table><br><br>";
//----------------




$fallobj_text .= "<table class='fborder' width='100%'>

<tr>
<td class='fcaption' style='text-align: left;'><input type='submit' name='update' value='Save Settings' class='button' /></td>
</tr>
</table></form>";





$ns->tablerender("AACGC Falling Objects (custom pages)", $fallobj_text);

require_once(e_ADMIN . "footer.php");
