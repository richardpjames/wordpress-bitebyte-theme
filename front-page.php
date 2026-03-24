    <?php get_header(); ?>

    <main class="site-content">

        <div class="max-w-7xl mx-auto px-5">
            <section class="page-content">
                <div class="relative overflow-hidden rounded-xl mt-5 ">
                    <div class="absolute inset-0 bg-cover bg-center"
                        style="background-image: url('/wp-content/uploads/2026/03/front-background.jpg');"></div>

                    <div class="relative z-10 p-8 text-gray-900">
                        <div class="mx-auto py-24 md:py-56">
                            <h1 class="text-6xl sm:text-7xl text-center">Hello!</h1>
                            <p class="text-l sm:text-xl text-center pt-5 text-gray-900!">Welcome to my personal blog where I discuss food and technology and showcase some of my latest projects covering Laravel, React, WordPress and web development.</p>
                            <p class="text-3xl sm:text-5xl text-bold text-center pt-5 text-gray-900!">
                                <i class="fa-solid fa-burger"></i>
                                <i class="fa-brands fa-html5"></i>
                                <i class="fa-solid fa-pizza-slice"></i>
                                <i class="fa-brands fa-css"></i>
                                <i class="fa-solid fa-martini-glass-empty"></i>
                                <i class="fa-brands fa-square-js"></i>
                            </p>
                        </div>
                    </div>
                </div>
                <h2 class="text-4xl sm:text-5xl! text-center">Latest Posts</h2>
                <p class="text-center">View the latest posts from across the blog</p>
            </section>
        </div>




        <?php
        $recent_posts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 6,
        ));

        if ($recent_posts->have_posts()) : ?>

            <div class="max-w-7xl mx-auto px-5 mb-5 grid grid-cols-1 md:grid-cols-3">
                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                    <article class="rounded-2xl border border-gray-700 p-5 m-2 col-span-1 bg-gray-800" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div>
                            <h2 class="mt-2 text-lg text-white max-lg:text-center">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="mt-2 max-w-lg text-sm/6">
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

            <?php wp_reset_postdata(); ?>

    </main>

    <?php get_footer(); ?>