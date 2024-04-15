<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
    <?php foreach ($products as $product): ?>
        <div class="max-w-sm rounded overflow-hidden shadow-lg transition-transform duration-300 transform hover:scale-110">
            <a href="<?php echo $product['permalink']; ?>" class="text-decoration-none">
                <img class="w-full" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2"><?php echo $product['name']; ?></div>
                    <p class="text-gray-700 text-base"><?php echo $product['price']; ?></p>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>