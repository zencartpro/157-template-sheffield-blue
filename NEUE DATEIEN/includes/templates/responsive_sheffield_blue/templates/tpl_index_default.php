<?php
/**
 * Page Template
 *
 * Main index page
 * Displays greetings, welcome text (define-page content), and various centerboxes depending on switch settings in Admin<br />
 * Centerboxes are called as necessary
 *
 * @package templateSystem
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_index_default.php for Sheffield Blue 2024-11-16 15:49:16Z webchills $
 */
?>

<div class="centerColumn" id="indexDefault">
<h1 id="indexDefaultHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if (SHOW_CUSTOMER_GREETING == 1) { ?>
<h2 class="greeting"><?php echo zen_customer_greeting(); ?></h2>
<?php } ?>

<?php if (DEFINE_MAIN_PAGE_STATUS >= 1 and DEFINE_MAIN_PAGE_STATUS <= 2) { ?>
<?php
/**
 * get the Define Main Page Text
 */
?>
<div id="indexDefaultMainContent"><?php require($define_page); ?></div>
<?php } ?>



<?php
  // bof module navigation
$show_display_nav = $db->Execute(SQL_SHOW_PRODUCT_INFO_MAIN);
if ($this_is_home_page) {
  echo '';
}
echo '<div id="tabs" class="tabs">' . "\n";
echo '<nav>' . "\n";
echo '<ul>' . "\n";
while (!$show_display_nav->EOF) {
  switch ($show_display_nav->fields['configuration_key']) {
  case 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS':
    echo '<li><a href="section-2" class="icon-shop"><span>' . BOX_HEADING_FEATURED_PRODUCTS . '</span></a></li>'. "\n";
    break;
  case 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS':
    echo '<li><a href="section-3" class="icon-cup"><span>' . BOX_HEADING_SPECIALS . '</span></a></li>'. "\n";
    break;
  case 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS':
    echo '<li><a href="section-1" class="icon-food"><span>' . BOX_HEADING_WHATS_NEW . '</span></a></li>'. "\n";
    break;
  }
  $show_display_nav->MoveNext();
}

echo '</ul>'. "\n";
echo '</nav>'. "\n";
echo '<div class="content">';
// eof module navigation

$show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_MAIN);
while (!$show_display_category->EOF) {
?>


    <?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS') { ?>
<?php
	/**
	 * display the Featured Products Center Box
	 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

 <?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS') { ?>
<?php
    /**
     * display the Special Products Center Box
     */
?>
    <?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_specials_default.php'); ?>
    <?php } ?>

  <?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS') { ?>
<?php
	/**
	 * display the New Products Center Box
	 */
?>
	<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_whats_new.php'); ?>
	<?php } ?>

      <?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_MAIN_UPCOMING') { ?>
<?php
	    /**
	     * display the Upcoming Products Center Box
	     */
?>
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

