    <?php get_header(); ?>

    <main class="site-content max-w-7xl mx-auto">



        <?php if (is_category()) : ?>
            <?php get_template_part('template-parts/hero', null, [
                'heading' => single_cat_title('',false),
                'text' => wp_strip_all_tags(category_description()),
            ]); ?>
        <?php endif; ?>

        <?php
        if (have_posts()) : ?>
            <div class="mx-auto mt-5 mb-5 grid grid-cols-1 gap-6 px-5 md:grid-cols-3">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/post-card', null, [
                        'post_id' => get_the_ID(),
                        'permalink' => get_permalink(),
                        'title' => get_the_title(),
                        'excerpt' => get_the_excerpt(),
                    ]); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('template-parts/404'); ?>
            <?php endif; ?>
            </div>
    </main>

    <?php get_footer(); ?>
