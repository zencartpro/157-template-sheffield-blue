<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2019 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_specials_default.php for Sheffield Blue 2019-08-19 09:49:16Z webchills $
 */
  $zc_show_specials = false;
  include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_SPECIALS_INDEX));
?>

<!-- bof: specials -->
<?php if ($zc_show_specials == true) { ?>

                <section id="section-3">
<div class="centerBoxWrapper" id="specialsDefault">
<?php
/**
 * require the columnar_display template to show the products
 */
  require($template->get_template_dir('tpl_columnar_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display.php');
?>
</div>
</section>

<?php } ?>
<!-- eof: specials -->
