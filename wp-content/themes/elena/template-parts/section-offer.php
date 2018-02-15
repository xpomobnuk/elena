<section id="offers" class="offerWrap" style="background-image: url(<?php the_field('offer_section_background'); ?>)">

    <div class="customContainer">

        <div class="offerContainer">

            <div class="titles">
                <h2 class="title">
                    <?php the_field('offer_section_title'); ?>
                </h2>
                <div class="separator"></div>
                <div class="description">
                    <?php the_field('offer_section_description'); ?>
                </div>
            </div>

            <div class="offers">

                <?php if (have_rows('offer_section_offers')):

                    while (have_rows('offer_section_offers')) : the_row(); ?>

                        <div class="item">

                            <?php $gallery = get_sub_field('mini_gallery');

                            if ($gallery) : ?>

                                <div class="image<?php if (count($gallery) > 1) : ?> owl-carousel owl-theme<?php endif; ?>">

                                    <?php foreach ($gallery as $image_data) : ?>

                                        <img src="<?php echo $image_data['url']; ?>" alt="<?php echo $image_data['alt']; ?>">

                                    <?php endforeach; ?>

                                </div>

                            <?php endif; ?>

                            <div class="contentWrap">
                                <h3 class="title">
                                    <?php the_sub_field('name'); ?>
                                </h3>
                                <div class="price">
                                    <?php the_sub_field('price'); ?>
                                </div>
                                <div class="content">
                                    <?php the_sub_field('description'); ?>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>

                    <?php reset_rows();?>

                <?php endif; ?>

            </div><!-- offers -->

        </div><!-- offerContainer -->

    </div><!-- customContainer -->

</section><!-- offerWrap -->