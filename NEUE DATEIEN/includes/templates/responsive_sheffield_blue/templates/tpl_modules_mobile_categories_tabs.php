<?php
/**
 * Module Template - categories_tabs
 *
 * Template stub used to display categories-tabs output
 * 
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: tpl_modules_categories_tabs.php 2024-11-16 17:44:00Z webchills $
 */


?>

<div class="non-semantic-protector"> 

<div id="menu" class="ribbon">
<ul class="slimmenu ribbon-content">

    <li class="menu-shop shop-li"><a href="<?php HTTP_SERVER . DIR_WS_CATALOG;?>" class="mshop"><?php echo HEADER_TITLE_CATEGORIES; ?></a>
<?php
    // load the UL-generator class and produce the menu list dynamically from there
    require_once (DIR_WS_CLASSES . 'categories_ul_generator.php');
$zen_CategoriesUL = new zen_categories_ul_generator;
$menulist = $zen_CategoriesUL->buildTree(true);
$menulist = str_replace('"level4"','"level5"',$menulist);
$menulist = str_replace('"level3"','"level4"',$menulist);
$menulist = str_replace('"level2"','"level3"',$menulist);
$menulist = str_replace('"level1"','"level2"',$menulist);
$menulist = str_replace('<li>','<li>',$menulist);
$menulist = str_replace("</li>\n</ul>\n</li>\n</ul>\n","</li>\n</ul>\n",$menulist);
echo $menulist;
?>                        
</li>


<li class="brands-li"><a href="<?php echo zen_href_link(FILENAME_DEFAULT); ?>" class="drop"><?php echo HEADER_TITLE_MANUFACTURERS; ?></a><!--bof shop by brand   -->

              <ul >
               <?php
                
  $show_manufacturers= true;

// for large lists of manufacturers uncomment this section
/*
  if (($_GET['main_page']==FILENAME_DEFAULT and ($_GET['cPath'] == '' or $_GET['cPath'] == 0)) or  ($request_type == 'SSL')) {
    $show_manufacturers= false;
  } else {
    $show_manufacturers= true;
  }
*/

// Set to true to display manufacturers images in place of names
define('DISPLAY_MANUFACTURERS_IMAGES',false);

if ($show_manufacturers) {

  // only check products if requested - this may slow down the processing of the manufacturers sidebox
  if (PRODUCTS_MANUFACTURERS_STATUS == '1') {
    $manufacturer_sidebox_query = "select distinct m.manufacturers_id, m.manufacturers_name, m.manufacturers_image
                            from " . TABLE_MANUFACTURERS . " m
                            left join " . TABLE_PRODUCTS . " p on m.manufacturers_id = p.manufacturers_id
                            where m.manufacturers_id = p.manufacturers_id and p.products_status= 1
                            order by manufacturers_name";
  } else {
    $manufacturer_sidebox_query = "select m.manufacturers_id, m.manufacturers_name, m.manufacturers_image
                            from " . TABLE_MANUFACTURERS . " m
                            order by manufacturers_name";
  }

  $manufacturer_sidebox = $db->Execute($manufacturer_sidebox_query);

  if ($manufacturer_sidebox->RecordCount()>0) {
    $number_of_rows = $manufacturer_sidebox->RecordCount()+1;

    // Display a list
    $manufacturer_sidebox_array = array();
    //              kuroi: commented out to avoid starting list with text scrolling list entries such as "reset" and "please select"
    //    if (!isset($_GET['manufacturers_id']) || $_GET['manufacturers_id'] == '' ) {
    //      $manufacturer_sidebox_array[] = array('id' => '', 'text' => PULL_DOWN_ALL);
    //    } else {
    //      $manufacturer_sidebox_array[] = array('id' => '', 'text' => PULL_DOWN_MANUFACTURERS);
    //    }

    while (!$manufacturer_sidebox->EOF) {
      $manufacturer_sidebox_name = ((strlen($manufacturer_sidebox->fields['manufacturers_name']) > MAX_DISPLAY_MANUFACTURER_NAME_LEN) ? substr($manufacturer_sidebox->fields['manufacturers_name'], 0, MAX_DISPLAY_MANUFACTURER_NAME_LEN) . '..' : $manufacturer_sidebox->fields['manufacturers_name']);
      $manufacturer_sidebox_image = $manufacturer_sidebox->fields['manufacturers_image'];
      $manufacturer_sidebox_array[] =
	array('id' => $manufacturer_sidebox->fields['manufacturers_id'],
                          'text' => DISPLAY_MANUFACTURERS_IMAGES ?
	      zen_image(DIR_WS_IMAGES . $manufacturer_sidebox_image, $manufacturer_sidebox_name) :
	      $manufacturer_sidebox_name);
      $manufacturer_sidebox->MoveNext();
    }
      
  }
} // $show_manufacturers
for ($i=0;$i<sizeof($manufacturer_sidebox_array);$i++) {
  $content = '';
  $content .= '<li ><a class="hide" href="' . zen_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $manufacturer_sidebox_array[$i]['id']) . '">';
  $content .= $manufacturer_sidebox_array[$i]['text'];
  $content .= '</a></li>' . "\n";
  echo $content;
}
  ?>
                    </ul>

        </li><!-- eof shop by brand    -->

		    <li class="aboutus-li"><a href="<?php echo zen_href_link(FILENAME_ABOUT_US); ?>" class="drop"><?php echo HEADER_TITLE_ABOUT_US; ?></a><!-- bof about us -->
