<div class="swiper" data-productgrid="<?php echo esc_html( $template_atts['product_grid'] ); ?>">
    <div class="swiper-wrapper">
    <?php foreach ($products as $product): ?>
        <div class="swiper-slide text-center max-w-sm rounded overflow-auto shadow-lg">
            <div class="text-decoration-none flex-grow">
                <img class="w-full h-64 object-cover" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <div class="px-4 py-8 flex-grow">
                    <p class="font-bold text-base mb-2 no-underline"><?php echo $product['name']; ?></p>
                    <p class="text-gray-700 text-base mb-6"><?php echo $product['price']; ?></p>
                    <a class="bg-purple-700 text-white p-3 mb-8 no-underline" href="<?php echo esc_url($product['add_to_cart_url']); ?>">Add to Cart</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>