    <?php get_header(); ?>

    <main class="site-content">

        <?php get_template_part('template-parts/front-page-hero'); ?>
        <?php get_template_part('template-parts/latest-posts', null, ['number_of_posts' => 6]); ?>

    </main>

    <?php get_footer(); ?>