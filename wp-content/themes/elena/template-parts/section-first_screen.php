<?php

$btn = get_field('first_screen_section_button_option');
$enable_popup = $btn['enable_popup'];
$btn_title = $btn['text'];
$btn_url = $btn['url'];

?>

<section id="firstScreen" class="firstScreenWrap"
         style="background-image: url(<?php the_field('first_screen_section_background'); ?>)">

    <div class="customContainer">

        <div class="firstScreenContainer">

            <div class="titles">
                <h1>
                    <?php the_field('first_screen_section_title'); ?>
                </h1>

                <div class="description">
                    <?php the_field('first_screen_section_description'); ?>
                </div>

                <?php if ($btn) : ?>

                    <div class="rowWrap">
                        <a href="<?php if ($enable_popup) : ?>#<?php else : echo $btn_url; endif; ?>"
                           class="subscribeBtn<?php if ($enable_popup) : ?> showPopup<?php endif; ?>"
                           data-popup-name="makeAppointment">
                            <?php echo $btn_title; ?>
                        </a>
                    </div>

                <?php endif; ?>

            </div>

        </div><!-- firstScreenContainer -->

    </div><!-- customContainer -->

</section><!-- firstScreenWrap -->