    <?php get_header(); ?>

    <main class="site-content max-w-7xl mx-auto">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/hero', null, [
                'heading' => the_title('', '',false),
            ]); ?>
                <div class="mt-5 mx-5 rounded-2xl border border-gray-700 p-5 m-2 col-span-1 bg-gray-800" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part('template-parts/404'); ?>
        <?php endif; ?>
    </main>

    <?php get_footer(); ?>