<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
    <?php foreach ($products as $product): ?>
        <div class="text-center flex flex-col max-w-sm rounded overflow-auto shadow-lg transition-transform duration-300 transform hover:scale-110">
            <a href="<?php echo $product['permalink']; ?>" class="text-decoration-none flex-grow">
                <img class="w-full h-64 object-cover" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <div class="px-6 py-8 flex-grow">
                    <div class="font-bold text-xl mb-2"><?php echo $product['name']; ?></div>
                    <p class="text-gray-700 text-base mb-4"><?php echo $product['price']; ?></p>
                    <a class="bg-purple-700 text-white p-4 mt-8 mb-8" href="<?php echo esc_url($product['add_to_cart_url']); ?>">Add to Cart</a>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
