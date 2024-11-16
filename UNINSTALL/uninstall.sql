### Sheffield Blue Template UNINSTALL ####
### NUR AUSFÜHREN WENN SIE DAS TEMPLATE KOMPLETT ENTFERNEN WOLLEN ####



DELETE FROM configuration WHERE configuration_key = 'DEFINE_ABOUT_US_STATUS';
DELETE FROM configuration_language WHERE configuration_key = 'DEFINE_ABOUT_US_STATUS';

DELETE FROM configuration WHERE configuration_key = 'PRODUCT_LISTING_LAYOUT_STYLE_CUSTOMER';
DELETE FROM configuration WHERE configuration_key = 'PRODUCT_LISTING_GRID_SORT';

DELETE FROM configuration_language WHERE configuration_key = 'PRODUCT_LISTING_LAYOUT_STYLE_CUSTOMER';
DELETE FROM configuration_language WHERE configuration_key = 'PRODUCT_LISTING_GRID_SORT';

DELETE FROM configuration_group WHERE configuration_group_title = 'Sheffield Blue Template Configuration';
DELETE FROM configuration_group WHERE configuration_group_title = 'Sheffield Blue Template Konfiguration';
DELETE FROM configuration_group WHERE configuration_group_title = 'Sheffield Blue Template';
DELETE FROM configuration_group WHERE configuration_group_title = 'Sheffield Blue';



DELETE FROM configuration WHERE configuration_key = 'SHEFFIELD_BLUE_VERSION';
DELETE FROM configuration WHERE configuration_key = 'RSB_SLIDER_STATUS';
DELETE FROM configuration WHERE configuration_key = 'SHOW_BANNERS_GROUP_SETCUSTOMTAB';
DELETE FROM configuration WHERE configuration_key = 'SHOW_EZ_PAGES_MENU';

DELETE FROM configuration_language WHERE configuration_key = 'SHEFFIELD_BLUE_VERSION';
DELETE FROM configuration_language WHERE configuration_key = 'RSB_SLIDER_STATUS';
DELETE FROM configuration_language WHERE configuration_key = 'SHOW_BANNERS_GROUP_SETCUSTOMTAB';
DELETE FROM configuration WHERE configuration_key = 'COLUMN_WIDTH';

DELETE FROM configuration_language WHERE configuration_key = 'COLUMN_WIDTH';
DELETE FROM configuration_language WHERE configuration_key = 'SHOW_EZ_PAGES_MENU';

DROP TABLE IF EXISTS flexible_footer_menu;
DROP TABLE IF EXISTS flexible_footer_menu_content;

DELETE FROM admin_pages WHERE page_key='flexibleFooterMenu';

DELETE FROM banners WHERE banners_group = 'homepageslide';

DELETE FROM configuration_group WHERE configuration_group_title = 'Sheffield Blue';

DELETE FROM admin_pages WHERE page_key='configSheffieldBlue';