<ul>
<li>

            <div class="dropdown_aboutus">
                    
  <h2><?php echo TITLE_ABOUT_US;?></h2>

  <p class="mega-about"><?php echo TEXT_ABOUT_US;?></p>             
                        <img src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'images').'/'.ABOUT_US_IMAGE ?>"   class="imgshadow_light aboutus-image" alt="about us"  />    
<div class="clearBoth"></div>
            </div>
</li> 
</ul>

       </li><!-- eof about us -->

    <li class="customer-service-li"><a href="<?php echo zen_href_link(FILENAME_SHIPPING); ?>" class="drop"><?php echo HEADER_TITLE_CUSTOMER_SERVICE; ?></a><!-- bof customer service -->

<ul>
<li>        
            <div class="dropdown_customer_service">
           
                <div id="header-shipping">
  <h2><?php echo TITLE_SHIPPING;?></h2>
  <p><?php echo TEXT_SHIPPING_INFO;?></p>             
                </div>
       
                <div id="header-confidence">
  <h2><?php echo TITLE_CONFIDENCE;?></h2>
  <p class="mega-confidence"><?php echo TEXT_CONFIDENCE;?></p>             
<div id="header-icons"><?php echo PAYMENT_ICON; ?></div>

                </div>
      

            </div><!-- eof customer service -->

</li>
</ul>

         </li>


<li class="info-li"><a href="<?php echo zen_href_link(FILENAME_SHIPPING); ?>" class="minfo"><?php echo HEADER_TITLE_INFORMATION; ?></a>
    <ul class="level2">
    <li><a href="<?php echo zen_href_link(FILENAME_SHIPPING); ?>"><?php echo HEADER_TITLE_CUSTOMER_SERVICE; ?></a>
    <ul>
  <?php if (DEFINE_ABOUT_US_STATUS <= 1) { ?>
  <li><a href="<?php echo zen_href_link(FILENAME_ABOUT_US); ?>"><?php echo BOX_INFORMATION_ABOUT_US; ?></a></li>
  <?php } ?>
  <?php if (zen_is_logged_in() && !zen_in_guest_checkout()) { ?>
  <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_MY_ACCOUNT; ?></a></li>
   <li><a href="<?php echo zen_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGOFF; ?></a></li>
   <li><a href="<?php echo zen_href_link(FILENAME_ACCOUNT_NEWSLETTERS, '', 'SSL'); ?>"><?php echo TITLE_NEWSLETTERS; ?></a></li>
    <?php } else { ?>
  <li><a href="<?php echo zen_href_link(FILENAME_LOGIN, '', 'SSL'); ?>"><?php echo HEADER_TITLE_LOGIN; ?></a></li>
   <li><a href="<?php echo zen_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'); ?>"><?php echo HEADER_TITLE_CREATE_ACCOUNT; ?></a></li>
   <?php } ?>
<?php if (DEFINE_SHIPPINGINFO_STATUS <= 1) { ?>
  <li><a href="<?php echo zen_href_link(FILENAME_SHIPPING); ?>"><?php echo BOX_INFORMATION_SHIPPING; ?></a></li>
  <?php } ?>
  <?php if (DEFINE_PRIVACY_STATUS <= 1)  { ?>
  <li><a href="<?php echo zen_href_link(FILENAME_PRIVACY); ?>"><?php echo BOX_INFORMATION_PRIVACY; ?></a></li>
<?php } ?>
<?php if (DEFINE_CONDITIONS_STATUS <= 1) { ?>
  <li><a href="<?php echo zen_href_link(FILENAME_CONDITIONS); ?>"><?php echo BOX_INFORMATION_CONDITIONS; ?></a></li>
     <?php } ?>
<?php if (DEFINE_WIDERRUFSRECHT_STATUS <= 1) { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_WIDERRUFSRECHT); ?>"><?php echo BOX_INFORMATION_WIDERRUFSRECHT; ?></a></li>
<?php } ?>
<?php if (DEFINE_ZAHLUNGSARTEN_STATUS <= 1) { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_ZAHLUNGSARTEN); ?>"><?php echo BOX_INFORMATION_ZAHLUNGSARTEN; ?></a></li>
<?php } ?>
<?php if (DEFINE_IMPRESSUM_STATUS <= 1) { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_IMPRESSUM); ?>"><?php echo BOX_INFORMATION_IMPRESSUM; ?></a></li>
<?php } ?>
    </ul>
    </li>
    <li><a href="javascript:void(0)"><?php echo TITLE_GENERAL; ?></a>
    <ul>
