<?php
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '3.0.0' WHERE configuration_key = 'SHEFFIELD_BLUE_VERSION' LIMIT 1;");