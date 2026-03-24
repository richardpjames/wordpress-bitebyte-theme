    <?php get_header(); ?>

    <main class="site-content">

        <div class="max-w-4xl mx-auto px-5">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <section class="page-content">
                        <?php the_content(); ?>
                    </section>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <?php
        $recent_posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 6,
        ));

        if ($recent_posts->have_posts()) : ?>

            <div class="max-w-4xl mx-auto px-5 mb-5 grid grid-cols-3">
                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                    <article class="rounded-lg border p-5 m-2 col-span-1" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div>
                            <h2 class="text-2xl!">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="text-sm">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="text-6xl px-5 max-w-4xl mx-auto text-center pb-5">404</p>
                <p class="text-center">Sorry, the page you are looking for does not exist.</p>
            <?php endif; ?>
            </div>

            <?php wp_reset_postdata(); ?>

    </main>

    <?php get_footer(); ?>