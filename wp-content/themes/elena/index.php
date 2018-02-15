<?php get_header(); ?>

    <div class="pageContent">

        <div class="container">

            <div class="pageTitle"><?php the_title(); ?></div>

            <div class="theContent">

                <?php if (have_posts()) :

                    while (have_posts()) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; ?>

                <?php endif; ?>

            </div>

        </div><!-- container -->

    </div><!-- page content -->

<?php get_footer();