UPDATE configuration SET configuration_value = 60 WHERE configuration_key = 'IMAGE_SHOPPING_CART_WIDTH';
UPDATE configuration SET configuration_value = 60 WHERE configuration_key = 'IMAGE_SHOPPING_CART_HEIGHT';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_PRODUCT_LISTING_WIDTH';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_PRODUCT_LISTING_HEIGHT';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_PRODUCT_NEW_LISTING_WIDTH';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_PRODUCT_NEW_LISTING_HEIGHT';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_PRODUCT_NEW_WIDTH';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_PRODUCT_NEW_HEIGHT';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_FEATURED_PRODUCTS_LISTING_WIDTH';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_FEATURED_PRODUCTS_LISTING_HEIGHT';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_PRODUCT_ALL_LISTING_WIDTH';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'IMAGE_PRODUCT_ALL_LISTING_HEIGHT';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'CATEGORY_ICON_IMAGE_WIDTH';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'CATEGORY_ICON_IMAGE_HEIGHT';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'SUBCATEGORY_IMAGE_TOP_WIDTH';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'SUBCATEGORY_IMAGE_TOP_WIDTH';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'SUBCATEGORY_IMAGE_HEIGHT';
UPDATE configuration SET configuration_value = 150 WHERE configuration_key = 'SUBCATEGORY_IMAGE_HEIGHT';
UPDATE configuration SET configuration_value = '1' WHERE configuration_key = 'CATEGORIES_TABS_STATUS';
UPDATE configuration SET configuration_value = true WHERE configuration_key = 'PRODUCT_LIST_ALPHA_SORTER';
UPDATE configuration SET configuration_value = true WHERE configuration_key = 'PRODUCT_LIST_CATEGORIES_IMAGE_STATUS';
UPDATE configuration SET configuration_value = true WHERE configuration_key = 'PRODUCT_LIST_CATEGORIES_IMAGE_STATUS_TOP';
UPDATE configuration SET configuration_value = 1 WHERE configuration_key = 'PRODUCT_LIST_DESCRIPTION';
UPDATE configuration SET configuration_value = 1 WHERE configuration_key = 'PRODUCT_LIST_FILTER';
UPDATE configuration SET configuration_value = 2 WHERE configuration_key = 'PRODUCT_INFO_CATEGORIES_IMAGE_STATUS';
UPDATE configuration SET configuration_value = true WHERE configuration_key = 'USE_SPLIT_LOGIN_MODE';
UPDATE configuration SET configuration_value = 1 WHERE configuration_key = 'EZPAGES_STATUS_HEADER';
UPDATE configuration SET configuration_value = 1 WHERE configuration_key = 'EZPAGES_STATUS_FOOTER';
UPDATE configuration SET configuration_value = 1 WHERE configuration_key = 'SHOW_SHOPPING_CART_UPDATE';
UPDATE configuration SET configuration_value = 3 WHERE configuration_key = 'SHOW_SHOPPING_CART_DELETE';
UPDATE configuration SET configuration_value = 1 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_NEW_PRODUCTS';
UPDATE configuration SET configuration_value = 3 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_SPECIALS_PRODUCTS';
UPDATE configuration SET configuration_value = 2 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_FEATURED_PRODUCTS';
UPDATE configuration SET configuration_value = 4 WHERE configuration_key = 'SHOW_PRODUCT_INFO_MAIN_UPCOMING';
UPDATE configuration SET configuration_value = 1 WHERE configuration_key = 'COLUMN_RIGHT_STATUS';
UPDATE configuration SET configuration_value = '&nbsp;::&nbsp;' WHERE configuration_key = 'BREAD_CRUMBS_SEPARATOR';
UPDATE configuration SET configuration_value = '150px' WHERE configuration_key = 'COLUMN_WIDTH_LEFT';
UPDATE configuration SET configuration_value = '-&gt;' WHERE configuration_key = 'CATEGORIES_SEPARATOR';
UPDATE configuration SET configuration_value = '|_&nbsp;' WHERE configuration_key = 'CATEGORIES_SEPARATOR_SUBS';
UPDATE configuration SET configuration_value = '&nbsp;(' WHERE configuration_key = 'CATEGORIES_COUNT_PREFIX';
UPDATE configuration SET configuration_value = ')' WHERE configuration_key = 'CATEGORIES_COUNT_SUFFIX';
UPDATE configuration SET configuration_value = 3 WHERE configuration_key = 'MAX_MANUFACTURERS_LIST';
UPDATE configuration SET configuration_value = 3 WHERE configuration_key = 'MAX_RECORD_COMPANY_LIST';
UPDATE configuration SET configuration_value = 3 WHERE configuration_key = 'MAX_MUSIC_GENRES_LIST';
UPDATE configuration SET configuration_value = 3 WHERE configuration_key = 'IMAGES_AUTO_ADDED';
UPDATE configuration SET configuration_value = 220 WHERE configuration_key = 'MEDIUM_IMAGE_WIDTH';
UPDATE configuration SET configuration_value = 220 WHERE configuration_key = 'MEDIUM_IMAGE_HEIGHT';
UPDATE configuration SET configuration_value = 1 WHERE configuration_key = 'EZPAGES_STATUS_HEADER';
UPDATE configuration SET configuration_value = 1 WHERE configuration_key = 'EZPAGES_STATUS_FOOTER';

UPDATE template_select SET template_dir = 'responsive_classic' WHERE template_id = 1;
ALTER TABLE layout_boxes DROP show_box_min_width;