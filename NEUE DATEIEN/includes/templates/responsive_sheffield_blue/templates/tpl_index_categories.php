<?php
/**
 * Page Template
 *
 * Loaded by main_page=index<br />
 * Displays category/sub-category listing<br />
 * Uses tpl_index_category_row.php to render individual items
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_index_categories.php for Sheffield Blue 2022-04-08 12:49:16Z webchills $
 */
?>
<div class="centerColumn" id="indexCategories">
<?php if ($show_welcome == true) { ?>
<h1 id="indexCategoriesHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if (SHOW_CUSTOMER_GREETING == 1) { ?>
<h2 class="greeting"><?php echo zen_customer_greeting(); ?></h2>
<?php } ?>

<!-- deprecated - to use - uncomment
<?php if (TEXT_MAIN) { ?>
<div id="" class="content"><?php echo TEXT_MAIN; ?></div>
<?php } ?>-->

<!-- deprecated - to use - uncomment
<?php if (TEXT_INFORMATION) { ?>
<div id="" class="content"><?php echo TEXT_INFORMATION; ?></div>
<?php } ?>-->

<?php if (DEFINE_MAIN_PAGE_STATUS >= 1 and DEFINE_MAIN_PAGE_STATUS <= 2) { ?>
<div id="indexCategoriesMainContent" class="content"><?php
/**
 * require the html_define for the index/categories page
 */
  include($define_page);
?></div>
<?php } ?>

<?php } else { ?>
<h1 id="indexCategoriesHeading"><?php echo $current_categories_name; ?></h1>
<?php } ?>

<?php
if (PRODUCT_LIST_CATEGORIES_IMAGE_STATUS_TOP == 'true') {
// categories_image
  if ($categories_image = zen_get_categories_image($current_category_id)) {
?>
<div id="categoryImgListing" class="categoryImg"><?php echo zen_image(DIR_WS_IMAGES . $categories_image, '', SUBCATEGORY_IMAGE_TOP_WIDTH, SUBCATEGORY_IMAGE_TOP_HEIGHT); ?></div>
<?php
  }
} // categories_image
?>

<?php
// categories_description
    if ($current_categories_description != '') {
?>
<div id="categoryDescription" class="catDescContent"><?php echo $current_categories_description;  ?></div>
<?php } // categories_description ?>
<!-- BOF: Display grid of available sub-categories, if any -->
<?php
  if (PRODUCT_LIST_CATEGORY_ROW_STATUS == 0) {
    // do nothing
  } else {
    // display subcategories
/**
 * require the code to display the sub-categories-grid, if any exist
 */
   require($template->get_template_dir('tpl_modules_category_row.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_category_row.php');
  }
?>
<!-- EOF: Display grid of available sub-categories -->


<?php
  // bof module navigation
$show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_CATEGORY);
if ($this_is_home_page) {
  echo '';
}
echo '<div id="tabs" class="tabs">' . "\n";
echo '<nav>' . "\n";
echo '<ul>' . "\n";
while (!$show_display_category->EOF) {
  switch ($show_display_category->fields['configuration_key']) {
  case 'SHOW_PRODUCT_INFO_CATEGORY_FEATURED_PRODUCTS':
    echo '<li><a href="section-2" class="icon-shop"><span>' . BOX_HEADING_FEATURED_PRODUCTS . '</span></a></li>'. "\n";
    break;
  case 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS':
    echo '<li><a href="section-3" class="icon-cup"><span>' . BOX_HEADING_SPECIALS . '</span></a></li>'. "\n";
    break;
  case 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS':
    echo '<li><a href="section-1" class="icon-food"><span>' . BOX_HEADING_WHATS_NEW . '</span></a></li>'. "\n";
    break;
  }
  $show_display_category->MoveNext();
}

echo '</ul>'. "\n";
echo '</nav>'. "\n";
echo '<div class="content">';
// eof module navigation

$show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_CATEGORY);
while (!$show_display_category->EOF) {
?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_UPCOMING') { ?>
<?php include(DIR_WS_MODULES . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS)); ?><?php } ?>
<?php
  $show_display_category->MoveNext();
} // !EOF
?>
</div>
</div>
</div>



<script src="<?php echo $template->get_template_dir('cbpFWTabs.js',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/cbpFWTabs.js' ?>" type="text/javascript"></script>
<script type="text/javascript">
  new CBPFWTabs( document.getElementById( 'tabs' ) );
</script>
