<?php
// -----
// Part of the Bootstrap 4 Template Home-Page Carousel by lat9.
// Copyright (C) 2021, Vinos de Frutas Tropicales.
//
// This file contains pseudo-configuration settings that control the slider's display.
//

// -----
// Defines the "Banner Manager" 'group' associated with the home-page slider's images.
//
define('BS4_SLIDER_BANNER_GROUP', 'HomeSlider');

// -----
// These settings define the base width and height to be applied to the slider images.
//
// If your site DOESN'T use "Image Handler", then the images "should" be sized identically and
// a value of '' (an empty string) result in a full-size image being used.  This is needed to
// ensure that the slider images resize properly on various viewport sizes.
//
// If your site DOES use "Image Handler", then you can benefit from IH's image-size forcing
// to ensure that differently sized images are each rendered in the same width and height.
// For instance, if your images are normally 1170 x 400 but a couple are slightly different,
// you'll use settings of '1170!' and '400!' for the width and height, respectively.
//
define('BS4_SLIDER_WIDTH', '1170!');
define('BS4_SLIDER_HEIGHT', '400!');
