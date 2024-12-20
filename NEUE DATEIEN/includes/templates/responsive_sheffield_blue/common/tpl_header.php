<?php
/**
 * Common Template - tpl_header.php
 *
 * this file can be copied to /templates/your_template_dir/pagename
 * example: to override the privacy page
 * make a directory /templates/my_template/privacy
 * copy /templates/templates_defaults/common/tpl_footer.php to /templates/my_template/privacy/tpl_header.php
 * to override the global settings and turn off the footer un-comment the following line:
 * 
 * $flag_disable_header = true;
 *
 * Zen Cart German Specific (158 code in 157)
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_header.php for Sheffield Blue 2022-04-08 17:03:16Z webchills $
 */
?>

<?php
  // Display all header alerts via messageStack:
  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  if (!empty($_GET['error_message'])) {
    echo zen_output_string_protected(urldecode($_GET['error_message']));
  }
  if (!empty($_GET['info_message'])) {
   echo zen_output_string_protected($_GET['info_message']);
  }
?>


<!--bof-header logo and navigation display-->
<?php
if (!isset($flag_disable_header) || !$flag_disable_header) {
?>

<div id="headerWrapper" class="<?php echo $fluidisFixed; ?>">



<div id="top-middle">
<div class="onerow-fluid <?php echo $fluidisFixed; ?>">

<!--bof-branding display-->
<div id="logoWrapper">
    <div id="logo"><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . zen_image($template->get_template_dir(HEADER_LOGO_IMAGE, DIR_WS_TEMPLATE, $current_page_base,'images'). '/' . HEADER_LOGO_IMAGE, HEADER_ALT_TEXT) . '</a>'; ?>
    </div>
<?php if (HEADER_SALES_TEXT != '' || (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2))) { ?>
    <div id="taglineWrapper">
<?php
              if (HEADER_SALES_TEXT != '') {
?>
      <div id="tagline">

<?php echo HEADER_SALES_TEXT;?>

      </div>
<?php
              }
?>
<?php
              if (SHOW_BANNERS_GROUP_SET2 != '' && $banner = zen_banner_exists('dynamic', SHOW_BANNERS_GROUP_SET2)) {
                if ($banner->RecordCount() > 0) {
?>
      <div id="bannerTwo" class="banners"><?php echo zen_display_banner('static', $banner);?></div>
<?php
                }
              }
?>
    </div>
<?php } // no HEADER_SALES_TEXT or SHOW_BANNERS_GROUP_SET2 ?>




<div id="navMainWrapper">
<div id="navMain">
    <ul>
<?php
    if (zen_is_logged_in() && !zen_in_guest_checkout()) {
?>
     <li><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a> | </li>
    <li><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a> | </li>
    <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a> | </li>
<?php
      } else {
        if (STORE_STATUS == '0') {
?>
     <li><?php echo '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '">'; ?><?php echo HEADER_TITLE_CATALOG; ?></a> | </li>
    <li class="h-login"><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a> | </li>
<?php } } ?>


    <li><a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><i class="fa fa-shopping-cart" title="Shopping Cart"></i><?php echo $_SESSION['cart']->count_contents();?>  - <?php echo $currencies->format($_SESSION['cart']->show_total());?></a></li>

<?php if ($_SESSION['cart']->count_contents() != 0) { ?>
<li> | <a href="<?php echo zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CHECKOUT; ?></a></li>
<?php }?>

</ul>
</div>
</div>
<!--eof-navigation display-->



<div id="cur-lan-header">
    <?php require(DIR_WS_MODULES . 'sideboxes/languages_header.php'); ?>
    <?php require(DIR_WS_MODULES . 'sideboxes/currencies_header.php'); ?>
</div>


<div class="clearBoth"></div>


<div id="navMainSearch"><?php require(DIR_WS_MODULES . 'sideboxes/search_header.php'); ?></div>

<div class="clearBoth"></div>
</div>

<!--bof menu display-->
<?php require($template->get_template_dir('tpl_modules_mobile_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_mobile_categories_tabs.php');?>
<!--eof menu display-->




<div id="mobile-nav1">
<a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><i class="fa fa-user fa-4x" title="My Account"></i></a>

<a href="<?php echo zen_href_link(FILENAME_ADVANCED_SEARCH); ?>"><i class="fa fa-search fa-4x" title="Search">Suchen</i></a>

<div id="header-cart">
   <a href="<?php echo zen_href_link(FILENAME_SHOPPING_CART, '', 'NONSSL'); ?>"><?php echo $_SESSION['cart']->count_contents();?>  - <?php echo $currencies->format($_SESSION['cart']->show_total());?></a>
   <?php if ($_SESSION['cart']->count_contents() != 0) { ?>
    <?php }?>
</div>
</div>



<div class="clearBoth"></div>
<!--eof-branding display-->
<!--eof-header logo and navigation display-->

</div>
</div>

<div class="stripe">
</div>


<div class="onerow-fluid">

<?php
    if ($this_is_home_page) {
?>

<?php
if (RSB_SLIDER_STATUS == 'true') {
?>

          <?php require($template->get_template_dir('tpl_home_slider.php',DIR_WS_TEMPLATE, $current_page_base,'common')
                        . '/tpl_home_slider.php');?>

<?php } ?>
<?php } ?>


</div>







<!--bof-optional categories tabs navigation display-->
<?php require($template->get_template_dir('tpl_modules_categories_tabs.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_modules_categories_tabs.php'); ?>
<!--eof-optional categories tabs navigation display-->

<!--bof-header ezpage links-->
<?php if (EZPAGES_STATUS_HEADER == '1' or (EZPAGES_STATUS_HEADER == '2' && zen_is_whitelisted_admin_ip())) { ?>

<?php require($template->get_template_dir('tpl_ezpages_bar_header.php',DIR_WS_TEMPLATE, $current_page_base,'templates'). '/tpl_ezpages_bar_header.php'); ?>
<?php } ?>
<!--eof-header ezpage links-->
</div>



<?php } ?>