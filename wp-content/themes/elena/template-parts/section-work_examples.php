<section id="work_examples" class="workExamplesWrap"
         style="background-image: url(<?php the_field('work_examples_section_background'); ?>)">

    <div class="customContainer">

        <div class="workExamplesContainer">

            <div class="titles">
                <h2 class="title">
                    <?php the_field('work_examples_section_title'); ?>
                </h2>
                <div class="separator"></div>
                <div class="description">
                    <?php the_field('work_examples_section_description'); ?>
                </div>
            </div>

            <div class="workExamples">

                <?php if (have_rows('work_examples_section_category')): ?>

                    <div class="tabsWrap">

                        <?php $counter = 0; ?>

                        <?php while (have_rows('work_examples_section_category')) : the_row(); ?>

                            <a href="#" class="tabsWrap__item<?php if ($counter == 0) : ?> active<?php endif; ?>"
                               data-tab-id="<?php echo $counter; ?>"><?php the_sub_field('name'); ?></a>

                            <?php $counter++; ?>

                        <?php endwhile; ?>

                        <?php reset_rows(); ?>

                    </div>

                <?php endif; ?>


                <div class="tabsContent">

                    <?php if (have_rows('work_examples_section_category')): ?>

                    <?php $counter = 0; ?>

                    <?php while (have_rows('work_examples_section_category')) : the_row(); ?>

                        <div class="itemRowWrap<?php if ($counter == 0) : ?> active<?php endif; ?>">

                            <?php $gallery = get_sub_field('gallery');

                            $left_counter = 0;

                            if ($gallery) : ?>

                                <div class="owlLeftSide">

                                    <?php foreach ($gallery as $key => $image_data) : ?>

                                        <?php if ($key < 2) : ?>

                                            <a href="#" data-item-index="<?php echo $left_counter; ?>">
                                                <img src="<?php echo $image_data['url']; ?>"
                                                     alt="<?php echo $image_data['alt']; ?>">
                                            </a>

                                        <?php endif; ?>

                                        <?php $left_counter++; ?>

                                    <?php endforeach; ?>

                                </div>

                            <?php endif; ?>


                            <?php if ($gallery) : ?>

                                <div class="owlGallery owl-carousel owl-theme">

                                    <?php foreach ($gallery as $image_data) : ?>

                                        <div class="imgItem">
                                            <img src="<?php echo $image_data['url']; ?>"
                                                 alt="<?php echo $image_data['alt']; ?>">
                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            <?php endif; ?>


                            <?php $right_counter = 2;

                            if ($gallery) : ?>

                                <div class="owlRightSide">

                                    <?php foreach ($gallery as $key => $image_data) : ?>

                                        <?php if ($key > 1 && $key != 4) : ?>

                                            <a href="#" data-item-index="<?php echo $left_counter; ?>">
                                                <img src="<?php echo $image_data['url']; ?>"
                                                     alt="<?php echo $image_data['alt']; ?>">
                                            </a>

                                        <?php endif; ?>

                                        <?php $left_counter++; ?>

                                    <?php endforeach; ?>

                                </div>

                            <?php endif; ?>

                        </div>

                        <?php $counter++; ?>

                    <?php endwhile; ?>

                    <?php reset_rows(); ?>

                </div>

            <?php endif; ?>

            </div><!-- workExamples -->

        </div><!-- workExamplesContainer -->

    </div><!-- customContainer -->

</section><!-- workExamplesWrap -->