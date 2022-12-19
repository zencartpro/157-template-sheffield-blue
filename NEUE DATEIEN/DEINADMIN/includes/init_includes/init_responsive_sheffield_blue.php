<?php
/**
 * @package Responsive Sheffield Blue 2.4.0
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: init_responsive_sheffield_blue.php 2022-10-12 16:36:51Z webchills $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}


// -----
// Wir legen erst los, wenn ein Admin anwesend ist ...
//
if (empty($_SESSION['admin_id'])) {
    return;
}
// first check if an old Sheffield Blue version 2.0 for and old Zen Cart version is already installed
if (defined('SHEFFIELD_BLUE_VERSION')) {
$oldsheffield = $db->Execute("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '" . SHEFFIELD_BLUE_VERSION . "';");
if (($oldsheffield->RecordCount() > 0 ) && ($oldsheffield == '2.0' ))  {
// update version number to 2.2 first to prevent unneccessary and unwanted database operations
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '2.2' WHERE configuration_key = 'SHEFFIELD_BLUE_VERSION' LIMIT 1;");
}
} else {
// check that Sheffield Blue is enabled
$template_select = $db->Execute("SELECT * FROM " . TABLE_TEMPLATE_SELECT . " WHERE template_dir = 'responsive_sheffield_blue' LIMIT 1;");
if ($template_select->RecordCount() > 0) {

$module_constant = 'SHEFFIELD_BLUE_VERSION'; 
$module_installer_directory = DIR_FS_ADMIN . 'includes/installers/responsive_sheffield_blue'; 
$module_name = "Sheffield Blue"; 

$configuration_group_id = '';
if (defined($module_constant)) {
    $current_version = constant($module_constant);
} else {
    $current_version = "0.0.0";
    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_title, configuration_group_description, sort_order, visible, language_id) VALUES ('" . $module_name . "', 'Einstellungen für das " . $module_name . " Template', '60', '1', '43');");
    $configuration_group_id = $db->Insert_ID();

    $db->Execute("UPDATE " . TABLE_CONFIGURATION_GROUP . " SET sort_order = " . $configuration_group_id . " WHERE configuration_group_id = " . $configuration_group_id . ";");

    $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES
                    ('Version', '" . $module_constant . "', '0.0.0', 'Version installed:', " . $configuration_group_id . ", 0, NOW(), NOW(), NULL, 'zen_cfg_read_only(');");
}
if ($configuration_group_id == '') {
    $config = $db->Execute("SELECT configuration_group_id FROM " . TABLE_CONFIGURATION . " WHERE configuration_key= '" . $module_constant . "'");
    $configuration_group_id = $config->fields['configuration_group_id'];
}

$installers = scandir($module_installer_directory, 1);

$newest_version = $installers[0];
$newest_version = substr($newest_version, 0, -4);

sort($installers);
if (version_compare($newest_version, $current_version) > 0) {
    foreach ($installers as $installer) {
        if (version_compare($newest_version, substr($installer, 0, -4)) >= 0 && version_compare($current_version, substr($installer, 0, -4)) < 0) {
            include($module_installer_directory . '/' . $installer);
            $current_version = str_replace("_", ".", substr($installer, 0, -4));
            $db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $current_version . "' WHERE configuration_key = '" . $module_constant . "' LIMIT 1;");
            $messageStack->add("Erfolgreich installiert: " . $module_name . " v" . $current_version, 'success');
        }
    }

}
}
}