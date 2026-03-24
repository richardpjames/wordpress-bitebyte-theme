
    <header class="justify-between items-center bg-gray-900 text-white py-2 px-2">
        <div class="flex flex-row justify-between max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold mb-2">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
            <div class="flex items-center">
                <?php $categories = get_categories();
                foreach ($categories as $category) : ?>

                    <a href="<?php echo get_category_link($category->term_id); ?>" class="mx-3">
                        <?php if($category->name == 'Food') echo '🍩'; ?>
                        <?php if($category->name == 'Technology') echo '💻 '; ?>
                        <?php echo $category->name; ?>
                    </a>

                <?php endforeach; ?>
            </div>
        </div>
    </header>