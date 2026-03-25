<?php get_header(); ?>

<main class="site-content mx-auto max-w-7xl">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $categories = get_the_category();
            $primary_category = !empty($categories) ? $categories[0]->name : 'Article';
            $word_count = str_word_count(wp_strip_all_tags(get_the_content()));
            $reading_time = max(1, (int) ceil($word_count / 200));
            $previous_post = get_previous_post();
            $next_post = get_next_post();
            ?>

            <?php get_template_part('template-parts/hero', null, [
                'heading' => get_the_title(),
                'text' => get_the_excerpt(),
            ]); ?>

            <article class="mx-5 mt-6 lg:mt-8" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="grid gap-6 lg:grid-cols-[15rem_minmax(0,1fr)] lg:gap-10">
                    <aside class="h-fit rounded-[1.5rem] border border-white/10 bg-[#111714] p-5 text-sm text-zinc-300 shadow-xl shadow-black/20 lg:sticky lg:top-28">
                        <p class="text-xs font-semibold uppercase tracking-[0.24em] text-sky-300/80">
                            Post details
                        </p>
                        <div class="mt-5 space-y-5">
                            <div>
                                <p class="text-xs uppercase tracking-[0.18em] text-zinc-500">Category</p>
                                <p class="mt-2 text-base font-medium text-white"><?php echo esc_html($primary_category); ?></p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-[0.18em] text-zinc-500">Published</p>
                                <p class="mt-2 text-base font-medium text-white"><?php echo esc_html(get_the_date('F j, Y')); ?></p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-[0.18em] text-zinc-500">Read time</p>
                                <p class="mt-2 text-base font-medium text-white"><?php echo esc_html($reading_time . ' min read'); ?></p>
                            </div>
                        </div>
                    </aside>

                    <div class="rounded-[1.75rem] border border-white/10 bg-[#111714] p-6 shadow-xl shadow-black/20 sm:p-8 lg:p-10">
                        <div class="border-b border-white/10 pb-6">
                            <p class="text-sm leading-7 text-zinc-400">
                                Published on <span class="font-medium text-zinc-200"><?php echo esc_html(get_the_date('F j, Y')); ?></span>
                                in <span class="font-medium text-sky-300"><?php echo esc_html($primary_category); ?></span>.
                            </p>
                        </div>

                        <div class="entry-content prose prose-invert mt-8 max-w-3xl prose-headings:text-white prose-p:text-zinc-300 prose-strong:text-white prose-a:text-sky-300">
                            <?php the_content(); ?>
                        </div>

                        <div class="mt-10 border-t border-white/10 pt-6">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <a
                                    href="<?php echo esc_url(get_permalink(get_option('page_for_posts') ?: home_url('/'))); ?>"
                                    class="inline-flex items-center gap-2 text-sm font-medium text-zinc-400 transition hover:text-white">
                                    <span aria-hidden="true">&larr;</span>
                                    <span>Back to posts</span>
                                </a>

                                <div class="flex flex-col gap-3 sm:items-end">
                                    <?php if ($previous_post) : ?>
                                        <a
                                            href="<?php echo esc_url(get_permalink($previous_post)); ?>"
                                            class="text-sm text-zinc-400 transition hover:text-sky-300">
                                            Previous: <?php echo esc_html(get_the_title($previous_post)); ?>
                                        </a>
                                    <?php endif; ?>

                                    <?php if ($next_post) : ?>
                                        <a
                                            href="<?php echo esc_url(get_permalink($next_post)); ?>"
                                            class="text-sm text-zinc-400 transition hover:text-sky-300">
                                            Next: <?php echo esc_html(get_the_title($next_post)); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <?php get_template_part('template-parts/404'); ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
