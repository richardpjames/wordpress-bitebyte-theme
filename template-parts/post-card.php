<?php
$post_id = isset($args['post_id']) ? (int) $args['post_id'] : 0;
$permalink = isset($args['permalink']) ? $args['permalink'] : '';
$title = isset($args['title']) ? wp_strip_all_tags($args['title']) : '';
$excerpt = isset($args['excerpt']) ? wp_strip_all_tags($args['excerpt']) : '';
$published_date = $post_id ? get_the_date('F j, Y', $post_id) : '';
?>

<article
    class="group col-span-1 mt-2 flex h-full flex-col justify-between rounded-[1.75rem] border border-white/10 bg-[#111714] p-6 text-zinc-100 shadow-xl shadow-black/20 transition duration-300 hover:-translate-y-1 hover:border-sky-500/30 hover:shadow-sky-950/20"
    id="post-<?php echo esc_attr($post_id); ?>">
    <div>
        <?php if ($published_date) : ?>
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-sky-300/80">
                <?php echo esc_html($published_date); ?>
            </p>
        <?php endif; ?>

        <h2 class="mt-4 text-2xl font-semibold tracking-tight text-white">
            <a
                class="transition-colors duration-200 group-hover:text-sky-200"
                href="<?php echo esc_url($permalink); ?>">
                <?php echo esc_html($title); ?>
            </a>
        </h2>

        <?php if ($excerpt) : ?>
            <p class="mt-4 text-sm leading-7 text-zinc-400">
                <?php echo esc_html($excerpt); ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="mt-8 flex items-center justify-between border-t border-white/10 pt-4">
        <span class="text-sm font-medium text-zinc-500">
            Read more
        </span>
        <a
            class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-white/10 bg-white/5 text-sky-300 transition duration-200 group-hover:border-sky-500/30 group-hover:bg-sky-500/10 group-hover:text-sky-200"
            href="<?php echo esc_url($permalink); ?>"
            aria-label="<?php echo esc_attr(sprintf('Read %s', $title)); ?>">
            <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 5l7 7-7 7" />
            </svg>
        </a>
    </div>
</article>
