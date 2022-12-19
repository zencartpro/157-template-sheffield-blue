<?php
/**
 * Header Language Switch Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_languages_header.php for Winchester 2022-10-12 16:17:16Z webchills $
 */
  $content = '';
  $content .= '<div class="lang_header topBox centeredContent">';
    $lng_cnt = 0;
  foreach($lng->catalog_languages as $key => $value){
    $content .= '<a href="' . zen_href_link($_GET['main_page'], zen_get_all_get_params(array('language', 'currency')) . 'language=' . $key, $request_type) . '">' . zen_image(DIR_WS_LANGUAGES .  $value['directory'] . '/images/' . $value['image'], $value['name']) . '</a>&nbsp;&nbsp;';
    $lng_cnt ++;
  }
$content .= '</div>';