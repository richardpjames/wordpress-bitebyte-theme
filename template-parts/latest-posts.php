<?php
$recent_posts = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => $args['number_of_posts'] ?? 3,
));

if ($recent_posts->have_posts()) : ?>
    <h2 class="text-5xl text-center">Latest Posts</h2>
    <p class="text-center">View the latest posts from across the blog</p>
    <div class="max-w-7xl mx-auto px-5 mb-5 grid grid-cols-1 md:grid-cols-3">

        <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
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

    <?php wp_reset_postdata(); ?>