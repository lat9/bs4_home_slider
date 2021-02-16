<?php
/**
 * Page Template
 * 
 * BOOTSTRAP v3.0.0
 * BOOTSTRAP HOMEPAGE SLIDER v1.0.0
 *
 * Loaded by main_page=index<br />
 * Displays category/sub-category listing<br />
 * Uses tpl_index_category_row.php to render individual items
 *
 * @copyright Copyright 2003-2020 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: DrByte 2020 Sep 10 Modified in v1.5.7a $
 */
?>
<div id="indexCategories" class="centerColumn">

<?php if ($show_welcome == true) { ?>
<h1 id="indexCategories-pageHeading" class="pageHeading"><?php echo HEADING_TITLE; ?></h1>

<?php if (SHOW_CUSTOMER_GREETING == 1) { ?>
<h3 id="indexCategories-greeting" class="greeting"><?php echo zen_customer_greeting(); ?></h3>
<?php } ?>

<?php
//-bof-bs4_home_slider  *** 1 of 1 ***
// -----
// Note: Using 'include' instead of 'require' to prevent unwanted whitescreens if the tpl_index_slider.php isn't found.
//
?>
<div id="home-slider">
    <?php include $template->get_template_dir('tpl_index_slider.php', DIR_WS_TEMPLATE, $current_page_base, 'templates') . '/tpl_index_slider.php'; ?>
</div>
<?php
//-eof-bs4_home_slider  *** 1 of 1 ***
?>

<?php if (DEFINE_MAIN_PAGE_STATUS >= 1 and DEFINE_MAIN_PAGE_STATUS <= 2) { ?>
<div id="indexCategories-defineContent" class="defineContent"><?php
/**
 * require the html_define for the index/categories page
 */
  include($define_page);
?>
</div>
<?php } ?>

<?php } else { ?>
<h1 id="indexCategories-pageHeading" class="pageHeading"><?php echo $current_categories_name; ?></h1>
<?php } ?>

<?php
if (PRODUCT_LIST_CATEGORIES_IMAGE_STATUS_TOP == 'true') {
// categories_image
  if ($categories_image = zen_get_categories_image($current_category_id)) {
?>
<div id="indexCategories-categoryImage" class="categoryImage">
<?php echo zen_image(DIR_WS_IMAGES . $categories_image, '', SUBCATEGORY_IMAGE_TOP_WIDTH, SUBCATEGORY_IMAGE_TOP_HEIGHT); ?>
</div>
<?php
  }
} // categories_image
?>

<?php
// categories_description
    if ($current_categories_description != '') {
?>
<div id="indexCategories-categoryDescription" class="categoryDescription content">
<?php echo $current_categories_description;  ?>
</div>
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
$show_display_category = $db->Execute(SQL_SHOW_PRODUCT_INFO_CATEGORY);

while (!$show_display_category->EOF) {
  // //  echo 'I found ' . zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS);

?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_FEATURED_PRODUCTS') { ?>
<?php
/**
 * display the Featured Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_featured_products.php',DIR_WS_TEMPLATE, $current_page_base,'centerboxes'). '/tpl_modules_featured_products.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_SPECIALS_PRODUCTS') { ?>
<?php
/**
 * display the Special Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_specials_default.php',DIR_WS_TEMPLATE, $current_page_base,'centerboxes'). '/tpl_modules_specials_default.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_NEW_PRODUCTS') { ?>
<?php
/**
 * display the New Products Center Box
 */
?>
<?php require($template->get_template_dir('tpl_modules_whats_new.php',DIR_WS_TEMPLATE, $current_page_base,'centerboxes'). '/tpl_modules_whats_new.php'); ?>
<?php } ?>

<?php if ($show_display_category->fields['configuration_key'] == 'SHOW_PRODUCT_INFO_CATEGORY_UPCOMING') { ?>
<?php include(DIR_WS_MODULES . zen_get_module_directory('centerboxes/' . FILENAME_UPCOMING_PRODUCTS)); ?>
<?php } ?>
<?php
  $show_display_category->MoveNext();
} // !EOF
?>
</div>
