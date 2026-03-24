    <?php get_header(); ?>

    <main class="site-content max-w-7xl mx-auto">

        <?php
        if (have_posts()) : ?>

            <div class=" mx-auto px-5 mt-10 mb-5 grid grid-cols-1 md:grid-cols-3">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="rounded-lg border p-5 m-2 col-span-1" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div>
                            <h2 class="text-2xl! text-yellow-400">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="text-sm">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="text-6xl px-5  mx-auto text-center pb-5">404</p>
                <p class="text-center">Sorry, the page you are looking for does not exist.</p>
            <?php endif; ?>
            </div>

    </main>

    <?php get_footer(); ?>