    <?php get_header(); ?>

    <main class="site-content max-w-7xl mx-auto">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="mt-5 mx-5 rounded-2xl border border-gray-700 p-5 m-2 col-span-1 bg-gray-800" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="text-4xl!">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
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