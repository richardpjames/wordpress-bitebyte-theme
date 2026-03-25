<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body class="min-h-screen bg-gray-900 text-white">

    <nav class="border-b border-grey-700 bg-grey-900 backdrop-blur-xl">
        <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
            <!-- Left: Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="text-4xl text-center font-normal mb-2"><?php bloginfo('name'); ?></span></a>

            <!-- Center: Desktop Nav -->
            <div class="hidden lg:flex lg:items-center lg:gap-1">
                <?php $locations = get_nav_menu_locations();
                if (isset($locations['main'])) {
                    $items = wp_get_nav_menu_items($locations['main']);

                    foreach ($items as $item) : ?>

                        <a href="<?php echo $item->url; ?>" class="rounded-md px-3 py-2 text-sm text-zinc-300 transition hover:bg-white/5 hover:text-white">

                            <?php echo $item->title; ?>
                        </a>

                <?php
                    endforeach;
                }
                ?>
            </div>

            <!-- Right: Desktop Actions -->
            <div class="hidden lg:flex lg:items-center lg:gap-3">
                <a
                    href="https://github.com/richardpjames"
                    class="inline-flex items-center gap-2 rounded-md border border-grey-700 bg-white/[0.03] px-3 py-2 text-sm text-zinc-300 transition hover:bg-white/[0.06] hover:text-white">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true">
                        <path d="M12 .5a12 12 0 0 0-3.79 23.39c.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.42-4.04-1.42-.55-1.38-1.33-1.74-1.33-1.74-1.08-.74.08-.73.08-.73 1.2.08 1.83 1.22 1.83 1.22 1.06 1.8 2.78 1.28 3.46.98.11-.77.42-1.28.76-1.57-2.67-.3-5.47-1.32-5.47-5.89 0-1.3.47-2.37 1.22-3.21-.12-.3-.53-1.52.12-3.16 0 0 1-.32 3.3 1.23A11.52 11.52 0 0 1 12 6.32c1.02 0 2.05.14 3.01.4 2.3-1.55 3.3-1.23 3.3-1.23.65 1.64.24 2.86.12 3.16.76.84 1.22 1.91 1.22 3.21 0 4.58-2.8 5.58-5.48 5.88.43.37.81 1.09.81 2.2v3.27c0 .32.22.69.83.58A12 12 0 0 0 12 .5Z" />
                    </svg>
                    <span>Visit on GitHub</span>
                </a>
            </div>

            <!-- Mobile menu button -->
            <button
                id="mobile-menu-button"
                type="button"
                class="inline-flex items-center justify-center rounded-md p-2 text-zinc-300 transition hover:bg-white/5 hover:text-white lg:hidden"
                aria-controls="mobile-menu"
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg id="menu-open-icon" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg id="menu-close-icon" class="hidden h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden border-t border-grey-700 bg-grey-900 lg:hidden">
            <div class="space-y-1 px-4 py-4">

                <?php $locations = get_nav_menu_locations();
                if (isset($locations['main'])) {
                    $items = wp_get_nav_menu_items($locations['main']);

                    foreach ($items as $item) : ?>

                        <a href="<?php echo $item->url; ?>" class="block rounded-md px-3 py-2 text-sm text-zinc-300 hover:bg-white/5 hover:text-white">
                            <?php if ($item->title == 'Food') echo '<i class="fa-solid fa-burger"></i>'; ?>
                            <?php if ($item->title == 'Technology') echo '<i class="fa-solid fa-laptop"></i>'; ?>
                            <?php echo $item->title; ?>
                        </a>

                <?php
                    endforeach;
                }
                ?>
            </div>

            <div class="border-t border-grey-700 px-4 py-4">
                <a
                    href="https://github.com/richardpjames"
                    class="mb-3 inline-flex w-full items-center justify-center gap-2 rounded-md border border-grey-700 bg-white/[0.03] px-3 py-2 text-sm text-zinc-300 hover:bg-white/[0.06] hover:text-white">
                    <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true">
                        <path d="M12 .5a12 12 0 0 0-3.79 23.39c.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.42-4.04-1.42-.55-1.38-1.33-1.74-1.33-1.74-1.08-.74.08-.73.08-.73 1.2.08 1.83 1.22 1.83 1.22 1.06 1.8 2.78 1.28 3.46.98.11-.77.42-1.28.76-1.57-2.67-.3-5.47-1.32-5.47-5.89 0-1.3.47-2.37 1.22-3.21-.12-.3-.53-1.52.12-3.16 0 0 1-.32 3.3 1.23A11.52 11.52 0 0 1 12 6.32c1.02 0 2.05.14 3.01.4 2.3-1.55 3.3-1.23 3.3-1.23.65 1.64.24 2.86.12 3.16.76.84 1.22 1.91 1.22 3.21 0 4.58-2.8 5.58-5.48 5.88.43.37.81 1.09.81 2.2v3.27c0 .32.22.69.83.58A12 12 0 0 0 12 .5Z" />
                    </svg>
                    Visit on GitHub
                </a>
            </div>
        </div>
    </nav>

    <script>
        const button = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open-icon');
        const closeIcon = document.getElementById('menu-close-icon');

        button.addEventListener('click', () => {
            const isOpen = !menu.classList.contains('hidden');
            menu.classList.toggle('hidden');
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
            button.setAttribute('aria-expanded', String(!isOpen));
        });
    </script>