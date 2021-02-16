# Bootstrap 4 Template &mdash; Home-Page Slider Configuration
The *Bootstrap-4 Home-Page Slider* is configured using the base Zen Cart's ***Tools :: Banner Manager***, with additional controls provided by the pseudo-configuration settings present in `/includes/extra_datafiles/bs4_home_slider.php`.  When configured, the image-slider is displayed on a site's main/index page between the 'customer greeting' and any main-page `define` page content.

## Pseudo-Configuration Settings

The file `/includes/extra_datafiles/bs4_home_slider.php` provides the following configuration settings used when rendering the home-page (i.e. index) slider's display.

| Constant Name                       | Usage                                                        |
| ----------------------------------- | ------------------------------------------------------------ |
| BS4_SLIDER_BANNER_GROUP             | This value, which defaults to **HomeSlider**, identifies the banner-group associated with the home-page slider.  You'll use this group name when using the admin's ***Banner Manager*** to select the images to be included in the slider. |
| BS4_SLIDER_WIDTH, BS4_SLIDER_HEIGHT | These settings define the base width and height to be applied to the slider images.  If your site **doesn't** use "Image Handler", then the images "should" be sized identically and a value of '' (an empty string) result in a full-size image being used.  This is needed to ensure that the slider images resize properly on various viewport sizes.  If your site **does** use "Image Handler", then you can benefit from IH's image-size forcing to ensure that differently sized images are each rendered in the same width and height.  For instance, if your images are normally 1170 x 400 but a couple are slightly different, you'll use settings of '1170!' and '400!' for the width and height, respectively. |

The most important element of the slider's configuration (if you don't use *Image Handler*) is to ensure that each of the slider's images are *exactly the same dimensions*.  If the images aren't sized consistently, your site will display an unwanted "Content Layer Shift" (CLS) that could cause various SEO-related warnings!

## Using the "Banner Manager"

You'll use the Zen Cart admin's ***Banner Manager*** to configure the home-page slider, noting that some of the values presented by that tool aren't used by the slider.

| Field Name        | Description                                                  |
| ----------------- | ------------------------------------------------------------ |
| Banner Status     | A banner must be 'Active' for it to be displayed in the slider. |
| Banner New Window | This setting is ignored.  Slider images are never displayed in a new window. |
| Banner on SSL     | This setting is ignored.  Slider images are always displayed using the `HTTPS_SERVER` setting as a link's base. |
| Banner Title      | Provides the `alt=` attribute for the displayed slider-image. |
| Banner URL        | If this setting is not an empty string, it's presumed to be a relative link for the store, e.g. `index.php?main_page=index`.  To generate the link, the storefront processing appends this value to `HTTPS_SERVER . DIR_WS_CATALOG` ... the `zen_href_link` function is **not** used.  If your store uses a URL rewriter, e.g. Ceon URI Mapping or USU, you'll set this value to the rewritten version of the in-store link. |
| Banner Group      | Must be the name defined in the `BS4_SLIDER_BANNER_GROUP` setting described above. |
| Image             | Must be provided for proper storefront display.              |
| HTML Text         | This setting is ignored.  The home-page slider supports images only. |
| Sort Order        | This setting identifies the display order applied to the slider images.  The slider images are sorted by their sort order and their `banners_id` to provide a repeatable display. |
| Scheduled At      | This setting enables you to stage a series of slider images to appear starting on the specified date and works in conjunction with the Expired On date. |
| Expires On        | This setting enables you to stage a series of slider images that 'expire' on a specified date and works in conjunction with the Scheduled At date. |

