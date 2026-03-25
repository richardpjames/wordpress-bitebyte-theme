<?php
$heading = isset($args['heading']) ? wp_strip_all_tags($args['heading']) : '';
$text = isset($args['text']) ? wp_strip_all_tags($args['text']) : '';

?>

<section class="mx-auto mt-5 max-w-7xl px-5">
    <div class="relative overflow-hidden rounded-[2rem] border border-white/10 bg-[#0f1512] shadow-2xl shadow-black/30">
        <div
            class="absolute inset-0 bg-cover bg-center opacity-14"
            style="background-image: url('/wp-content/uploads/2026/03/front-background.jpg');"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-sky-500/12 via-[#0f1512]/92 to-[#0b0f0c]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(56,189,248,0.16),_transparent_32%),radial-gradient(circle_at_bottom_right,_rgba(255,255,255,0.08),_transparent_28%)]"></div>

        <div class="relative z-10 px-6 py-10 sm:px-8 sm:py-14 lg:px-12 lg:py-16">
            <div class="max-w-4xl">
                <h1 class="max-w-4xl text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    <?php echo esc_html($heading); ?>
                </h1>

                <?php if ($text) : ?>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-zinc-300 sm:text-lg">
                        <?php echo esc_html($text); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
