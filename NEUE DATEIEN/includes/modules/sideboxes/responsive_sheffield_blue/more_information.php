<?php
/**
 * more_information sidebox - displays list of links to additional pages on the site.  Must separately build those pages' content.
 *
 
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: more_information.php for Sheffield Blue 2022-04-08 19:49:16Z webchills $
 */
 
$pointer = '<i class="fa fa-caret-right"></i>';
// uncomment next line to add 1 space between image & text
// $pointer .= '&nbsp;';

// test if box should display

  unset($more_information);

// test if links should display
  if (DEFINE_PAGE_2_STATUS <= 1) {
    $more_information[] = '<a href="' . zen_href_link(FILENAME_PAGE_2) . '">' . $pointer . BOX_INFORMATION_PAGE_2 . '</a>';
  }
  if (DEFINE_PAGE_3_STATUS <= 1) {
    $more_information[] = '<a href="' . zen_href_link(FILENAME_PAGE_3) . '">' . $pointer . BOX_INFORMATION_PAGE_3 . '</a>';
  }
  if (DEFINE_PAGE_4_STATUS <= 1) {
    $more_information[] = '<a href="' . zen_href_link(FILENAME_PAGE_4) . '">' . $pointer . BOX_INFORMATION_PAGE_4 . '</a>';
  }

// insert additional links below to add to the more_information box
// Example:
//    $more_information[] = '<a href="' . zen_href_link(FILENAME_DEFAULT) . '">' . 'TESTING' . '</a>';


// only show if links are active
  if (sizeof($more_information) > 0) {
    require($template->get_template_dir('tpl_more_information.php',DIR_WS_TEMPLATE, $current_page_base,'sideboxes'). '/tpl_more_information.php');

    $title =  BOX_HEADING_MORE_INFORMATION;
    $title_link = false;
    require($template->get_template_dir($column_box_default, DIR_WS_TEMPLATE, $current_page_base,'common') . '/' . $column_box_default);
  }