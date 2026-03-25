<div class="max-w-7xl mx-auto px-5">
    <div class="relative overflow-hidden rounded-xl mt-5 ">
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('/wp-content/uploads/2026/03/front-background.jpg');"></div>

        <div class="relative z-10 p-8 text-gray-900">
            <div class="mx-auto py-12 md:py-12">
                <h1 class="text-6xl sm:text-7xl text-center"><?php echo $args['heading']; ?></h1>
                <?php if (isset($args['text'])) : ?>
                    <p class="text-l sm:text-xl text-center pt-5 text-gray-900!"><?php echo $args['text']; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>