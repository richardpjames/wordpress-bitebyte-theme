<!DOCTYPE html>
<html <?php language_attributes(); ?> data-theme="dark">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        (() => {
            const storedTheme = localStorage.getItem('site-theme');
            const theme = storedTheme || 'dark';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    <style>
        :root {
            --site-bg: #0b0f0c;
            --surface-1: #0f1512;
            --surface-2: #111714;
            --surface-3: rgba(255, 255, 255, 0.03);
            --surface-4: rgba(255, 255, 255, 0.05);
            --border-color: rgba(255, 255, 255, 0.1);
            --text-strong: #ffffff;
            --text-body: #d4d4d8;
            --text-muted: #a1a1aa;
            --text-soft: #71717a;
            --accent: #38bdf8;
            --accent-strong: #0ea5e9;
            --accent-soft: rgba(14, 165, 233, 0.12);
            --accent-soft-strong: rgba(14, 165, 233, 0.18);
            --shadow-color: rgba(0, 0, 0, 0.22);
            --hero-gradient: linear-gradient(135deg, #111815 0%, #101612 52%, #0c110e 100%);
            --hero-radial: radial-gradient(circle at top left, rgba(56, 189, 248, 0.09), transparent 38%), radial-gradient(circle at 82% 18%, rgba(14, 165, 233, 0.05), transparent 28%), radial-gradient(circle at bottom right, rgba(255, 255, 255, 0.03), transparent 34%);
        }

        html[data-theme="light"] {
            --site-bg: #f4f7fb;
            --surface-1: #ffffff;
            --surface-2: #fcfdff;
            --surface-3: rgba(15, 23, 42, 0.03);
            --surface-4: rgba(15, 23, 42, 0.06);
            --border-color: rgba(15, 23, 42, 0.1);
            --text-strong: #0f172a;
            --text-body: #334155;
            --text-muted: #475569;
            --text-soft: #64748b;
            --accent: #075985;
            --accent-strong: #0369a1;
            --accent-soft: rgba(3, 105, 161, 0.1);
            --accent-soft-strong: rgba(3, 105, 161, 0.16);
            --shadow-color: rgba(15, 23, 42, 0.08);
            --hero-gradient: linear-gradient(135deg, #f7fbff 0%, #f4f8fd 54%, #eef4fb 100%);
            --hero-radial: radial-gradient(circle at top left, rgba(56, 189, 248, 0.1), transparent 38%), radial-gradient(circle at 82% 18%, rgba(14, 165, 233, 0.05), transparent 26%), radial-gradient(circle at bottom right, rgba(15, 23, 42, 0.04), transparent 34%);
        }

        body {
            background: var(--site-bg);
            color: var(--text-body);
            transition: background-color 0.25s ease, color 0.25s ease;
        }

        .theme-surface-1 { background: var(--surface-1); }
        .theme-surface-2 { background: var(--surface-2); }
        .theme-surface-3 { background: var(--surface-3); }
        .theme-surface-4 { background: var(--surface-4); }
        .theme-border { border-color: var(--border-color); }
        .theme-text-strong { color: var(--text-strong); }
        .theme-text-body { color: var(--text-body); }
        .theme-text-muted { color: var(--text-muted); }
        .theme-text-soft { color: var(--text-soft); }
        .theme-accent { color: var(--accent); }
        .theme-accent-border { border-color: color-mix(in srgb, var(--accent-strong) 24%, transparent); }
        .theme-accent-soft { background: var(--accent-soft); }
        .theme-accent-soft-strong { background: var(--accent-soft-strong); }
        .theme-card-shadow { box-shadow: 0 24px 60px var(--shadow-color); }
        .theme-hero-gradient { background-image: var(--hero-gradient); }
        .theme-hero-radial { background-image: var(--hero-radial); }
        .theme-hover-surface:hover { background: var(--surface-4); }
        .theme-hover-strong:hover { color: var(--text-strong); }
        .theme-hover-accent:hover { color: var(--accent); }
        .theme-hover-accent-soft:hover { background: var(--accent-soft-strong); }

        .theme-prose {
            color: var(--text-body);
        }

        .theme-prose h1,
        .theme-prose h2,
        .theme-prose h3,
        .theme-prose h4,
        .theme-prose h5,
        .theme-prose h6,
        .theme-prose strong {
            color: var(--text-strong);
        }

        .theme-prose p,
        .theme-prose li,
        .theme-prose blockquote,
        .theme-prose code {
            color: var(--text-body);
        }

        .theme-prose a {
            color: var(--accent);
        }

        .theme-toggle-icon-light,
        html[data-theme="light"] .theme-toggle-icon-dark {
            display: none;
        }

        html[data-theme="light"] .theme-toggle-icon-light {
            display: block;
        }

        html[data-theme="light"] .theme-toggle-icon-dark {
            display: none;
        }

        html[data-theme="dark"] .theme-toggle-icon-light {
            display: none;
        }

        html[data-theme="dark"] .theme-toggle-icon-dark {
            display: block;
        }
    </style>
    <?php wp_head(); ?>
</head>

<?php
$locations = get_nav_menu_locations();
$menu_items = [];

if (isset($locations['main'])) {
    $menu_items = wp_get_nav_menu_items($locations['main']) ?: [];
}

$current_url = trailingslashit(home_url(add_query_arg([], $wp->request ?? '')));
?>

<body class="min-h-screen theme-text-body">

    <nav class="sticky top-0 z-50 border-b theme-border backdrop-blur-xl" style="background: color-mix(in srgb, var(--surface-1) 85%, transparent);">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid h-20 grid-cols-[1fr_auto_1fr] items-center gap-4">
                <a
                    href="<?php echo esc_url(home_url('/')); ?>"
                    class="inline-flex items-center justify-self-start rounded-full px-1 text-3xl font-medium tracking-tight theme-text-strong focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/60 focus-visible:ring-offset-2"
                    style="--tw-ring-offset-color: var(--site-bg);">
                    <?php bloginfo('name'); ?>
                </a>

                <div class="hidden lg:flex lg:items-center lg:justify-self-center">
                    <div class="flex items-center gap-1 rounded-full border theme-border theme-surface-3 p-1">
                        <?php foreach ($menu_items as $item) : ?>
                            <?php
                            $item_url = trailingslashit($item->url);
                            $is_current = untrailingslashit($item_url) === untrailingslashit($current_url);
                            $link_classes = $is_current
                                ? 'theme-accent-soft theme-text-strong'
                                : 'theme-text-muted theme-hover-strong';
                            ?>
                            <a
                                href="<?php echo esc_url($item->url); ?>"
                                class="<?php echo esc_attr("theme-hover-surface rounded-full px-4 py-2 text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/60 focus-visible:ring-offset-2 {$link_classes}"); ?>"
                                style="--tw-ring-offset-color: var(--site-bg); <?php echo $is_current ? 'box-shadow: inset 0 0 0 1px color-mix(in srgb, var(--accent-strong) 25%, transparent);' : ''; ?>"
                                <?php if ($is_current) : ?>aria-current="page"<?php endif; ?>>
                                <?php echo esc_html($item->title); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="hidden items-center justify-self-end gap-3 lg:flex">
                    <button
                        type="button"
                        class="theme-toggle theme-hover-surface theme-hover-strong inline-flex items-center gap-2 rounded-full border theme-border theme-surface-3 px-4 py-2 text-sm font-medium theme-text-muted transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/60 focus-visible:ring-offset-2"
                        style="--tw-ring-offset-color: var(--site-bg);"
                        aria-label="Toggle color theme">
                        <svg class="theme-toggle-icon-dark h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79Z" />
                        </svg>
                        <svg class="theme-toggle-icon-light h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25M12 18.75V21M4.22 4.22l1.59 1.59M18.19 18.19l1.59 1.59M3 12h2.25M18.75 12H21M4.22 19.78l1.59-1.59M18.19 5.81l1.59-1.59M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                        <span>Theme</span>
                    </button>

                    <a
                        href="https://github.com/richardpjames"
                        class="theme-hover-accent-soft inline-flex items-center gap-2 rounded-full border theme-accent-border theme-accent-soft px-4 py-2 text-sm font-medium theme-accent transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/60 focus-visible:ring-offset-2"
                        style="--tw-ring-offset-color: var(--site-bg);">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true">
                            <path d="M12 .5a12 12 0 0 0-3.79 23.39c.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.42-4.04-1.42-.55-1.38-1.33-1.74-1.33-1.74-1.08-.74.08-.73.08-.73 1.2.08 1.83 1.22 1.83 1.22 1.06 1.8 2.78 1.28 3.46.98.11-.77.42-1.28.76-1.57-2.67-.3-5.47-1.32-5.47-5.89 0-1.3.47-2.37 1.22-3.21-.12-.3-.53-1.52.12-3.16 0 0 1-.32 3.3 1.23A11.52 11.52 0 0 1 12 6.32c1.02 0 2.05.14 3.01.4 2.3-1.55 3.3-1.23 3.3-1.23.65 1.64.24 2.86.12 3.16.76.84 1.22 1.91 1.22 3.21 0 4.58-2.8 5.58-5.48 5.88.43.37.81 1.09.81 2.2v3.27c0 .32.22.69.83.58A12 12 0 0 0 12 .5Z" />
                        </svg>
                        <span>GitHub</span>
                    </a>
                </div>

                <button
                    id="mobile-menu-button"
                    type="button"
                    class="theme-hover-surface theme-hover-strong relative inline-flex items-center justify-center justify-self-end rounded-full border theme-border theme-surface-3 p-3 theme-text-muted transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/60 focus-visible:ring-offset-2 lg:hidden"
                    style="--tw-ring-offset-color: var(--site-bg);"
                    aria-controls="mobile-menu"
                    aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <svg id="menu-open-icon" class="h-5 w-5 transition duration-500" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg id="menu-close-icon" class="pointer-events-none absolute h-5 w-5 opacity-0 transition duration-500" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <div
            id="mobile-menu"
            class="max-h-0 overflow-hidden opacity-0 -translate-y-4 transition-all duration-500 ease-out lg:hidden">
            <div class="theme-surface-2 theme-card-shadow mx-4 mb-4 rounded-[1.5rem] border theme-border p-4">
                <div id="mobile-menu-inner" class="space-y-2">
                    <?php foreach ($menu_items as $item) : ?>
                        <?php
                        $item_url = trailingslashit($item->url);
                        $is_current = untrailingslashit($item_url) === untrailingslashit($current_url);
                        $link_classes = $is_current
                            ? 'theme-accent-soft theme-text-strong'
                            : 'theme-text-muted theme-hover-surface theme-hover-strong';
                        ?>
                        <a
                            href="<?php echo esc_url($item->url); ?>"
                            class="<?php echo esc_attr("block rounded-2xl border px-4 py-3 text-sm font-medium transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/60 focus-visible:ring-offset-2 {$link_classes}"); ?>"
                            style="--tw-ring-offset-color: var(--surface-2); border-color: <?php echo $is_current ? 'color-mix(in srgb, var(--accent-strong) 25%, transparent)' : 'transparent'; ?>;"
                            <?php if ($is_current) : ?>aria-current="page"<?php endif; ?>>
                            <?php echo esc_html($item->title); ?>
                        </a>
                    <?php endforeach; ?>
                </div>

                <div class="mt-4 flex gap-3 border-t theme-border pt-4">
                    <button
                        type="button"
                        class="theme-toggle theme-hover-surface theme-hover-strong inline-flex flex-1 items-center justify-center gap-2 rounded-full border theme-border theme-surface-3 px-4 py-3 text-sm font-medium theme-text-muted transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/60 focus-visible:ring-offset-2"
                        style="--tw-ring-offset-color: var(--surface-2);"
                        aria-label="Toggle color theme">
                        <svg class="theme-toggle-icon-dark h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1 1 11.21 3a7 7 0 0 0 9.79 9.79Z" />
                        </svg>
                        <svg class="theme-toggle-icon-light h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25M12 18.75V21M4.22 4.22l1.59 1.59M18.19 18.19l1.59 1.59M3 12h2.25M18.75 12H21M4.22 19.78l1.59-1.59M18.19 5.81l1.59-1.59M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                        </svg>
                        <span>Theme</span>
                    </button>

                    <a
                        href="https://github.com/richardpjames"
                        class="theme-hover-accent-soft inline-flex flex-1 items-center justify-center gap-2 rounded-full border theme-accent-border theme-accent-soft px-4 py-3 text-sm font-medium theme-accent transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-sky-400/60 focus-visible:ring-offset-2"
                        style="--tw-ring-offset-color: var(--surface-2);">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current" aria-hidden="true">
                            <path d="M12 .5a12 12 0 0 0-3.79 23.39c.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.42-4.04-1.42-.55-1.38-1.33-1.74-1.33-1.74-1.08-.74.08-.73.08-.73 1.2.08 1.83 1.22 1.83 1.22 1.06 1.8 2.78 1.28 3.46.98.11-.77.42-1.28.76-1.57-2.67-.3-5.47-1.32-5.47-5.89 0-1.3.47-2.37 1.22-3.21-.12-.3-.53-1.52.12-3.16 0 0 1-.32 3.3 1.23A11.52 11.52 0 0 1 12 6.32c1.02 0 2.05.14 3.01.4 2.3-1.55 3.3-1.23 3.3-1.23.65 1.64.24 2.86.12 3.16.76.84 1.22 1.91 1.22 3.21 0 4.58-2.8 5.58-5.48 5.88.43.37.81 1.09.81 2.2v3.27c0 .32.22.69.83.58A12 12 0 0 0 12 .5Z" />
                        </svg>
                        GitHub
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        const button = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('menu-open-icon');
        const closeIcon = document.getElementById('menu-close-icon');
        const themeButtons = document.querySelectorAll('.theme-toggle');

        const applyTheme = (theme) => {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('site-theme', theme);
        };

        themeButtons.forEach((toggleButton) => {
            toggleButton.addEventListener('click', () => {
                const currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
                applyTheme(currentTheme === 'dark' ? 'light' : 'dark');
            });
        });

        button.addEventListener('click', () => {
            const isOpen = button.getAttribute('aria-expanded') === 'true';

            if (isOpen) {
                menu.classList.remove('max-h-[32rem]', 'opacity-100', 'translate-y-0');
                menu.classList.add('max-h-0', 'opacity-0', '-translate-y-4');

                openIcon.classList.remove('opacity-0', 'rotate-90');
                openIcon.classList.add('opacity-100', 'rotate-0');

                closeIcon.classList.remove('opacity-100', 'rotate-0');
                closeIcon.classList.add('opacity-0', '-rotate-90');

                button.setAttribute('aria-expanded', 'false');
            } else {
                menu.classList.remove('max-h-0', 'opacity-0', '-translate-y-4');
                menu.classList.add('max-h-[32rem]', 'opacity-100', 'translate-y-0');

                openIcon.classList.remove('opacity-100', 'rotate-0');
                openIcon.classList.add('opacity-0', 'rotate-90');

                closeIcon.classList.remove('opacity-0', '-rotate-90');
                closeIcon.classList.add('opacity-100', 'rotate-0');

                button.setAttribute('aria-expanded', 'true');
            }
        });
    </script>
