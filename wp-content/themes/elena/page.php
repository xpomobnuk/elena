<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="pageContent contactBG">

        <div class="container">

            <div class="pageTitle"><?php the_title(); ?></div>

            <div class="row">

                <div class="theContent">

                    <div class="col-md-12">

                        <?php the_content(); ?>

                    </div>

                </div>

            </div><!-- row -->

        </div><!-- container -->

    </div><!-- page content -->

<?php endwhile; endif; ?>


<?php get_footer(); ?>