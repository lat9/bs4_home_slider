<?php
// -----
// Part of the Bootstrap 4 Template Home-Page Carousel by lat9.
// Copyright (C) 2021, Vinos de Frutas Tropicales.
//
// -----
// The 'pseudo-configuration' settings can be found in /includes/extra_datafiles/bs4_home_slider.php.
//
$bs4_hp_banners = $db->Execute(
    "SELECT banners_id, banners_title, banners_image, banners_url
       FROM " . TABLE_BANNERS . "
      WHERE status = 1
        AND banners_group = '" . BS4_SLIDER_BANNER_GROUP . "'
      ORDER BY banners_sort_order, banners_id"
);

if (!$bs4_hp_banners->EOF) {
?>
<div id="carouselHomeSlider" class="carousel slide" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
<?php
    for ($i = 0, $n = count($bs4_hp_banners), $hp_class = ' class="active"'; $i < $n; $i++) {
?>
        <li data-target="#carouselHomeSlider" data-slide-to="<?php echo $i; ?>"<?php echo $hp_class; ?>></li>
<?php
        $hp_class = '';
    }
?>
    </ol>
    <div class="carousel-inner">
<?php
    $hp_class = ' active';
    foreach ($bs4_hp_banners as $row) {
        $banner_href = (empty($row['banners_url'])) ? '#' : (HTTPS_SERVER . DIR_WS_CATALOG . $row['banners_url']);
?>
        <div class="carousel-item<?php echo $hp_class; ?>">
            <a href="<?php echo $banner_href; ?>"><?php echo zen_image(DIR_WS_IMAGES . $row['banners_image'], $row['banners_title'], BS4_SLIDER_WIDTH, BS4_SLIDER_HEIGHT, ' class="mx-auto d-block"'); ?></a>
        </div>
<?php
        $hp_class = '';
    } 
?>
    </div>
    <a class="carousel-control-prev" href="#carouselHomeSlider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only"><?php echo BS4_PREVIOUS; ?></span>
    </a>
    <a class="carousel-control-next" href="#carouselHomeSlider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only"><?php echo BS4_NEXT; ?></span>
    </a>
</div>
<div class="pb-2"></div>
<?php
}
unset($bs4_hp_banners);
