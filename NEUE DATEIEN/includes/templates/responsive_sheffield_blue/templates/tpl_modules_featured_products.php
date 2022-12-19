<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_featured_products.php for Sheffield Blue 2018-04-04 15:49:16Z webchills $
 */
  $zc_show_featured = false;
  include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_FEATURED_PRODUCTS_MODULE));
?>

<!-- bof: featured products  -->
<?php if ($zc_show_featured == true) { ?>

         
<section id="section-1">
<div class="centerBoxWrapper" id="featuredProducts">
<?php
/**
 * require the list_box_content template to display the product
 */
  require($template->get_template_dir('tpl_columnar_display.php',DIR_WS_TEMPLATE, $current_page_base,'common'). '/tpl_columnar_display.php');
?>
</div>
</section>


<?php } ?>
<!-- eof: featured products  -->
