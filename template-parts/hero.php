<?php
$heading = isset($args['heading']) ? wp_strip_all_tags($args['heading']) : '';
$text = isset($args['text']) ? wp_strip_all_tags($args['text']) : '';

?>

<section class="mx-auto mt-5 max-w-7xl px-5">
    <div class="theme-surface-1 theme-card-shadow relative overflow-hidden rounded-[2rem] border theme-border shadow-2xl">
        <div class="theme-hero-gradient absolute inset-0"></div>
        <div class="theme-hero-radial absolute inset-0"></div>
        <div class="absolute inset-0 bg-[linear-gradient(120deg,transparent_0%,transparent_42%,rgba(255,255,255,0.06)_42.5%,transparent_43%,transparent_100%)]" style="opacity: 0.18;"></div>

        <div class="relative z-10 px-6 py-10 sm:px-8 sm:py-14 lg:px-12 lg:py-16">
            <div class="max-w-4xl">
                <h1 class="theme-text-strong max-w-4xl text-4xl font-semibold tracking-tight sm:text-5xl lg:text-6xl">
                    <?php echo esc_html($heading); ?>
                </h1>

                <?php if ($text) : ?>
                    <p class="theme-text-body mt-6 max-w-2xl text-base leading-8 sm:text-lg">
                        <?php echo esc_html($text); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
