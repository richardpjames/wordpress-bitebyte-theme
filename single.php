    <?php get_header(); ?>

    <main class="site-content">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post px-5 max-w-4xl mx-auto pb-5" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h2 class="text-4xl!">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <div>
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p class="text-6xl px-5 max-w-4xl mx-auto text-center pb-5">404</p>
            <p class="text-center">Sorry, the page you are looking for does not exist.</p>
        <?php endif; ?>
    </main>

    <?php get_footer(); ?>