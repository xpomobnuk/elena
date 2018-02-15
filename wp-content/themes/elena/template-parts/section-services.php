<section id="services" class="servicesWrap"
         style="background-image: url(<?php the_field('services_section_background'); ?>)">

    <div class="customContainer">

        <div class="servicesContainer">

            <div class="titles">
                <h2 class="title">
                    <?php the_field('services_section_title'); ?>
                </h2>
                <div class="separator"></div>
                <div class="description">
                    <?php the_field('services_section_description'); ?>
                </div>
            </div>

            <div class="services">

                <?php if (have_rows('services_section_services')) :

                    $services_obj = get_field_object('services_section_services');
                    $services_count = count($services_obj['value']);
                    $services_current_number = 0; ?>

                    <?php while (have_rows('services_section_services')) : the_row(); ?>

                    <?php if ($services_current_number == 0) : ?>

                        <div class="itemsWrap<?php if ($services_count < 4) : ?> center<?php endif; ?>">

                    <?php elseif ($services_current_number % 4 == 0 && $services_count > 4) : ?>

                    </div><!-- itemWrap -->
                    <div class="itemsWrap<?php if (($services_count - $services_current_number) < 4) : ?> center<?php endif; ?>">

                    <?php endif; ?>


                    <div class="item">
                        <div class="item__icon">

                            <?php $load_img = get_sub_field('load_image');
                            $image_data = get_sub_field('image');

                            if ($load_img) : ?>

                                <img src="<?php echo $image_data['url']; ?>"
                                     alt="<?php echo $image_data['alt']; ?>">

                            <?php else :

                                the_sub_field('icon');

                            endif; ?>

                        </div>

                        <h3 class="item__title">
                            <?php the_sub_field('name'); ?>
                        </h3>
                        <p class="item__description">
                            <?php the_sub_field('description'); ?>
                        </p>

                        <?php $btn = get_sub_field('button_option');
                        $enable_popup = $btn['enable_popup'];
                        $btn_title = $btn['text'];
                        $btn_url = $btn['url']; ?>

                        <?php if ($btn) : ?>

                            <a href="<?php if ($enable_popup) : ?>#<?php else : echo $btn_url; endif; ?>"
                               class="item__btn<?php if ($enable_popup) : ?> showPopup<?php endif; ?>"
                               data-popup-name="findOutPrice">
                                <?php echo $btn_title; ?>
                            </a>

                        <?php endif; ?>

                    </div>

                    <?php $services_current_number++; ?>

                    <?php if ($services_current_number == $services_count && $services_count <= 4) : ?>

                        </div><!-- itemWrap -->

                    <?php endif; ?>

                <?php endwhile; ?>

                    <?php reset_rows(); ?>

                <?php endif; ?>

            </div><!-- services -->

        </div><!-- servicesContainer -->

    </div><!-- customContainer -->

</section><!-- servicesWrap -->