<?php if (DEFINE_SITE_MAP_STATUS <= 1) { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_SITE_MAP); ?>"><?php echo BOX_INFORMATION_SITE_MAP; ?></a></li>
<?php } ?>
<?php if (MODULE_ORDER_TOTAL_GV_STATUS == 'true') { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_GV_FAQ); ?>"><?php echo BOX_INFORMATION_GV; ?></a></li>
<?php } ?>
<?php if (DEFINE_DISCOUNT_COUPON_STATUS <= 1 && MODULE_ORDER_TOTAL_COUPON_STATUS == 'true') { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_DISCOUNT_COUPON); ?>"><?php echo BOX_INFORMATION_DISCOUNT_COUPONS; ?></a></li>
<?php } ?>
<?php if (SHOW_NEWSLETTER_UNSUBSCRIBE_LINK == 'true') { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_UNSUBSCRIBE); ?>"><?php echo BOX_INFORMATION_UNSUBSCRIBE; ?></a></li>
<?php } ?>
<?php if (DEFINE_PAGE_2_STATUS <= 1) { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_PAGE_2); ?>"><?php echo BOX_INFORMATION_PAGE_2; ?></a></li>
<?php } ?>
<?php if (DEFINE_PAGE_3_STATUS <= 1) { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_PAGE_3); ?>"><?php echo BOX_INFORMATION_PAGE_3; ?></a></li>
<?php } ?>
<?php if (DEFINE_PAGE_4_STATUS <= 1) { ?>
        <li><a href="<?php echo zen_href_link(FILENAME_PAGE_4); ?>"><?php echo BOX_INFORMATION_PAGE_4; ?></a></li>
<?php } ?>
    </ul>
    </li>

    <?php if (SHOW_EZ_PAGES_MENU == 'true') { ?>
  <li><a href="javascript:void(0)"><?php echo TITLE_EZ_PAGES; ?></a>
    <ul>
   <?php require(DIR_WS_MODULES . 'sideboxes/' . $template_dir . '/' . 'ezpages_drop_menu.php'); ?>
 </ul>
    </li>
	<?php } ?>
    </ul>
    </li>
    <li class="contact-us-li"><a href="<?php echo zen_href_link(FILENAME_CONTACT_US, '', 'NONSSL'); ?>" class="mcontact"><?php echo BOX_INFORMATION_CONTACT; ?></a></li>

</ul>

</div>

</div>

<script src="<?php echo $template->get_template_dir('jquery.slimmenu.min.js',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/jquery.slimmenu.min.js' ?>" type="text/javascript"></script>
<script src="<?php echo $template->get_template_dir('jquery.easing.min.js',DIR_WS_TEMPLATE, $current_page_base,'jscript') . '/jquery.easing.min.js' ?>" type="text/javascript"></script>

<?php if ($detect->isMobile() && !$detect->isTablet() || $detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'mobile' || $detect->isTablet() && $_SESSION['layoutType'] == 'mobile' || $_SESSION['layoutType'] == 'mobile') { ?>

<script type="text/javascript">
    $('ul.slimmenu').slimmenu(
			      {
			      resizeWidth: '800',
				  collapserTitle: '',
				  animSpeed: 'medium',
				  easingEffect: null,
				  indentChildren: false,
				  childrenIndenter: '&nbsp;'
				  });
</script>

<?php } else if ($detect->isTablet() or $detect->isMobile() && $_SESSION['layoutType'] == 'tablet' || $detect->isTablet() && $_SESSION['layoutType'] == 'tablet' || $_SESSION['layoutType'] == 'tablet'){ ?>

<script type="text/javascript">
    $('ul.slimmenu').slimmenu(
			      {
			      resizeWidth: '800',
				  collapserTitle: '',
				  animSpeed: 'medium',
				  easingEffect: null,
				  indentChildren: false,
				  childrenIndenter: '&nbsp;'
				  });
</script>

<?php } else if ($detect->isMobile() && !$detect->isTablet() && $_SESSION['layoutType'] == 'full' || $detect->isTablet() && $_SESSION['layoutType'] == 'full' || $_SESSION['layoutType'] == 'full' ){ ?>

<script type="text/javascript">
    $('ul.slimmenu').slimmenu(
			      {
			      resizeWidth: '0',
				  collapserTitle: '',
				  animSpeed: 'medium',
				  easingEffect: null,
				  indentChildren: false,
				  childrenIndenter: '&nbsp;'
				  });
</script>

<?php } else { ?>

<script type="text/javascript">
    $('ul.slimmenu').slimmenu(
			      {
			      resizeWidth: '800',
				  collapserTitle: '',
				  animSpeed: 'medium',
				  easingEffect: null,
				  indentChildren: false,
				  childrenIndenter: '&nbsp;'
				  });
</script>

  <?php } ?>

