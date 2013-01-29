<?php
/*
#######################################
#     e107 website system plguin      #
#     AACGC Falling Objects           #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


$eplug_name = "AACGC Falling Objects";
$eplug_version = "1.2";
$eplug_author = "M@CH!N3";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "admin@aacgc.com";
$eplug_description = "Shows Falling Objects on your site, choose from several seasonal graphics perfect for christmas time and Halloween.  Code from Dynamic Drive";
$eplug_compatible = "e107 v7+";
$eplug_readme = "";
$eplug_compliant = true;
$eplug_status = false;
$eplug_latest = false;

$eplug_folder = "aacgc_falling_objects";

$eplug_menu_name = "AACGC Falling Objects";

$eplug_conffile = "admin_main.php";

$eplug_icon = $eplug_folder . "/images/icon_32.png";
$eplug_icon_small = $eplug_folder . "/images/icon_16.png";
$eplug_caption = "AACGC Falling Objects";

$eplug_prefs = array(
    "fallobject_icon" => "bio1.png",
    "fallobject_perpage" => "5",
    "fallobject_hide" => "0",
    "fallobject_fall" => "windowheight",
	);


$eplug_table_names = "";
$eplug_tables = "";

$eplug_link = false;
$eplug_link_name = "";
$eplug_link_url = "";

$eplug_done = "The plugin is now installed.  Go to menus and activate Falling Objects menu.  No menu is actually displayed.";

$upgrade_add_prefs = "";
$upgrade_remove_prefs = "";

$upgrade_alter_tables = "";
$eplug_upgrade_done = "Upgrade Complete";

?>	

