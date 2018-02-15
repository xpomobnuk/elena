<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="mainWrapper">

    <div class="mainContent">

        <div class="mobileBtn">
            <a href="#" id="toggleBtn" class="toggle-mnu"><span></span></a>
        </div>

        <div class="sideBarWrap">

            <div id="scroller">

                <div class="sideBarLogo">
                    <?php if (ot_get_option('logo')) : ?>

                        <a href="#firstScreen" class="sideBarLogo__logo">
                            <img src="<?php echo ot_get_option('logo'); ?>" alt="<?php echo get_bloginfo('name') . ' | ' . get_bloginfo('description'); ?>">
                        </a>

                    <?php endif; ?>

                    <a href="#firstScreen" class="sideBarLogo__titles">
                        <p><?php bloginfo('name'); ?></p>
                        <p><?php bloginfo('description'); ?></p>
                    </a>
                </div><!-- sideBarLogo -->

                <?php $args = array(
                    'theme_location' => 'general',
                    'menu' => '',
                    'container' => 'nav',
                    'container_class' => 'sideBarMenu',
                    'container_id' => '',
                    'menu_class' => 'mainMenu',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'walker' => '',
                );

                wp_nav_menu($args); ?>

                <div class="sideBarContacts">

                    <ul class="addressWrap">

                        <?php if (ot_get_option('address')) : ?>

                        <li>
                            <i class="icon">
                                <svg id="Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 363.91 485.21">
                                    <title>marker</title>
                                    <g class="cls-2">
                                        <path d="M182,0C81.47,0,0,81.47,0,182A181.13,181.13,0,0,0,36.31,291L182,485.21,327.6,291A181.11,181.11,0,0,0,363.91,182c0-100.48-81.47-182-182-182m0,303.26A121.3,121.3,0,1,1,303.26,182,121.31,121.31,0,0,1,182,303.26"
                                              transform="translate(0 0)"/>
                                    </g>
                                </svg>
                            </i>

                            <?php echo ot_get_option('address'); ?>

                            <?php endif; ?>

                        </li>

                        <?php if (ot_get_option('metro')) : ?>

                        <li>
                            <i class="icon">
                                <svg id="Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 93.71 76.24">
                                    <title>metro</title>
                                    <polygon
                                            points="77.32 0 47.38 42.52 16.8 0.99 0 70.52 22.73 70.52 26.89 48.28 47.01 76.24 67.02 48.9 71.05 70.64 93.71 70.64 77.32 0"/>
                                </svg>
                            </i>

                            <?php echo ot_get_option('metro'); ?>

                            <?php endif; ?>

                        </li>

                    </ul>

                    <ul class="workTimeWrap">

                        <?php if (ot_get_option('time')) : ?>

                        <li>
                            <i class="icon">
                                <svg id="Слой_1" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 438.53 438.53">
                                    <title>clock</title>
                                    <g class="cls-2">
                                        <path d="M409.13,109.2a218.35,218.35,0,0,0-79.8-79.8Q278.94,0,219.27,0T109.21,29.41a218.29,218.29,0,0,0-79.8,79.8Q0,159.6,0,219.27T29.41,329.33a218.35,218.35,0,0,0,79.8,79.8q50.4,29.41,110.06,29.41t110.06-29.41a218.29,218.29,0,0,0,79.8-79.8q29.4-50.39,29.4-110.06T409.13,109.2m-55.39,188a154.84,154.84,0,0,1-56.53,56.53,151.81,151.81,0,0,1-77.94,20.83,151.82,151.82,0,0,1-77.94-20.83A154.85,154.85,0,0,1,84.8,297.21,151.78,151.78,0,0,1,64,219.27,151.81,151.81,0,0,1,84.8,141.32a154.81,154.81,0,0,1,56.53-56.53A151.8,151.8,0,0,1,219.27,64a151.8,151.8,0,0,1,77.94,20.84,154.82,154.82,0,0,1,56.53,56.53,151.8,151.8,0,0,1,20.84,77.94,151.8,151.8,0,0,1-20.84,77.94"/>
                                        <path d="M246.68,109.63H228.41a8.79,8.79,0,0,0-9.14,9.14v100.5h-64a8.79,8.79,0,0,0-9.14,9.13v18.27a8.79,8.79,0,0,0,9.14,9.13h91.37a8.8,8.8,0,0,0,9.13-9.13V118.77a8.8,8.8,0,0,0-9.14-9.14"/>
                                    </g>
                                </svg>
                            </i>

                            <?php echo ot_get_option('time'); ?>

                            <?php endif; ?>

                        </li>

                        <li><a href="#contacts">Показать на карте</a></li>

                    </ul>

                    <?php $phones = ot_get_option('phones');

                    if ($phones) : ?>

                        <ul class="phoneNumbersWrap">

                            <?php foreach ($phones as $phone) : ?>

                                <li><a href="tel:<?php echo $phone['number']; ?>"
                                       class="phoneNumbersWrap__phone"><?php echo $phone['number']; ?></a></li>

                            <?php endforeach; ?>

                        </ul>

                    <?php endif; ?>

                    <div class="rowWrap">
                        <a href="#" class="callbackBtn showPopup" data-popup-name="callback">Обратный звонок</a>
                    </div>

                    <?php $socials = ot_get_option('social');

                    if ($socials) : ?>

                        <ul class="socialLinkWrap">

                            <?php foreach ($socials as $social) : ?>

                                <li>
                                    <a href="<?php echo $social['url']; ?>" target="_blank">
                                        <?php echo $social['icon']; ?>
                                    </a>
                                </li>

                            <?php endforeach; ?>

                        </ul>

                    <?php endif; ?>

                </div><!-- sideBarContacts -->

            </div>

        </div><!-- sideBarWrap -->
