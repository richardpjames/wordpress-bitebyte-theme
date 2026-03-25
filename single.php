    <?php get_header(); ?>

    <main class="site-content max-w-7xl mx-auto">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/hero', null, [
                'heading' => the_title('', '',false),
            ]); ?>
                <div class="mx-5 mt-5 rounded-[1.75rem] border border-white/10 bg-[#111714] p-6 text-zinc-200 shadow-xl shadow-black/20" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content prose prose-invert max-w-none prose-headings:text-white prose-p:text-zinc-300 prose-strong:text-white prose-a:text-sky-300">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part('template-parts/404'); ?>
        <?php endif; ?>
    </main>

    <?php get_footer(); ?>
