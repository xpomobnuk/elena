<section id="team" class="teamWrap" style="background-image: url(<?php the_field('team_section_background'); ?>)">

    <div class="customContainer">

        <div class="teamContainer">

            <div class="titles white">
                <h2 class="title">
                    <?php the_field('team_section_title'); ?>
                </h2>
                <div class="separator"></div>
                <div class="description">
                    <?php the_field('team_section_description'); ?>
                </div>
            </div>

            <div class="team">

                <?php if (have_rows('team_section_person')):

                    while (have_rows('team_section_person')) : the_row(); ?>

                        <div class="item">
                            <div class="item__image">

                                <?php $image_data = get_sub_field('image'); ?>

                                <img src="<?php echo $image_data['url']; ?>" alt="<?php echo $image_data['alt']; ?>">

                            </div>
                            <h2 class="item__title">
                                <?php the_sub_field('name'); ?>
                            </h2>
                            <h3 class="item__subtitle">
                                <?php the_sub_field('position'); ?>
                            </h3>
                            <div class="item__description">
                                <?php the_sub_field('description'); ?>
                            </div>

                            <?php if (have_rows('social')): ?>

                                <ul class="socialLinkWrap">

                                    <?php while (have_rows('social')) : the_row(); ?>

                                        <li><a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('icon'); ?></a>
                                        </li>

                                    <?php endwhile; ?>

                                </ul>

                            <?php endif; ?>

                        </div>

                    <?php endwhile; ?>

                    <?php reset_rows();?>

                <?php endif; ?>

            </div><!-- team -->

        </div><!-- teamContainer -->

    </div><!-- customContainer -->

</section><!-- teamWrap -->