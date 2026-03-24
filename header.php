<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body class="min-h-screen">

    <header class="justify-between items-center bg-gray-900 text-white py-2 px-2">
        <div class="flex flex-row justify-between max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold mb-2">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
            <div class="flex items-center">
                <?php $locations = get_nav_menu_locations();

                if (isset($locations['main'])) {
                    $items = wp_get_nav_menu_items($locations['main']);

                    foreach ($items as $item) : ?>

                        <a href="<?php echo $item->url; ?>" class="mx-3">
                            <?php if ($item->title == 'Food') echo '🍩'; ?>
                            <?php if ($item->title == 'Technology') echo '💻'; ?>
                            <?php echo $item->title; ?>
                        </a>

                <?php
                    endforeach;
                }
                ?>
            </div>
        </div>
    </header>