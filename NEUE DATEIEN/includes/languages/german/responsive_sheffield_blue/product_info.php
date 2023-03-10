<?php
/**
 * @copyright Copyright 2003-2022 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0 
 * @version $Id: product_info.php for Sheffield Blue 2022-12-19 09:27:14Z webchills $
 */

define('TEXT_PRODUCT_NOT_FOUND', 'Entschuldigen Sie bitte, aber der gewünschte Artikel konnte nicht gefunden werden.');
define('TEXT_CURRENT_REVIEWS','Bewertungen:');
define('TEXT_MORE_INFORMATION','Für weitere Informationen besuchen Sie diese <a href="%s" rel="noreferrer noopener" target="_blank">Webseite</a>.');
define('TEXT_DATE_ADDED','Dieser Artikel wurde am  %s im Shop aufgenommen.');
define('TEXT_DATE_AVAILABLE','Dieser Artikel wird voraussichtlich am %s auf Lager sein.');
define('TEXT_ALSO_PURCHASED_PRODUCTS','Kunden die diesen Artikel gekauft haben, haben auch diese Artikel gekauft...');
define('TEXT_PRODUCT_OPTIONS','<strong>Bitte wählen Sie:</strong>');
define('TEXT_PRODUCT_MANUFACTURER','Hergestellt von: ');
define('TEXT_PRODUCT_WEIGHT','Gewicht: ');
define('TEXT_PRODUCT_QUANTITY',' Stück auf Lager');



// previous next product
define('PREV_NEXT_PRODUCT','Artikel ');

// missing products
//define('TABLE_HEADING_NEW_PRODUCTS', 'New Products For %s');
//define('TABLE_HEADING_UPCOMING_PRODUCTS', 'Upcoming Products');
//define('TABLE_HEADING_DATE_EXPECTED', 'Date Expected');

define('TEXT_ATTRIBUTES_PRICE_WAS','[kostete:');
define('TEXT_ATTRIBUTE_IS_FREE','ist jetzt KOSTENLOS]');
define('TEXT_ONETIME_CHARGE_SYMBOL', ' *');
define('TEXT_ONETIME_CHARGE_DESCRIPTION', ' Einmalige Gebühren können anfallen');
define('TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK','Mengenrabatt erhältlich');
define('ATTRIBUTES_QTY_PRICE_SYMBOL', zen_image(DIR_WS_TEMPLATE_ICONS . 'icon_status_green.gif', TEXT_ATTRIBUTES_QTY_PRICE_HELP_LINK, 10, 10) . '&nbsp;');
define('ATTRIBUTES_PRICE_DELIMITER_PREFIX', ' ( ' );
define('ATTRIBUTES_PRICE_DELIMITER_SUFFIX', ' )' );
define('ATTRIBUTES_WEIGHT_DELIMITER_PREFIX', ' (' );
define('ATTRIBUTES_WEIGHT_DELIMITER_SUFFIX', ') ' );


// added for product reviews to show on individual product pages
define('TEXT_OF_5_STARS', 'Fünf Sterne');
// change this constant to reflect the title you would like for your new customer reviews page
define('DG_CUSTOMER_REVIEWS_TITLE', 'Kundenbewertungen:');